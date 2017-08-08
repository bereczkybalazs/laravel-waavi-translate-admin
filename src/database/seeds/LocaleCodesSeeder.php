<?php

use Illuminate\Database\Seeder;

class LocaleCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->locales as $locale) {
            DB::table('translator_languages')->insert($locale);
        }

    }

    private $locales = [
        ['locale' => 'en', 'name' => 'english'],
        ['locale' => 'hu', 'name' => 'hungarian'],
        ['locale' => 'de', 'name' => 'german']
    ];
}
