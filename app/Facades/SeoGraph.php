<?php

declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SeoGraph extends Facade {
    protected static function getFacadeAccessor() {
        return 'seo.graph';
    }
}
