<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Training extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });

        static::deleting(function (Training $training) {
            $training->workouts()->delete();
        });
    }

    protected $casts = [
        'id' => 'string'
    ];

    public function workouts(){
        return $this->hasMany(Workout::class);
    }

}
