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
Replace the following entry in config/app.php
```
'providers' => [
  ...
  Illuminate\Translation\TranslationServiceProvider::class,
  ...
];
```
with:
```
'providers' => [
  ...
  Waavi\Translation\TranslationServiceProvider::class,
  ...
];
```
Publish views
```
php artisan vendor:publish --tag=bereczkybalazs_translate
```
Add seeder to database/seeds/DatabaseSeeder.php
```
  ...
  $this->call(TranslateAdminLocaleCodesSeeder::class);
  ...
```
Run seeder and fill tables for waavi
```
php artisan migrate
php artisan db:seed
php artisan translator:load
```
