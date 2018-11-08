<?php

use Illuminate\Support\Facades\Route;

/*
|-----------------------------------------------------------------------------------------------------------------------
| Auth Routes
|-----------------------------------------------------------------------------------------------------------------------
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::group(['namespace' => 'Auth', 'prefix' => 'admin'], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });


    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |  Backend routes
    |-----------------------------------------------------------------------------------------------------------------------
    |
    */

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

        Route::group(['namespace' => 'Dashboard'], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
        });

        Route::group(['prefix' => 'users', 'as' => 'users.', 'namespace' => 'Users'], function () {
            Route::get('/', 'UserController@index')->name('show');
            Route::get('/edit/{user}', 'UserController@edit')->name('edit');
            Route::get('/add', 'UserController@create')->name('add');
            Route::get('/profile/{user}', 'UserController@show')->name('read');
            Route::delete('/delete/{user}', 'UserController@destroy')->name('delete');

            Route::group(['prefix' => 'roles'], function () {
                Route::get('/', 'RoleController@index')->name('roles');
                Route::group(['as' => 'roles.'], function () {
                    Route::get('/edit/{role}', 'RoleController@edit')->name('edit');
                    Route::get('/add', 'RoleController@create')->name('add');
                    Route::get('/read/{role}', 'RoleController@show')->name('read');
                    Route::delete('/delete/{role}', 'RoleController@destroy')->name('delete');
                });
            });
            Route::get('permissions', 'PermissionController@index')->name('permissions');
        });

        Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'Blog'], function () {
            Route::group(['prefix' => 'posts'], function () {
                Route::get('/', 'PostController@index')->name('posts');

                Route::group(['as' => 'posts.'], function () {
                    Route::get('/add', 'PostController@create')->name('add');
                    Route::get('/edit/{post}', 'PostController@edit')->name('edit');
                    Route::get('/show/{post}', 'PostController@show')->name('read');
                    Route::delete('/delete/{post}', 'PostController@destroy')->name('delete');
                });
            });
            
            Route::group(['prefix' => 'events'], function () {
                Route::get('/', 'EventController@index')->name('events');

                Route::group(['as' => 'events.'], function () {
                    Route::get('/add', 'EventController@create')->name('add');
                    Route::get('/edit/{event}', 'EventController@edit')->name('edit');
                    Route::get('/show/{event}', 'EventController@show')->name('read');
                    Route::delete('/delete/{event}', 'EventController@destroy')->name('delete');
                });
            });
            
            Route::group(['prefix' => 'photos'], function () {
                Route::get('/', 'PhotoController@index')->name('photos');

                Route::group(['as' => 'photos.'], function () {
                    Route::get('/add', 'PhotoController@create')->name('add');
                    Route::get('/edit/{photo}', 'PhotoController@edit')->name('edit');
                    Route::delete('/delete/{photo}', 'PhotoController@destroy')->name('delete');
                });
            });

            Route::group(['prefix' => 'videos'], function () {
                Route::get('/', 'VideoController@index')->name('videos');


                Route::group(['as' => 'videos.'], function () {
                    Route::get('/add', 'VideoController@create')->name('add');
                    Route::get('/edit/{video}', 'VideoController@edit')->name('edit');
                    Route::delete('/delete/{video}', 'VideoController@destroy')->name('delete');
                });
            });

            Route::get('interviews', 'InterviewController@index')->name('interviews');
            Route::get('files', 'FileController@index')->name('files');
        });

        Route::group(['prefix' => 'radio', 'as' => 'radio.', 'namespace' => 'Radio'], function () {
            Route::get('questions', 'QuestionController@index')->name('questions');

            Route::group(['prefix' => 'schedule'], function () {
                Route::get('/', 'ScheduleController@index')->name('schedule');

                Route::group(['as' => 'schedules.'], function () {
                    Route::get('/add', 'ScheduleController@create')->name('add');
                    Route::get('/edit/{schedule}', 'ScheduleController@edit')->name('edit');
                });
            });

            Route::group(['prefix' => 'days', 'as' => 'days.'], function () {
                Route::get('/edit/{day}', 'DayController@edit')->name('edit');
                Route::get('/edit/{day}/schedule/{schedule}', 'DayController@editSchedule')->name('edit.schedule');
            });

            Route::group(['prefix' => 'tops'], function () {
                Route::get('/', 'TopController@index')->name('tops');

                Route::group(['as' => 'tops.'], function () {
                    Route::get('/edit/{top}', 'TopController@edit')->name('edit');
                });
            });

            Route::group(['prefix' => 'polls'], function () {
                Route::get('/', 'PollController@index')->name('polls');
                Route::group(['as' => 'polls.'], function () {
                    Route::get('/edit/{poll}', 'PollController@edit')->name('edit');
                });
            });

            Route::group(['prefix' => 'teams'], function() {
               Route::get('/', 'TeamController@index')->name('teams');

               Route::group(['as' => 'teams.'], function() {
                    Route::get('/add', 'TeamController@create')->name('add');
                    Route::get('/edit/{team}', 'TeamController@edit')->name('edit');
               });
            });

            Route::group(['prefix' => 'partners'], function() {
                Route::get('/', 'PartnerController@index')->name('partners');

                Route::group(['as' => 'partners.'], function() {
                   Route::get('/add', 'PartnerController@create')->name('add');
                   Route::get('/edit/{partner}', 'PartnerController@edit')->name('edit');
                });
            });
        });

        Route::group(['prefix' => 'settings', 'as' => 'settings.', 'namespace' => 'Settings'], function () {
            Route::get('general', 'SettingsController@index')->name('general');
            Route::get('/', 'MetaController@index')->name('meta');
            Route::group(['prefix' => 'meta', 'as' => 'meta.'], function () {
                Route::get('/edit/{page}', 'MetaController@edit')->name('edit');
            });
        });
    });
});
