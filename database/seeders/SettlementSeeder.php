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
            $now = date("Y-m-d H:i:s", strtotime('now'));
            while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                $name = $row[1];
                $key = intval($row[12]);
                $zone_type = $row[13];
                $settlement_type_name = $row[2];
                $municipalityKey = intval($row[11]);
                $id = intval($key . $municipalityKey);
                if (!isset($settlements[$id])) {
                    $sType = $allSTypes->where('name', $settlement_type_name)->first();
                    $settlements[$id] = [
                        'name' => $name,
                        'key' => $key,
                        'zone_type' => $zone_type,
                        'settlement_type_id' => $sType->id,
                        'municipality_id' => $municipalityKey,
                        'created_at' => $now
                    ];
                }
            }
            fclose($open);
        }

        $settlementsCollection = collect($settlements);

        foreach ($settlementsCollection->chunk(1000) as $chunk) {
            Settlement::insert($chunk->toArray());
        }
    }
}
