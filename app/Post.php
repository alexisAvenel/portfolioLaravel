<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    
	protected $fillable = ['title', 'slug', 'content', 'online', 'category_id', 'resumed', 'image'];

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

	public function getResumed() {
		if(!empty($this->attributes['resumed'])) {
			return $this->attributes['resumed'];
		} else {
			return (explode('.', $this->attributes['content'])) ? explode('.', $this->attributes['content'])[0] : substr($this->attributes['content'], 0, 150);
		}
	}

	public function getDates() {
		return ['created_at', 'updated_at', 'published_at'];
	}
}
