<?php

namespace Alexstorm13\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Dish extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dish_name',
        'dish_price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function validate($dish)
    {
        $validator = Validator::make($dish, [
            'dish_name' => 'required|string|max:255',
            'dish_price' => 'required|string|max:255'
        ]);
        return $validator;
    }

    public function categories()
    {
        return $this->belongsToMany('Alexstorm13\Menu\Category')->withPivot('index');
    }

    public function attachCategory($categoryId)
    {
        return $this->categories()->attach($categoryId);
    }

    public function detachCategory($categoryId)
    {
        return $this->categories()->detach($categoryId);
    }

    public function syncCategory($categoryId)
    {
        return $this->categories()->sync($categoryId);
    }

    public function types()
    {
        return $this->belongsToMany('Alexstorm13\Menu\Type');
    }

    public function attachType($typeId)
    {
        return $this->types()->attach($typeId);
    }

    public function detachType($typeId)
    {
        return $this->types()->detach($typeId);
    }

    public function syncType($typeId)
    {
        return $this->types()->sync($typeId);
    }

}
