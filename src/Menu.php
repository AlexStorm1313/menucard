<?php

namespace Alexstorm13\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_name', 'menu_price',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function validate($menu)
    {
        $validator = Validator::make($menu, [
            'menu_name' => 'required|string|max:255',
            'menu_price' => 'sometimes|required|string|max:255',
        ]);
        return $validator;
    }

    public function categories()
    {
        return $this->belongsToMany('Alexstorm13\Menu\Category');
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
}
