<?php 
namespace App\Http\Controllers;

use App\Article;
use App\Post;
use App\User;

use LaravelLocalization;
use Pagination;
use File;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\PostRequest;

use App\Http\Controllers\Controller;

class FrontEndController extends Controller 
{

	// To store the local lang
	public  $locale_right; 
	public 	$locale ;
	

	/**
	 * To control on local lang, it uses when lang switching.
	 * 
	 * @return Make locale lang
	 */
	public function __construct ()
	{
		// The locale lang
	 	$this->locale_right = LaravelLocalization::getCurrentLocale();
		// Uses to switch lang
		$this->locale 		= $this->locale_right == 'ar' ? '/en' : '/ar';
	}

	/**
	 * Display a listing of all posts.
	 *
	 * @return Home page
	 */
	public function index()
	{
		// Get all posts, split them into pages "two posts in page"
		$posts   	= Post::latest()->paginate(2);
		// Get all Articls
		$articles 	= Article::latest()->get();

		// The locale lang, For switch it
		$locale 	= $this->locale; 

		return view('pages.home', compact('posts', 'articles', 'locale'));
	}

	/**
	 * Display posts depends on article.
	 *
	 * @param  int  $id of an article
	 * @return article page
	 */
	public function article($id)
	{
		// Get a specified article
		$article 	=  Article::findOrFail($id);
		// Get all posts, split them into pages "two posts in page"
		$posts		=	$article->posts()->paginate(2);
		
		// The locale lang, For switching it
		$locale 	= $this->locale; 

		return View('pages.article', compact('posts', 'article', 'locale'));
	}

	/**
	 * Display a specified Post.
	 *
	 * @param  int  $id of an post
	 * @return Post page
	 */
	public function show($id)
	{
		// Get a specified post
		$post 		=  Post::findOrFail($id);
		// Get the post's Articl
		$article 	= Article::findOrFail($post->article_id);

		// The locale lang, For switching it
		$locale 	= $this->locale; 

		return View('pages.post', compact('post', 'article', 'locale'));
	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// If not AUTH you not allow to be here
		if (! Auth::check())
		{
			// Redirect to show post
			return redirect('/post/'. $id);
		}

		// Get a specified post
		$post 		=   Post::findOrFail($id);
		// Get the post's Articl
		$articles 	= 	Article::latest()->get();

		// Th old post's data
		$old_data = [
			'en_title' 			=> $post->translate('en')->title,
			'ar_title' 			=> $post->translate('ar')->title,
			'en_description' 	=> $post->translate('en')->description,
			'ar_description' 	=> $post->translate('ar')->description,
			'imagee' 			=> $post->image,
		];

		// The locale lang, For switching it
		$locale 	= $this->locale; 

		return View('pages.edit_post', compact('post' , 'old_data', 'articles', 'locale'));
	}

	/**
	 * Update the specified post.
	 *
	 * @param  int  $id
	 * @return Redirect to home page
	 */
	public function update(PostRequest $inputs)
	{
		// If not AUTH you not allow to be here
		if (! Auth::check())
		{
			// Redirect to home
			return redirect('/');
		}

		// Remove the old file
		File::delete('uploads/' . $inputs->old_image);

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
		  	
		  	// Get a specified post
			$post 		=   Post::findOrFail($inputs->old_id);

  			// Update new post
		 	if ($post->update($data))
		 	{
		 		\Session::flash('flash_message', ' The post Updated successfully');
		 		return redirect('/');
		 	}
		}
		else
		{
			echo 'Unexpected error';
		}
	}
	
	
	/**
	 * Delete the specified Post and remove the image.
	 *
	 * @param  int  $id of an post
	 * @return Redirect to home page
	 */
	public function destroy($id)
	{
		// If not AUTH you not allow to be here
		if (! Auth::check())
		{
			// Redirect to show post
			return redirect('/post/'. $id);
		}

		// Get a specified post
		$post = Post::findOrFail($id);
		
		if ($post)
		{
			// Remove the image
			if (File::delete('uploads/' . $post->image))
			{
				// Delete the post
			 	$post->forceDelete();

			 	return redirect('/'. $this->locale_right .'/home');
			}
			else
			{
				echo 'Unexpected error';
			}
		}
		else
		{
			echo 'This ID is not a post';
		}
		
	}


}
