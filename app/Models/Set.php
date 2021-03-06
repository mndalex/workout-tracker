<?php

namespace App\Models;

use App\Pivots\SetExercise;
use App\Pivots\WorkoutSet;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'set_exercises')
            ->using(SetExercise::class)
            ->orderBy('sort')
            ->withPivot(['amount', 'unit_id', 'rest_amount', 'rest_unit_id']);
    }

    public function setExercises()
    {
        return $this->hasMany(SetExercise::class);
    }

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'workout_sets')
            ->using(WorkoutSet::class)
            ->orderBy('sort');
    }

    public function workoutSets()
    {
        return $this->hasMany(WorkoutSet::class);
    }
}
