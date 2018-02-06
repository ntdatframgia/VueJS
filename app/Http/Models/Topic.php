<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $visible = [
        'id', 'category_id', 'title', 'body', 'views', 'user_id', 'breadcrumb','created_at', 'names'
    ];
    protected $appends = ['names', 'breadcrumb'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comments::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getNamesAttribute()
    {
        return $this->user->name;
    }
    public function getBreadcrumbAttribute()
    {
        return[
            [ 'title' => 'Home', 'link' =>'/' ],
            [ 'title' => $this->category->name, 'link' => '/category/' . $this->category->id],
            [ 'title' => $this->title, 'link' => '/topic/' . $this->id],
        ];
    }
}
