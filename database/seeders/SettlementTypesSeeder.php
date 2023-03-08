<?php

namespace Database\Seeders;

use App\Models\SettletmentTypes;
use Illuminate\Database\Seeder;
use UConverter;

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
            $now = date("Y-m-d H:i:s", strtotime('now'));
            while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                $name = $row[2];
                if (!$settlementTypes->contains('name', $name)) {
                    $settlementTypes->add([
                        'name' => $name,
                        'created_at' => $now
                    ]);
                }
            }

            fclose($open);
        }

        SettletmentTypes::insert($settlementTypes->toArray());
    }
}
