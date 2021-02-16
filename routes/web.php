<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'search'], function() {
    Route::get('/', 'SearchController@search');
    Route::post('list-data', 'SearchController@listData');
    Route::post('profile-data', 'SearchController@profileData');
});

Route::get('/v/{city}', 'IndexController@index');
Route::get('/v/{city}/{slug}', 'SearchController@profileDetail');

Auth::routes();
$this->any('logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'service'], function() {
    Route::get('/', 'ServicesController@get');
    Route::get('edit', 'ServicesController@edit');
    Route::post('save', 'ServicesController@save'); // Add entry in database
});

Route::group(['prefix' => 'tieups'], function() {
    Route::get('/', 'TieupsController@get');
    Route::get('edit', 'TieupsController@edit');
    Route::post('save', 'TieupsController@save');
});

Route::group(['prefix' => 'article'], function() {
    Route::get('/', 'ArticleController@get');
    Route::get('edit', 'ArticleController@edit');
    Route::post('save', 'ArticleController@save');
});

Route::group(['prefix' => 'profile'], function() {
    Route::get('/', 'ProfileController@index');
    Route::post('/', 'ProfileController@save');
    Route::post('url', 'ProfileController@saveProfileUrl');
    Route::get('institute', 'ProfileController@getInstitute');
    Route::post('institute', 'ProfileController@postInstitute');
    Route::get('about', 'ProfileController@getAbout');
    Route::post('about', 'ProfileController@postAbout');
    Route::get('branch', 'ProfileController@getBranch');
    Route::get('branch/add', 'ProfileController@getBranchNew');
    Route::post('branch/edit/{id}', 'ProfileController@updateBranch');
    Route::get('branch/edit/{id}', 'ProfileController@editBranch');
    Route::post('branch/add', 'ProfileController@setBranchNew');
    Route::get('logo', 'ProfileController@getLogo');
    Route::post('logo', 'ProfileController@postLogo');
    Route::get('social', 'ProfileController@getSocial');
    Route::post('social', 'ProfileController@setSocial');
    Route::get('gallery', 'ProfileController@getGallery');
    Route::get('/intro', 'ProfileController@getIntroVideo');
    Route::post('intro', 'ProfileController@setIntroVideo');
    Route::get('/image', 'ProfileController@getImage');
    Route::post('image', 'ProfileController@setImage');
    Route::get('/video', 'ProfileController@getVideo');
    Route::post('video', 'ProfileController@setVideo');
    Route::get('/document', 'ProfileController@getDocument');
    Route::post('document', 'ProfileController@setDocument');
});

Route::get('logos/{file}', function(Illuminate\Http\Request $request, $fileUrl) {
    $storage = \Storage::disk('public');
    $fileUrl = 'logos/' . $fileUrl;
    if ( $storage->has($fileUrl) ) {
        return $storage->get($fileUrl);
    }

    return '404.png';
});

Route::group(['prefix' => 'customer'], function() {
    Route::get('/', 'CustomerController@index');
    Route::post('/', 'CustomerController@save');
});

Route::group(['prefix' => 'mentor'], function() {
    Route::get('/', 'MentorController@getMentorList');
    Route::post('/add', 'MentorController@setMentor');
    Route::get('/add', 'MentorController@getMentor');
    Route::get('/edit/{id}','MentorController@getMentorDetail');
    Route::post('edit/{id}','MentorController@updateMentorDetail');
    Route::get('delete/{id}','MentorController@deleteMentor');
});

Route::group(['prefix' => 'membership'], function() {
    Route::get('/', 'MembershipController@addMembershipForm');
    Route::post('/', 'MembershipController@setMembership');
    Route::post('/edit', 'MembershipController@setMembership');
    Route::get('/edit', 'MembershipController@addMembershipForm');
    
});

Route::group(['prefix' => 'achievement'], function() {
    Route::get('/', 'AchievementController@getAchievement');
    Route::get('/add', 'AchievementController@getAchievementForm');
    Route::post('/add', 'AchievementController@setAchievement');
    Route::get('/edit/{id}', 'AchievementController@editAchievement');
    Route::post('/edit/{id}', 'AchievementController@UpdateAchievement');
    Route::get('/delete/{id}', 'AchievementController@deleteAchievement');
});

Route::group(['prefix' => 'testimonials'], function() {
    Route::get('/', 'VisaController@index');
    Route::get('/add', 'VisaController@getVisa');
    Route::post('/add', 'VisaController@setVisa');
    Route::get('/edit/{id}', 'VisaController@editVisa');
    Route::post('/edit/{id}', 'VisaController@updateVisa');
    Route::get('/delete/{id}', 'VisaController@deleteVisa');
});

Route::group(['prefix' => 'score'], function() {
    Route::get('/', 'ScoreController@index');
    Route::get('/add', 'ScoreController@getScore');
    Route::post('/add', 'ScoreController@setScore');
    Route::get('/edit/{id}', 'ScoreController@editScore');
    Route::post('/edit/{id}', 'ScoreController@updateScore');
    Route::get('/delete/{id}', 'ScoreController@deleteScore');
});

Route::group(['prefix' => 'video-testimonials'], function() {
    Route::get('/', 'TestimonialController@index');
    Route::get('/add', 'TestimonialController@getTestimonial');
    Route::post('/add', 'TestimonialController@setTestimonial');
    Route::get('/edit/{id}', 'TestimonialController@editTestimonial');
    Route::post('/edit/{id}', 'TestimonialController@updateTestimonial');
    Route::get('/delete/{id}', 'TestimonialController@deleteTestimonial');
});

Route::group(['prefix' => 'event'], function() {
    Route::get('/', 'EventController@index');
    Route::get('/add', 'EventController@getEvent');
    Route::post('/add', 'EventController@setEvent');
    Route::get('/edit/{id}', 'EventController@editEvent');
    Route::post('/edit/{id}', 'EventController@updateEvent');
    Route::get('/delete/{id}', 'EventController@deleteEvent');
});

Route::group(['prefix' => 'promote'], function() {
    Route::get('/', 'PromoteController@index');
    Route::get('/badge', 'PromoteController@getBadge');
    Route::get('/advertisement', 'PromoteController@getAdvertisementList');
    Route::get('/advertisement/add', 'PromoteController@getAdvertisement');
    Route::post('/advertisement/add', 'PromoteController@setAdvertisement');
    Route::get('/advertisement/edit/{id}', 'PromoteController@editAdvertisement');
    Route::post('/advertisement/edit/{id}', 'PromoteController@updateAdvertisement');
    Route::get('/promote', 'PromoteController@getPromote');
});

Route::group(['prefix' => 'pages'], function() {
    Route::get('/{slug}', 'PagesController@index');
});