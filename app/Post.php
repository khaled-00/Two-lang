<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'description', 'locale'];

    protected $fillable = ['article_id', 'image', 'title', 'description', 'locale'];

/*
    public function article()
	{
	 return	$this->belongsTo('App\Article');
	}*/
}
