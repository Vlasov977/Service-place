<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', '=', 'Published');
    }

    public function scopeRangeData($query)
    {
        $now = Carbon::now();
        $plusMonth = $now->addMonth();
        $now = Carbon::now();

        return $query = $query->whereBetween('date_from', [$now, $plusMonth])
            ->whereDate('date_start', '<=', $now->toDateString());
    }
}
