<?php

declare(strict_types = 1);

namespace App\Models;

use App\Enums\ChartType;
use App\Models\BaseModel;
use App\Models\ChartData;
use App\Traits\Restorable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chart extends BaseModel
{
    use Loggable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'charts';

    protected $fillable = [
        'active',
        'title',
        'description',
        'slug',
        'name_x_axis',
        'name_y_axis',
        'type_chart',
        'color',
    ];

    protected $casts = [
        'active' => 'boolean',
        'type_chart' => ChartType::class,
    ];

    public function data() {
        return $this->hasMany(ChartData::class)->orderBy('key');
    }
}
