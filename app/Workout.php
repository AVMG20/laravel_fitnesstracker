<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Workout extends Model
{
    protected $fillable = [
        'volume', 'user_id' , 'training_id', 'workout_date' , 'created_at' , 'updated_at'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function training(){
        return $this->belongsTo('App\Training');
    }

    protected $casts = [
        'id' => 'string'
    ];
}
