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
      Route::get('pictureStatus/{id}/{tab}', 'BackendController@pictureStatus')->name('pictureStatus');        
      Route::get('pictureDelete/{id}/{tab}', 'BackendController@pictureDelete')->name('pictureDelete');        
      
      // Social site
      Route::post('addSocialSite/', 'BackendController@addSocialSite')->name('addSocialSite');
      Route::get('socialStatus/{id}/{tab}', 'BackendController@socialStatus')->name('socialStatus');
      Route::post('editSocialSite/', 'BackendController@editSocialSite')->name('editSocialSite');       
      Route::get('socialDelete/{id}/{tab}', 'BackendController@socialDelete')->name('socialDelete');        

   // home
      Route::get('home/', 'BackendController@home')->name('home');
      Route::post('addHome/', 'BackendController@addHome')->name('addHome');
      Route::get('editHome/', 'BackendController@editHome')->name('editHome');       
      Route::post('editHome2/', 'BackendController@editHome2')->name('editHome2');       

   //About
      Route::get('about/', 'BackendController@about')->name('about');

   //Service
      Route::get('services/', 'BackendController@services')->name('services');
      Route::post('addService/', 'BackendController@addService')->name('addService');
      Route::get('editService/', 'BackendController@editService')->name('editService');       
      Route::post('editService2/', 'BackendController@editService2')->name('editService2');       

   //Skill
      Route::get('skills/', 'BackendController@skills')->name('skills');
      Route::post('addSkill/', 'BackendController@addSkill')->name('addSkill');
      Route::post('editSkill/', 'BackendController@editSkill')->name('editSkill');           

   // Education
      Route::get('education/', 'BackendController@education')->name('education');
      Route::post('addEducation/', 'BackendController@addEducation')->name('addEducation');
      Route::get('editEducation/', 'BackendController@editEducation')->name('editEducation');           
      Route::post('editEducation2/', 'BackendController@editEducation2')->name('editEducation2');           

   //Experience
      Route::get('experience/', 'BackendController@experience')->name('experience');
      Route::post('addExperience/', 'BackendController@addExperience')->name('addExperience');
      Route::get('editExperience/', 'BackendController@editExperience')->name('editExperience');           
      Route::post('editExperience2/', 'BackendController@editExperience2')->name('editExperience2');           
   
   Route::get('work/', 'BackendController@work')->name('work');
   Route::get('blog/', 'BackendController@blog')->name('blog');
   Route::get('contact/', 'BackendController@contact')->name('contact');


// All status change   
   Route::get('itemStatus/{id}/{model}/{tab}','BackendController@itemStatus')->name('itemStatus');
   Route::get('itemDelete/{id}/{model}/{tab}','BackendController@itemDelete')->name('itemDelete');
   
// Any title
   Route::post('addAnyTitle/', 'BackendController@addAnyTitle')->name('addAnyTitle');
   Route::post('editAnyTitle/', 'BackendController@editAnyTitle')->name('editAnyTitle');
