<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
class Category extends Model
{
    use Sluggable, SluggableScopeHelpers, Taggable;

    protected $table = 'categories';

    protected $fillable = ['slug', 'name', 'order', 'parent_id'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot() {
        // Reference the parent::boot() class.
        parent::boot();
        Category::deleting(function($category) {
            foreach($category->children as $subcategory){
                $subcategory->delete();
            }
        });
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post')
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children(){
        return $this->hasMany('App\Models\SCategory', 'parent_id');
    }
}
