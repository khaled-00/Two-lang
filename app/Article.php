<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use \Dimsav\Translatable\Translatable;
	    
    public $translatedAttributes = ['name', 'locale'];

    protected $fillable 		 = ['name', 'locale'];

    
	public function posts()
	{
		return $this->hasMany('App\Post');
	}
}
