<?php

namespace Database\Seeders;

use App\Models\Settlement;
use App\Models\ZipCode;
use Illuminate\Database\Seeder;

class ZipCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = [];
        ini_set('max_execution_time', 180);
        if (($open = fopen(database_path() . "/zipcodes.csv", "r")) !== FALSE) {
            while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                $code = $row[0];
                $settlementKey = intval($row[12]);
                $municipalityKey = intval($row[11]);
                if (isset($codes[$code])) {
                    $oldSettlements = $codes[$code]['settlements'];
                    $oldSettlements = $oldSettlements . ',' . $settlementKey;
                    $codes[$code] = [
                        'code' => $code,
                        'settlements' => $oldSettlements,
                        'municipality_id' => $municipalityKey
                    ];
                } else {
                    $codes[$code] = [
                        'code' => $code,
                        'settlements' => $settlementKey,
                        'municipality_id' => $municipalityKey
                    ];
                }
            }

            $zipCodesCollection = collect($codes);

            foreach ($zipCodesCollection->chunk(1000) as $chunk) {
                ZipCode::insert($chunk->toArray());
            }
        }
    }
}
