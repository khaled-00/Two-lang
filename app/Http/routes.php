<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Site routes
Route::group(['prefix' => LaravelLocalization::setLocale()], function() 
{   
    // If user goes to "/" URL without writing locale lang 
    Route::get('/', function() 
    {
        // Redirect to home page with the current lang
        if (\LaravelLocalization::getCurrentLocale() == 'ar') 
        {
            return redirect('/ar/home');
        } 
        else 
        {
            return redirect('/en/home');
        }
    });
    Route::get('/home', 'FrontEndController@index');

    // Other pages
    Route::get('/post/{id}', 'FrontEndController@show');
    Route::get('/category/{id}', 'FrontEndController@article');

    // Update post
    Route::get('/edit/{id}', 'FrontEndController@edit');
    Route::patch('/update/{updates}', 'FrontEndController@update');

    // Delete post
    Route::get('/destroy/{id}', 'FrontEndController@destroy');

    
});

// C-panel routes
Route::group(['prefix' => 'panel'], function() 
{
    Route::get('/', 'PanelController@index');
    
    // Post Page
    Route::get('post', 'PanelController@create_post');
    Route::post('post', 'PanelController@store_post');

    // Category Page
    Route::get('category', 'PanelController@create_category');
    Route::post('category', 'PanelController@store_category');
});

// Auth routes 
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
