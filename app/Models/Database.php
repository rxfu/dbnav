<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Database extends Model
{
    use PresentableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'remote_url', 'local_url', 'brief', 'content', 'links', 'status', 'expired_at', 'remark', 'user_id',
    ];

    protected $presenter = 'App\Presenters\DatabasePresenter';

    protected $casts = [
        'expired_at' => 'datetime',
    ];
}
