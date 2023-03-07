<?php

namespace Database\Seeders;

use App\Models\FederalEntities;
use Illuminate\Database\Seeder;

class FederalEntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $federalEntitties = collect();
        if (($open = fopen(database_path() . "/zipcodes.csv", "r")) !== FALSE) {
            while (($row = fgetcsv($open, 1000, "|")) !== FALSE) {
                $name = $row[4];
                $key = $row[7];
                if (!$federalEntitties->contains('name', $name)) {
                    $federalEntitties->add(['name' => $name, 'key' => $key, 'code' => '']);
                }
            }

            fclose($open);
        }

        FederalEntities::insert($federalEntitties->toArray());
    }
}
