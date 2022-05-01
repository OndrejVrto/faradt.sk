<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class MediaStoreService
{
    public function handle(Model $model, FormRequest $request, string $requestAttributte, string $manualFileName = null): void {
        if ($request->hasFile($requestAttributte)) {
            $colectionName = $model->collectionName;

            $model->clearMediaCollection($colectionName);
            $model->addMediaFromRequest($requestAttributte)
                ->sanitizingFileName( function ($filename) use($manualFileName) {
                    return (isset($manualFileName) AND !empty(trim($manualFileName)))
                        ? $manualFileName.'.'.pathinfo($filename, PATHINFO_EXTENSION)
                        : DataFormater::filterFilename($filename, true);
                })
                ->toMediaCollection($colectionName);
        }
    }

    public function handleCropPicture(Model $model, FormRequest $request): void {
        if (!empty($request->crop_base64_output) AND !empty($request->crop_file_name)) {
            $colectionName = $model->collectionName;
            $fileExtension = explode("image/", explode(";base64,", $request->crop_base64_output)[0])[1];
            $fileName = Str::slug($request->description).'.'.$fileExtension;

            $model->clearMediaCollection($colectionName);
            $model->addMediaFromBase64($request->crop_base64_output)
                ->usingFileName($fileName)
                ->withCustomProperties(['oldFileName' => $request->crop_file_name])
                ->toMediaCollection($colectionName);
        }
    }
}
