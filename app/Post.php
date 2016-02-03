<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    
	protected $fillable = ['title', 'slug', 'content', 'online', 'category_id'];

	public function category() {
		return $this->belongsTo('App\Category');
	}

    public function tags() {
    	return $this->belongsToMany('App\Tag');
    }

	public function scopePublished($query) {
		return $query->where('online', 1)->whereRaw('created_at < NOW()');
	}

	public function setSlugAttribute($value) {
		if(empty($value)) {
			$this->attributes['slug'] = Str::slug($this->title);
		}
	}

	public function getDates() {
		return ['created_at', 'updated_at', 'published_at'];
	}
}
