<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Notifications\Notifiable;

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
//Front End Routes
Route::get('/domainstore','FrontController@index')->name('front.index');
// Route::get('/about','FrontController@about')->name('front.about');
// Route::get('/contact','FrontController@contact')->name('front.contact');
// Route::get('/f_domain','FrontController@domain')->name('front.domain');
// Route::get('/testimonial','FrontController@testimonial')->name('front.testimonial');
// Route::get('/owner/{id}','FrontController@owner')->name('front.owner');


Route::middleware('auth')->group(function(){
//domain urls
Route::get('/', 'HomeController@index')->name('home');
Route::get('/builder/{domain_id?}', 'BuilderController@showEditor');
Route::get('/domain/query/{did?}', 'DomainController@queryShow')->name('query.show');
Route::get('/domain/{did?}', 'DomainController@index')->name('domain.index');
Route::post('/domain', 'DomainController@store')->name('domain.store');
Route::get('/domain/del/{did}', 'DomainController@destroy')->name('domain.del');

//template urls
Route::get('/template/{tid?}', 'TemplateController@index')->name('temp.index');
Route::post('/template', 'TemplateController@store')->name('temp.form');
Route::get('/template/del/{tid}', 'TemplateController@delTemp')->name('temp.del');

//placeholder url
Route::get('/placeholders', 'Placeholders@index')->name('ph.show');
Route::post('/placeholders', 'Placeholders@store')->name('ph.store');
//email url
// Route::resource('/email/{$did}','EmailQueryController');
//Password Reset
Route::post('reset_password_without_token', 'ProfileController@updatePassword');
});
// contact form submission 
Route::post('/sendmessage','ContactController@Save')->name('contact.save');

Route::get('/email/link/{id}','EmailQueryController@link')->name('email.link');
Route::get('/email_template/{id}','EmailQueryController@emailTemplatefetch')->name('emailTemplatefetch');
Route::get('/email_template/search','EmailQueryController@getPlaceholders')->name('emailTemplateSearch');
Route::post('/tiny/search','EmailQueryController@getPlaceholdersTiny')->name('tinysearch');
Route::get('tinysearch/{id}','EmailQueryController@emailTinyFetch')->name('emailTinyFetch');


Route::get('email_template','EmailQueryController@emailTemplate')->name('emailtemplate');
Route::post('email_template/save','EmailQueryController@emailTemplateSave')->name('emailtemplate.save');
Route::post('/subject/search','EmailQueryController@getPlaceholders')->name('subjectsearch');//email template
Route::get('email_subject/{id}','EmailQueryController@emailSubjectFetch')->name('emailSubjectFetch');//email template
Route::post('tiny/emailsearch','EmailQueryController@getPlaceholdersEmailTiny')->name('tinyemailsearch');//email template
Route::get('tinyemailsearch/{id}','EmailQueryController@TemplateFetch')->name('EmailTinyFetch');//email template
// Route::get('admin/invoice/create','InvoiceController@create');
// Route::get('email_template/email','InvoiceController@getAutocompleteData'); 
//samples
Route::get('samples/default', 'TemplateController@showDefault')->name('temp.default');
Route::get('samples/t1', 'TemplateController@showT1')->name('temp.t1');
Route::get('samples/t2', 'TemplateController@showT2')->name('temp.t2');

//domain preview
Route::get('/domain/view/{did}', 'DomainController@preview')->name('domain.view');
Route::get('/domainsendquery/view/{did}', 'DomainController@sendpreview')->name('domain.sendquery');
//save domain query
Route::post('/domain/query', 'DomainController@query')->name('query.save');
//email save and send
Route::post('/email/{did}','EmailQueryController@email')->name('email.save');
//Profile
Route::get('/profile','ProfileController@index')->name('profile.show');

Route::post('/profile/{id}','ProfileController@updateProfile')->name('profile.update');

Route::get('/test', function(){
    return !empty(session('domains')) ? session('domains') : 'go waay';
});

Auth::routes(['verify' => true]);