<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin|superadmin']], function() {
    Route::get('/', function () {
        return redirect('admin/dashboard');
    });

    Route::get('/dashboard', ['as'=>'admin.dashboard','uses'=>'Admin\DashboardController@index']);
    Route::get('/dashboard/chart1', ['as'=>'admin.dashboard.chart1','uses'=>'Admin\DashboardController@chart1']);
    Route::get('/dashboard/chart2', ['as'=>'admin.dashboard.chart2','uses'=>'Admin\DashboardController@chart2']);
    Route::get('/dashboard/chart3', ['as'=>'admin.dashboard.chart3','uses'=>'Admin\DashboardController@chart3']);
    Route::get('/dashboard/chart4', ['as'=>'admin.dashboard.chart4','uses'=>'Admin\DashboardController@chart4']);
    Route::get('/dashboard/chart5', ['as'=>'admin.dashboard.chart5','uses'=>'Admin\DashboardController@chart5']);
    Route::get('/dashboard/chart6', ['as'=>'admin.dashboard.chart6','uses'=>'Admin\DashboardController@chart6']);
    Route::get('/dashboard/chart7', ['as'=>'admin.dashboard.chart7','uses'=>'Admin\DashboardController@chart7']);
    
    Route::resource('users','Admin\UserController');

    Route::get('users',['as'=>'users.index','uses'=>'Admin\UserController@index','middleware' => ['permission:users-view|users-create|users-edit|users-delete']]);
    Route::get('users/create',['as'=>'users.create','uses'=>'Admin\UserController@create','middleware' => ['permission:users-create']]);
    Route::post('users/create',['as'=>'users.store','uses'=>'Admin\UserController@store','middleware' => ['permission:users-create']]);
    Route::get('users/{id}',['as'=>'users.show','uses'=>'Admin\UserController@show']);
    Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'Admin\UserController@edit','middleware' => ['permission:users-edit']]);
    Route::patch('users/{id}',['as'=>'users.update','uses'=>'Admin\UserController@update','middleware' => ['permission:users-edit']]);
    Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'Admin\UserController@destroy','middleware' => ['permission:users-delete']]);
    
    Route::get('roles',['as'=>'roles.index','uses'=>'Admin\RoleController@index','middleware' => ['permission:roles-view|roles-create|roles-edit|roles-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'Admin\RoleController@create','middleware' => ['permission:roles-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'Admin\RoleController@store','middleware' => ['permission:roles-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'Admin\RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'Admin\RoleController@edit','middleware' => ['permission:roles-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'Admin\RoleController@update','middleware' => ['permission:roles-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'Admin\RoleController@destroy','middleware' => ['permission:roles-delete']]);

        
    Route::get('pages', ['as'=> 'admin.pages.index', 'uses' => 'Admin\PageController@index','middleware' => ['permission:pages-view|pages-edit']]);
//    Route::post('pages', ['as'=> 'admin.pages.store', 'uses' => 'Admin\PageController@store']);
//    Route::get('pages/create', ['as'=> 'admin.pages.create', 'uses' => 'Admin\PageController@create']);
    Route::put('pages/{pages}', ['as'=> 'admin.pages.update', 'uses' => 'Admin\PageController@update','middleware' => ['permission:pages-edit']]);
    Route::patch('pages/{pages}', ['as'=> 'admin.pages.update', 'uses' => 'Admin\PageController@update','middleware' => ['permission:pages-edit']]);
//    Route::delete('pages/{pages}', ['as'=> 'admin.pages.destroy', 'uses' => 'Admin\PageController@destroy']);
    Route::get('pages/{pages}', ['as'=> 'admin.pages.show', 'uses' => 'Admin\PageController@show','middleware' => ['permission:pages-view']]);
    Route::get('pages/{pages}/edit', ['as'=> 'admin.pages.edit', 'uses' => 'Admin\PageController@edit','middleware' => ['permission:pages-edit']]);

    Route::get('countries', ['as'=> 'admin.countries.index', 'uses' => 'Admin\CountryController@index','middleware' => ['permission:countries-view|countries-create|countries-edit|countries-delete']]);
    Route::post('countries', ['as'=> 'admin.countries.store', 'uses' => 'Admin\CountryController@store','middleware' => ['permission:countries-create']]);
    Route::get('countries/create', ['as'=> 'admin.countries.create', 'uses' => 'Admin\CountryController@create','middleware' => ['permission:countries-create']]);
    Route::put('countries/{countries}', ['as'=> 'admin.countries.update', 'uses' => 'Admin\CountryController@update','middleware' => ['permission:countries-edit']]);
    Route::patch('countries/{countries}', ['as'=> 'admin.countries.update', 'uses' => 'Admin\CountryController@update','middleware' => ['permission:countries-edit']]);
    Route::delete('countries/{countries}', ['as'=> 'admin.countries.destroy', 'uses' => 'Admin\CountryController@destroy','middleware' => ['permission:countries-delete']]);
    Route::get('countries/{countries}', ['as'=> 'admin.countries.show', 'uses' => 'Admin\CountryController@show','middleware' => ['permission:countries-view']]);
    Route::get('countries/{countries}/edit', ['as'=> 'admin.countries.edit', 'uses' => 'Admin\CountryController@edit','middleware' => ['permission:countries-edit']]);

    Route::get('faqs', ['as'=> 'admin.faqs.index', 'uses' => 'Admin\FaqController@index','middleware' => ['permission:faqs-view|faqs-create|faqs-edit|faqs-delete']]);
    Route::post('faqs', ['as'=> 'admin.faqs.store', 'uses' => 'Admin\FaqController@store','middleware' => ['permission:faqs-create']]);
    Route::get('faqs/create', ['as'=> 'admin.faqs.create', 'uses' => 'Admin\FaqController@create','middleware' => ['permission:faqs-create']]);
    Route::put('faqs/{faqs}', ['as'=> 'admin.faqs.update', 'uses' => 'Admin\FaqController@update','middleware' => ['permission:faqs-edit']]);
    Route::patch('faqs/{faqs}', ['as'=> 'admin.faqs.update', 'uses' => 'Admin\FaqController@update','middleware' => ['permission:faqs-edit']]);
    Route::delete('faqs/{faqs}', ['as'=> 'admin.faqs.destroy', 'uses' => 'Admin\FaqController@destroy','middleware' => ['permission:faqs-delete']]);
    Route::get('faqs/{faqs}', ['as'=> 'admin.faqs.show', 'uses' => 'Admin\FaqController@show','middleware' => ['permission:faqs-view']]);
    Route::get('faqs/{faqs}/edit', ['as'=> 'admin.faqs.edit', 'uses' => 'Admin\FaqController@edit','middleware' => ['permission:faqs-edit']]);

    Route::get('visaTypes', ['as'=> 'admin.visaTypes.index', 'uses' => 'Admin\VisaTypeController@index','middleware' => ['permission:visaTypes-view|visaTypes-create|visaTypes-edit|visaTypes-delete']]);
    Route::post('visaTypes', ['as'=> 'admin.visaTypes.store', 'uses' => 'Admin\VisaTypeController@store','middleware' => ['permission:visaTypes-create']]);
    Route::get('visaTypes/create', ['as'=> 'admin.visaTypes.create', 'uses' => 'Admin\VisaTypeController@create','middleware' => ['permission:visaTypes-create']]);
    Route::put('visaTypes/{visaTypes}', ['as'=> 'admin.visaTypes.update', 'uses' => 'Admin\VisaTypeController@update','middleware' => ['permission:visaTypes-edit']]);
    Route::patch('visaTypes/{visaTypes}', ['as'=> 'admin.visaTypes.update', 'uses' => 'Admin\VisaTypeController@update','middleware' => ['permission:visaTypes-edit']]);
    Route::delete('visaTypes/{visaTypes}', ['as'=> 'admin.visaTypes.destroy', 'uses' => 'Admin\VisaTypeController@destroy','middleware' => ['permission:visaTypes-delete']]);
    Route::get('visaTypes/{visaTypes}', ['as'=> 'admin.visaTypes.show', 'uses' => 'Admin\VisaTypeController@show','middleware' => ['permission:visaTypes-view']]);
    Route::get('visaTypes/{visaTypes}/edit', ['as'=> 'admin.visaTypes.edit', 'uses' => 'Admin\VisaTypeController@edit','middleware' => ['permission:visaTypes-edit']]);

    Route::get('relations', ['as'=> 'admin.relations.index', 'uses' => 'Admin\RelationController@index','middleware' => ['permission:relations-view|relations-create|relations-edit|relations-delete']]);
    Route::post('relations', ['as'=> 'admin.relations.store', 'uses' => 'Admin\RelationController@store','middleware' => ['permission:relations-create']]);
    Route::get('relations/create', ['as'=> 'admin.relations.create', 'uses' => 'Admin\RelationController@create','middleware' => ['permission:relations-create']]);
    Route::put('relations/{relations}', ['as'=> 'admin.relations.update', 'uses' => 'Admin\RelationController@update','middleware' => ['permission:relations-edit']]);
    Route::patch('relations/{relations}', ['as'=> 'admin.relations.update', 'uses' => 'Admin\RelationController@update','middleware' => ['permission:relations-edit']]);
    Route::delete('relations/{relations}', ['as'=> 'admin.relations.destroy', 'uses' => 'Admin\RelationController@destroy','middleware' => ['permission:relations-delete']]);
    Route::get('relations/{relations}', ['as'=> 'admin.relations.show', 'uses' => 'Admin\RelationController@show','middleware' => ['permission:relations-view']]);
    Route::get('relations/{relations}/edit', ['as'=> 'admin.relations.edit', 'uses' => 'Admin\RelationController@edit','middleware' => ['permission:relations-edit']]);

    Route::get('purposes', ['as'=> 'admin.purposes.index', 'uses' => 'Admin\PurposeController@index','middleware' => ['permission:purposes-view|purposes-create|purposes-edit|purposes-delete']]);
    Route::post('purposes', ['as'=> 'admin.purposes.store', 'uses' => 'Admin\PurposeController@store','middleware' => ['permission:purposes-create']]);
    Route::get('purposes/create', ['as'=> 'admin.purposes.create', 'uses' => 'Admin\PurposeController@create','middleware' => ['permission:purposes-create']]);
    Route::put('purposes/{purposes}', ['as'=> 'admin.purposes.update', 'uses' => 'Admin\PurposeController@update','middleware' => ['permission:purposes-edit']]);
    Route::patch('purposes/{purposes}', ['as'=> 'admin.purposes.update', 'uses' => 'Admin\PurposeController@update','middleware' => ['permission:purposes-edit']]);
    Route::delete('purposes/{purposes}', ['as'=> 'admin.purposes.destroy', 'uses' => 'Admin\PurposeController@destroy','middleware' => ['permission:purposes-delete']]);
    Route::get('purposes/{purposes}', ['as'=> 'admin.purposes.show', 'uses' => 'Admin\PurposeController@show','middleware' => ['permission:purposes-view']]);
    Route::get('purposes/{purposes}/edit', ['as'=> 'admin.purposes.edit', 'uses' => 'Admin\PurposeController@edit','middleware' => ['permission:purposes-edit']]);

    Route::get('sliderImages', ['as'=> 'admin.sliderImages.index', 'uses' => 'Admin\SliderImageController@index','middleware' => ['permission:sliderImages-view|sliderImages-create|sliderImages-edit|sliderImages-delete']]);
    Route::post('sliderImages', ['as'=> 'admin.sliderImages.store', 'uses' => 'Admin\SliderImageController@store','middleware' => ['permission:sliderImages-create']]);
    Route::get('sliderImages/create', ['as'=> 'admin.sliderImages.create', 'uses' => 'Admin\SliderImageController@create','middleware' => ['permission:sliderImages-create']]);
    Route::put('sliderImages/{sliderImages}', ['as'=> 'admin.sliderImages.update', 'uses' => 'Admin\SliderImageController@update','middleware' => ['permission:sliderImages-edit']]);
    Route::patch('sliderImages/{sliderImages}', ['as'=> 'admin.sliderImages.update', 'uses' => 'Admin\SliderImageController@update','middleware' => ['permission:sliderImages-edit']]);
    Route::delete('sliderImages/{sliderImages}', ['as'=> 'admin.sliderImages.destroy', 'uses' => 'Admin\SliderImageController@destroy','middleware' => ['permission:sliderImages-delete']]);
    Route::get('sliderImages/{sliderImages}', ['as'=> 'admin.sliderImages.show', 'uses' => 'Admin\SliderImageController@show','middleware' => ['permission:sliderImages-view']]);
    Route::get('sliderImages/{sliderImages}/edit', ['as'=> 'admin.sliderImages.edit', 'uses' => 'Admin\SliderImageController@edit','middleware' => ['permission:sliderImages-edit']]);

    Route::get('applications', ['as'=> 'admin.applications.index', 'uses' => 'Admin\ApplicationController@index','middleware' => ['permission:applications-view|applications-create|applications-edit|applications-delete']]);
    Route::post('applications', ['as'=> 'admin.applications.store', 'uses' => 'Admin\ApplicationController@store','middleware' => ['permission:applications-create']]);
    Route::get('applications/create', ['as'=> 'admin.applications.create', 'uses' => 'Admin\ApplicationController@create','middleware' => ['permission:applications-create']]);
    Route::put('applications/{applications}', ['as'=> 'admin.applications.update', 'uses' => 'Admin\ApplicationController@update','middleware' => ['permission:applications-edit']]);
    Route::patch('applications/{applications}', ['as'=> 'admin.applications.update', 'uses' => 'Admin\ApplicationController@update','middleware' => ['permission:applications-edit']]);
    Route::delete('applications/{applications}', ['as'=> 'admin.applications.destroy', 'uses' => 'Admin\ApplicationController@destroy','middleware' => ['permission:applications-delete']]);
    Route::get('applications/{applications}', ['as'=> 'admin.applications.show', 'uses' => 'Admin\ApplicationController@show','middleware' => ['permission:applications-view']]);
    Route::get('applications/{applications}/edit', ['as'=> 'admin.applications.edit', 'uses' => 'Admin\ApplicationController@edit','middleware' => ['permission:applications-edit']]);
    Route::get('applications/{applications}/{status}', ['as'=> 'admin.applications.changeStatus', 'uses' => 'Admin\ApplicationController@changeStatus','middleware' => ['permission:applications-edit']]);

    Route::get('configs', ['as'=> 'admin.configs.index', 'uses' => 'Admin\ConfigController@index','middleware' => ['permission:configs-view|configs-edit']]);
//    Route::post('configs', ['as'=> 'admin.configs.store', 'uses' => 'Admin\ConfigController@store']);
//    Route::get('configs/create', ['as'=> 'admin.configs.create', 'uses' => 'Admin\ConfigController@create']);
    Route::put('configs/{configs}', ['as'=> 'admin.configs.update', 'uses' => 'Admin\ConfigController@update','middleware' => ['permission:configs-edit']]);
    Route::patch('configs/{configs}', ['as'=> 'admin.configs.update', 'uses' => 'Admin\ConfigController@update','middleware' => ['permission:configs-edit']]);
//    Route::delete('configs/{configs}', ['as'=> 'admin.configs.destroy', 'uses' => 'Admin\ConfigController@destroy']);
    Route::get('configs/{configs}', ['as'=> 'admin.configs.show', 'uses' => 'Admin\ConfigController@show','middleware' => ['permission:configs-view']]);
    Route::get('configs/{configs}/edit', ['as'=> 'admin.configs.edit', 'uses' => 'Admin\ConfigController@edit','middleware' => ['permission:configs-edit']]);
});


Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

Route::post('application/step3/{id}', 'ApplicationController@step3');
Route::get('application/step3/{id}', 'ApplicationController@step3');
Route::post('application/step2', 'ApplicationController@step2');
Route::get('pages/{type}', 'PageController@show');
Route::auth();
Route::get('/', 'HomeController@index');

