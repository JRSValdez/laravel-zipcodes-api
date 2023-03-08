<?php

namespace Database\Seeders;

use App\Models\Settlement;
use App\Models\SettletmentTypes;
use Illuminate\Database\Seeder;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settlements = [];
        $keysArray = [];
        $allSTypes = SettletmentTypes::get();
        ini_set('max_execution_time', 180);
        if (($open = fopen(database_path() . "/zipcodes.csv", "r")) !== FALSE) {
            $cont = 0;
            while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                $name = $row[1];
                $key = intval($row[12]);
                $zone_type = $row[13];
                $settlement_type_name = $row[2];
                $cont = $cont + 1;
                if (!in_array($key, $keysArray)) {
                    array_push($keysArray, $key);
                    $sType = $allSTypes->where('name', $settlement_type_name)->first();
                    array_push($settlements, [
                        'name' => $name,
                        'key' => $key,
                        'zone_type' => $zone_type,
                        'settlement_type_id' => $sType->id,
                        'created_at' => date("Y-m-d H:i:s", strtotime('now'))
                    ]);
                }
            }
        }
        ini_set('max_execution_time', 60);


        Settlement::insert($settlements);
    }
}
