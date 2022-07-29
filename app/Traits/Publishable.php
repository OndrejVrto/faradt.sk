<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Publishable {
    public function scopePublished(Builder $query) {
        return $query
                    ->where('published_at', '<=', now())
                    ->orWhereNull('published_at');
    }

    public function scopeUnpublished(Builder $query) {
        return $query
                    ->where('unpublished_at', '>', now())
                    ->orWhereNull('unpublished_at');
    }

    public function scopeVisible(Builder $query) {
        return $query
                    ->where('active', 1)
                    ->published()
                    ->unpublished()
                    ->latest();
    }

    public function publish() {
        return $this->update([
            'published_at' => null,
        ]);
    }

    public function unpublish() {
        return $this->update([
            'unpublished_at' => now()->toDateTimeString(),
        ]);
    }

    public function getVisibleAttribute(): bool {
        return  $this->active
            and ($this->published_at <= now() or is_null($this->published_at))
            and ($this->unpublished_at > now() or is_null($this->unpublished_at));
    }

    public function getPublishedAtAttribute($value) {
        return is_null($value) ? null : date('d.m.Y G:i', strtotime($value));
    }

    public function getUnpublishedAtAttribute($value) {
        return is_null($value) ? null : date('d.m.Y G:i', strtotime($value));
    }
}
