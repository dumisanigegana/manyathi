<?php

namespace Database\Seeders;

use BinshopsBlog\Models\BinshopsLanguage;
use Illuminate\Database\Seeder;

class BinshopsLanguagesTableSeeder extends Seeder
{
    public function run()
    {
        $locale = [
            [
                'id'    => 1,
                'name' => 'Admin',
                'locale' => 'en',
                'iso_code' => 'US_EN',
                'date_format' => 'DDMMYY',
                'active' => true
            ]
           
        ];

        BinshopsLanguage::insert($locale);
    }
}
