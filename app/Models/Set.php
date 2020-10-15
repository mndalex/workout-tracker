<?php

namespace App\Models;

use App\Pivots\SetExercise;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Set extends Model
{
    use SoftDeletes, Multitenantable;

    protected $guarded = [];

    protected $hidden = ['user_id', 'created_at', 'updated_at', 'deleted_at'];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'set_exercises')
            ->using(SetExercise::class)
            ->withPivot(['amount', 'unit_id', 'rest_amount', 'rest_unit_id']);
    }
}
