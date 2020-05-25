<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jcc\LaravelVote\CanBeVoted;

class Post extends Model
{
    use CanBeVoted;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
