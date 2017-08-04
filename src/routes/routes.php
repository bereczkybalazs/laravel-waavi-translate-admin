<?php
    Route::get('translate-admin', '\BereczkyBalazs\WaaviTranslateAdmin\Controllers\TranslateAdminController@view');
    Route::resource('translate-admin/resource', '\BereczkyBalazs\WaaviTranslateAdmin\Controllers\TranslateAdminController');


