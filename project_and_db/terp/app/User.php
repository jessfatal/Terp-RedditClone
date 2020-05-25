<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jcc\LaravelVote\Vote;

class User extends Authenticatable
{
    use Notifiable;
    use Vote;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function vote($user, $vote, $post_id)
    {
        $user = User::where('username', $user)->first();
        $post = Post::where('id', $post_id)->first();

        if ($vote == 'up'){
            if ($user->hasUpVoted($post)){
                $user->cancelVote($post);
            }else{
                $user->upVote($post);
            }
        }

        if ($vote == 'down'){
            if ($user->hasDownVoted($post)){

                $user->cancelVote($post);
            }else{
                $user->downVote($post);
            }

        }
    }
}
