<?php

namespace Alexstorm13\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name'
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
            'category_name' => 'required|string|max:255',
        ]);
        return $validator;
    }

    public function dishes()
    {
        return $this->belongsToMany('Alexstorm13\Menu\Dish')->withPivot('index');
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

    public function menus()
    {
        return $this->belongsToMany('Alexstorm13\Menu\Menu');
    }

    public function attachMenu($menuId){
        return $this->menus()->attach($menuId);
    }

    public function detachMenu($menuId){
        return $this->menus()->detach($menuId);
    }

    public function syncMenu($menuId){
        return $this->menus()->sync($menuId);
    }

}
