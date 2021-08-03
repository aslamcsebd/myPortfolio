<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "<h1> Cleared!</h1>";
});

Route::get('/admin', 'HomeController@index')->name('admin');

// Route::prefix('admin')->group(function(){
//    Route::get('/login','BackendController@ShowLoginForm')->name('admin.login');
// });

Route::get('/', 'FrontendController@index')->name('home');

// Backend
   // left
      // profile image
      Route::get('left/', 'BackendController@left')->name('left');
      Route::post('addPicture/', 'BackendController@addPicture')->name('addPicture');
      Route::get('pictureStatus/{id}/{tab}','BackendController@pictureStatus')->name('pictureStatus');        
      Route::get('pictureDelete/{id}/{tab}','BackendController@pictureDelete')->name('pictureDelete');        
      // Social site
      Route::post('addSocialSite/', 'BackendController@addSocialSite')->name('addSocialSite');
      Route::get('socialStatus/{id}/{tab}','BackendController@socialStatus')->name('socialStatus');
      Route::post('editSocialSite/', 'BackendController@editSocialSite')->name('editSocialSite');       
      Route::get('socialDelete/{id}/{tab}','BackendController@socialDelete')->name('socialDelete');        


   Route::get('home/', 'BackendController@home')->name('home');
   Route::get('about/', 'BackendController@about')->name('about');
   Route::get('services/', 'BackendController@services')->name('services');
   Route::get('skills/', 'BackendController@skills')->name('skills');
   Route::get('education/', 'BackendController@education')->name('education');
   Route::get('experience/', 'BackendController@experience')->name('experience');
   Route::get('work/', 'BackendController@work')->name('work');
   Route::get('blog/', 'BackendController@blog')->name('blog');
   Route::get('contact/', 'BackendController@contact')->name('contact');
   