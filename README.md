## Installion
Require package
```
composer require bereczkybalazs/laravel-waavi-translate-admin
```
Register service provider in config/app.php
```
'providers' => [
...
BereczkyBalazs\WaaviTranslateAdmin\TranslateAdminProvider::class,
...
];
```
Publish views
```
php artisan vendor:publish
```
