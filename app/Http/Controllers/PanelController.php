<?php
namespace App\Http\Controllers;

use App\Article;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\PostRequest;

use App\Http\Controllers\Controller;

class PanelController extends Controller
{

	/**
	 * Make sure you AUTH
	 *
	 * @return void
	 */
	public function __construct ()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display the whole dashbord.
	 *
	 * @return Redirect to post page
	 */
	public function index ()
	{
		return redirect('/panel/post');
	}

	/**
	 * Show the form for creating a new post.
	 *
	 * @return view post form
	 */
	public function create_post ()
	{
		$articles = Article::latest()->get();
		return view('panel.post', compact('articles'));
	}

	
	/**
	 * Store a newly created post in database.
	 * 
	 * @param  data of a new post 
	 * @return redirect to post page
	 */
	public function store_post (PostRequest $inputs)
	{
		// Image file
		$img 		= $inputs->file('image');
		// Image name
		$filename 	= date('Y_m_d H_m_s') . '_' . $img->getClientOriginalName();
		
		// Move file
		if ($img->move('uploads', $filename))
		{
			// Post's data
			$data = [
				'article_id' => (int) $inputs->article_id,
				'image' 	 => "$filename",
				'en' => 
				[
					'description'   => "$inputs->en_description",
					'title' 		=> "$inputs->en_title",
				],
		      	'ar' => 
		      	[
      				'description'  	=> "$inputs->ar_description", 
      				'title' 	   	=> "$inputs->ar_title",
  				],
		  	];

		  	// Create new post
		 	if (Post::create($data))
		 	{
		 		\Session::flash('flash_message', ' The post Created successfully');
		 		return redirect('panel/post');
		 	}
		}
		else
		{
			echo 'Unexpected error';
		}
	}

	/**
	 * Show the form for creating a new category.
	 *
	 * @return view category form
	 */
	public function create_category ()
	{
		return view('panel.category');
	}

	/**
	 * Store a newly created category in database.
	 * 
	 * @param  data of a new category 
	 * @return redirect to create page
	 */
	public function store_category (ArticleRequest $inputs)
	{
		// Category's name
	 	$data = [
	      	'ar'  => ['name' => "$inputs->ar_category"],
	      	'en'  => ['name' => "$inputs->en_category"],
	  	];

	  	// Create new article
	 	if (Article::create($data))
	 	{
	 		\Session::flash('flash_message', ' The category Created successfully');
	 		return redirect('panel/category');
	 	}
	}

}








