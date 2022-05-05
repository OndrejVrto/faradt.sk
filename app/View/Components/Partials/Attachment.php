<?php

namespace App\View\Components\Partials;

use App\Models\File;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Services\FilePropertiesService;

class Attachment extends Component
{
    public $attachments = null;

    public function __construct(
        public string|array|null $nameSlugs = null
    ) {
        $listOfAttachments = prepareInput($nameSlugs);

        if ($listOfAttachments) {
            $this->attachments = File::query()
                ->whereIn('slug', $listOfAttachments)
                ->with('media', 'source')
                ->get()
                ->map(function($file) {
                    return (new FilePropertiesService())->getFileItemProperties($file);
                });
        }
    }

    public function render(): View {
        return view('components.partials.attachment.index');
    }
}
