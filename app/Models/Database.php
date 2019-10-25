<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function subjects() {
        return $this->belongsToMany('App\Models\Subject', 'database_subject');
    }

    public function types() {
        return $this->belongsToMany('App\Models\Type', 'database_type');
    }

    public function languages() {
        return $this->belongsToMany('App\Models\Language', 'database_language');
    }

    public function links() {
        return $this->hasMany('App\Models\Link');
    }

    public function setExpiredAtAttribute($value) {
        $this->attributes['expired_at'] = Carbon::parse($value);
    }
}
