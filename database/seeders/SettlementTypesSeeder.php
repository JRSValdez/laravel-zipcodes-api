<?php

namespace Database\Seeders;

use App\Models\SettletmentTypes;
use Illuminate\Database\Seeder;

class SettlementTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settlementTypes = collect();
        if (($open = fopen(database_path() . "/zipcodes.csv", "r")) !== FALSE) {
            while (($row = fgetcsv($open, 1000, "|")) !== FALSE) {
                $name = $row[2];
                if (!$settlementTypes->contains('name', $name)) {
                    $settlementTypes->add(['name' => $name]);
                }
            }

            fclose($open);
        }

        SettletmentTypes::insert($settlementTypes->toArray());
    }
}
