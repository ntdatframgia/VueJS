<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Topic;

class Category extends Model
{
    protected $fillable = [
    	'name', 'description'
    ];
    protected $appends = ['numberOfTopics'];

    public function topics()
    {
    	return $this->hasMany(Topic::class);
    }

    public function getnumberOfTopicsAttribute()
    {
    	return $this->topics->count();
    }
}
