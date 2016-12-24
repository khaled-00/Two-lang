<?php
 namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    protected $fillable = ['name', 'locale'];
/*
    public function articles()
	{
		$this->belongsTo('App\Article');
	}*/
}
