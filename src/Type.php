<?php

namespace Alexstorm13\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function validate($category)
    {
        $validator = Validator::make($category, [
            'type_name' => 'required|string|max:255',
        ]);
        return $validator;
    }

    public function dishes()
    {
        return $this->belongsToMany('Alexstorm13\Menu\Dish');
    }

    public function attachDish($dishId)
    {
        return $this->dishes()->attach($dishId);
    }

    public function detachDish($dishId)
    {
        return $this->dishes()->detach($dishId);
    }

    public function syncDish($dishId)
    {
        return $this->dishes()->sync($dishId);
    }
}
