<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class post extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['title', 'description','user_id', 'slug','image']; 


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function postCreator()
    {
        //post_creator_id
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    
    public function setImageAttribute($value)
    {
        if ($value) {
            $this->attributes['image'] = Storage::disk('public')->put('posts', $value);
        }
    }

        
    public function getImageAttribute($value) 
    {
        return $value ? Storage::url($value) : null;
    }
}




