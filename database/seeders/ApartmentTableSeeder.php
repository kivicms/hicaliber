<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ApartmentTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = __DIR__ . '/csvs/property-data.csv';
        $this->tablename = 'apartments';
        $this->delimiter = ',';
        $this->mapping = ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'];
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
