<?php
/**
 * Per https://laracasts.com/discuss/channels/general-discussion/new-blade-tag-for-unescaped-data-thoughts
 * set blade to 4.2 < standards
 */
Blade::setRawTags('{{', '}}');

Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\RemindersController');

/**
 * Setup our grouping of api/v1 functions
 * Also note before = auth
 */
Route::group(['prefix' => '/api/v1', 'before' => 'auth'], function(){
    Route::resource('users', 'UsersController');
});

Route::get('/app', ['before' => 'auth', function()
{
    return View::make('layouts.main');
}]);

Route::get('/', function(){
    return Redirect::to('/app');
});
