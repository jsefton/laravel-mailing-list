<?php

if (config('mailing-list.api')) {
    Route::group(['middleware' => 'api', 'namespace' => 'JSefton\MailingList\Http\Controllers', 'as' => 'api.mailing-list'], function () {
        Route::post(config('mailing-list.route') . '/{mailingList}', 'MailingListController@subscribe')->name('.subscribe');
    });
}
