<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function news() {
        return $this->belongsToMany(News::class);
    }
}
