<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use App\Traits\Restorable;
use App\Traits\Publishable;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use Loggable;
    use Restorable;
    use HasFactory;
    use Publishable;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'news';

    public $collectionPicture = 'front_picture';

    public $collectionDocument = 'attachment';

    protected $fillable = [
        'active',
        'user_id',
        'published_at',
        'unpublished_at',
        'category_id',
        'title',
        'slug',
        'content',
        'teaser',
        'notified',
    ];

    protected $casts = [
        'active' => 'boolean',
        'notified' => 'boolean',
        'count_words' => 'integer',
        'content_plain' => 'string',
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
    ];

    protected $appends = [
        'read_duration',
    ];

    /* The number of models to return for pagination. */
    protected $perPage = 10;

    public function getRouteKeyName() {
        return 'slug';
    }

    public function scopeNewsComplete(Builder $query) {
        return $query
                    ->visible()
                    ->with('media', 'user', 'category')
                    ->paginate();
    }

    public function getTeaserMediumAttribute() {
        return Str::words($this->teaser, 20, '...');
        // return Str::limit($this->teaser, 200, '...');
    }

    public function getTeaserLightAttribute() {
        return Str::words($this->teaser, 9, '...');
        // return Str::limit($this->teaser, 55, '...');
    }

    public function getCreatedAttribute() {
        return $this->created_at->format("d. m. Y");
    }

    public function getCreatedStringAttribute() {
        return $this->created_at->format('Y');
    }

    public function getUpdatedAttribute() {
        return $this->updated_at->format("d. m. Y");
    }

    public function getReadDurationAttribute() {
        return Str::readDurationWords($this->count_words);
    }

    public function setContentAttribute($value) {
        $plainText = Str::plainText($value);
        $this->attributes['content'] = $value;
        $this->attributes['content_plain'] = $plainText;
        $this->attributes['count_words'] = Str::wordCount($plainText);
    }

    public function user() {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function category() {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTrashed();
    }

    public function document() {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionDocument);
    }

    public function registerMediaConversions(Media $media = null) : void {
        if ($media->collection_name == $this->collectionPicture) {
            $this->addMediaConversion('large')
                ->fit("crop", 848, 460)
                ->optimize()
                ->withResponsiveImages();
            $this->addMediaConversion('large-square')
                ->fit("crop", 335, 290)
                ->optimize()
                ->withResponsiveImages();
            $this->addMediaConversion('large-thin')
                ->fit("crop", 650, 300)
                ->optimize()
                ->withResponsiveImages();
            $this->addMediaConversion('thumb-latest-news')
                ->fit("crop", 80, 80);
            $this->addMediaConversion('thumb-all-news')
                ->fit("crop", 370, 248);
            $this->addMediaConversion('crop-thumb')
                ->fit("crop", 170, 92);
        }
    }
}
