<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function startCaches(): RedirectResponse {
        Artisan::call('config:cache -q');
        Artisan::call('route:cache -q');
        Artisan::call('optimize -q');
        Artisan::call('view:cache -q');

        toastr()->info(__('app.cache.start'));
        return to_route('admin.dashboard');
    }

    public function clearCaches(): RedirectResponse {
        Artisan::call('config:clear -q');
        Artisan::call('route:clear -q');
        Artisan::call('optimize:clear -q');
        Artisan::call('view:clear -q');

        toastr()->info(__('app.cache.stop'));
        return to_route('admin.dashboard');
    }

    public function clearDataCaches(): RedirectResponse {
        Artisan::call('cache:clear -q');

        toastr()->info(__('app.cache.stop-data'));
        return to_route('admin.dashboard');
    }

    public function resetCaches (): RedirectResponse {
        Artisan::call('config:clear -q');
        Artisan::call('route:clear -q');
        Artisan::call('optimize:clear -q');
        Artisan::call('view:clear -q');

        Artisan::call('cache:clear -q');

        Artisan::call('config:cache -q');
        Artisan::call('route:cache -q');
        Artisan::call('optimize -q');
        Artisan::call('view:cache -q');

        toastr()->info(__('app.cache.reset'));
        return to_route('admin.dashboard');
    }
}
