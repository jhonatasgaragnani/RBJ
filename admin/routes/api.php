<?php

Route::group(['prefix' => 'users', 'as' => 'users.', 'namespace' => 'Users'], function () {
    Route::put('update/{user}', 'UserController@update')->name('edit');
    Route::post('add', 'UserController@store')->name('add');

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::put('update/{role}', 'RoleController@update')->name('edit');
        Route::post('add', 'RoleController@store')->name('add');
    });
});

Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'Blog'], function () {
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::post('add', 'PostController@store')->name('add');
        Route::put('edit/{post}', 'PostController@update')->name('edit');
    });
    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::post('add', 'EventController@store')->name('add');
        Route::put('edit/{event}', 'EventController@update')->name('edit');
    });
    Route::group(['prefix' => 'photos', 'as' => 'photos.'], function () {
        Route::post('add', 'PhotoController@store')->name('add');
        Route::put('edit/{photo}', 'PhotoController@update')->name('edit');
    });
    Route::group(['prefix' => 'videos', 'as' => 'videos.'], function () {
        Route::post('add', 'VideoController@store')->name('add');
        Route::put('edit/{video}', 'VideoController@update')->name('edit');
    });
});

Route::group(['prefix' => 'radio', 'as' => 'radio.', 'namespace' => 'Radio'], function () {
    Route::group(['prefix' => 'tops', 'as' => 'tops.'], function () {
        Route::put('reorder', 'TopController@reorder')->name('reorder');
        Route::put('edit/{top}', 'TopController@update')->name('edit');
    });
    Route::group(['prefix' => 'schedules', 'as' => 'schedules.'], function () {
        Route::post('/add', 'ScheduleController@store')->name('add');
        Route::put('/edit/{schedule}', 'ScheduleController@update')->name('edit');
        Route::post('/edit/{day}/schedule', 'DayController@addSchedule')->name('day');
        Route::delete('/remove/{day}/schedule/{schedule}', 'DayController@removeSchedule')->name('day.remove');
        Route::put('/edit/{day}/schedule/{schedule}', 'DayController@updateSchedule')->name('edit.schedule.update');
    });

    Route::group(['prefix' => 'polls', 'as' => 'polls.'], function() {
        Route::post('/add', 'PollController@store')->name('add');
        Route::put('/update/{poll}', 'PollController@update')->name('update');
        Route::delete('/remove/{poll}', 'PollController@destroy')->name('remove');
        Route::post('/{poll}/options/add', 'PollOptionController@store')->name('options.add');
        Route::put('/options/{pollOption}/edit', 'PollOptionController@update')->name('options.edit');
        Route::post('/options/{pollOption}/vote', 'PollOptionController@vote')->name('options.vote');
    });

    Route::group(['prefix' => 'teams', 'as' => 'teams.'], function() {
       Route::post('/add', 'TeamController@store')->name('add');
       Route::put('/update/{team}', 'TeamController@update')->name('update');
       Route::delete('/remove/{team}', 'TeamController@destroy')->name('remove');
    });

    Route::group(['prefix' => 'partners', 'as' => 'partners.'], function() {
       Route::post('/add', 'PartnerController@store')->name('add');
       Route::put('/update/{partner}', 'PartnerController@update')->name('update');
       Route::delete('/remove/{partner}', 'PartnerController@destroy')->name('remove');
    });
});

Route::group(['prefix' => 'settings', 'namespace' => 'Settings', 'as' => 'Settings.'], function() {
   Route::group(['prefix' => 'general', 'as' => 'general.'], function() {
      Route::post('add', 'SettingsController@store')->name('add');
      Route::put('update/{configuration}', 'SettingsController@update')->name('update');
   });
   Route::group(['prefix' => 'meta', 'as' => 'meta.'], function() {
      Route::post('add', 'MetaController@store')->name('add');
      Route::put('/{meta}', 'MetaController@update')->name('edit');
      Route::post('/add/{page}', 'MetaController@storeMeta')->name('page.add');
      Route::delete('/remove/{page}', 'MetaController@destroy')->name('page.remove');
   });
});
