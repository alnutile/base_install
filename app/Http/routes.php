<?php
/**
 * Per https://laracasts.com/discuss/channels/general-discussion/new-blade-tag-for-unescaped-data-thoughts
 * set blade to 4.2 < standards
 */
Blade::setRawTags('{{', '}}');

Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\RemindersController');

Route::get('/app', ['before' => 'auth', function()
{
    return View::make('layouts.main');
}]);

Route::get('/', function(){
    return Redirect::to('/app');
});
