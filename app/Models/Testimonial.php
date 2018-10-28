<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
class Testimonial extends Model
{
    use Sluggable, SluggableScopeHelpers, Taggable;
    protected $table = 'testimonials';

    protected $fillable = [
        'slug', 'name','from',
        'body','published_at',
        'meta_description',
        'meta_keywords','views',
        'photo',
        'allow_comments'
    ];

    protected $casts = [
        'allow_comments' => 'boolean',
    ];

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

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
