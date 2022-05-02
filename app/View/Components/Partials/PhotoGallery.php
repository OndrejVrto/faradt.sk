<?php

namespace App\View\Components\Partials;

use App\Models\Gallery;
use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use Spatie\SchemaOrg\ImageGallery;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PhotoGallery extends Component
{
    public $gallery;

    public function __construct(
        public string $titleSlug,
        public string|null $dimensionSource = 'full',
    ) {
        $this->gallery = $this->getGallery($titleSlug);
        $this->setSeoMetaTags($this->gallery);
    }

    public function render(): View|null {
        if(!is_null($this->gallery)){
            return view('components.partials.photo-gallery.index');
        }
        return null;
    }

    private function getGallery($slug): array {
        return Cache::rememberForever('GALLERY_'.$slug, function () use($slug): array {
            return Gallery::whereSlug($slug)->with('media', 'source')->get()->map(function($album): array {
                foreach ($album->picture as $pic ) {
                    $picture['picture'][] = [
                        'href' => $pic->getUrl(),
                        'title' => $pic->name,
                        'srcset' => $pic->getSrcset('orginal'),
                        'responsivePicture' => (string) $pic->img('thumb'),
                    ];
                }
                return $picture + [
                    'title' => $album->title,
                    'slug'  => $album->slug,
                    'source_description' => $album->source->source_description,
                    'sourceArr' => [
                        'source_source'      => $album->source->source_source,
                        'source_source_url'  => $album->source->source_source_url,
                        'source_author'      => $album->source->source_author,
                        'source_author_url'  => $album->source->source_author_url,
                        'source_license'     => $album->source->source_license,
                        'source_license_url' => $album->source->source_license_url,
                    ],
                ];
            })->first();
        });

    }

    private function setSeoMetaTags(array $album): void {
        $pictures = [];
        foreach ($album['picture'] as $picture) {
            $pictures[] = Schema::imageObject()
                ->contentUrl(e($picture['href']))
                ->name(e($picture['title']));
        }

        $JsonLD = Schema::imageGallery()
            ->name(e($album['title']))
            ->description(e($album['source_description']))
            ->if(isset($album['sourceArr']['source_author']) OR isset($album['sourceArr']['author_url']), function (imageGallery $schema) use ($album) {
                $schema->author(
                    Schema::person()
                        ->name(e($album['sourceArr']['source_author']))
                        ->sameAs(e($album['sourceArr']['source_author_url']))
                );
            })
            ->license(e($album['sourceArr']['source_license']))
            ->usageInfo(e($album['sourceArr']['source_license_url']))
            ->if( isset($album['sourceArr']['source_source_url']) OR isset($album['sourceArr']['source_source']), function (ImageGallery $schema) use ($album) {
                $schema->copyrightHolder(
                    Schema::organization()
                        ->name(e($album['sourceArr']['source_source']))
                        ->url(e($album['sourceArr']['source_source_url']))
                );
            })
            ->associatedMedia( $pictures )
            ->toArray();

        unset($JsonLD['@context']);

        if (SeoSchema::hasValue('hasPart')) {
            SeoSchema::addValue('hasPart', array_merge(SeoSchema::getValue('hasPart'), [$JsonLD]) );
        } else {
            SeoSchema::addValue('hasPart', [$JsonLD] );
        }
    }
}
