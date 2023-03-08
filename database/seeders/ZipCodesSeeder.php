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

                if (isset($codes[$code])) {
                    $oldSettlements = $codes[$code]['settlements'];
                    $oldSettlements = $oldSettlements . ',' . $settlementKey;
                    $codes[$code]['settlements'] = $oldSettlements;
                } else {
                    $municipalityKey = intval($row[11]);
                    $federalEntityKey = intval($row[7]);
                    $locality = $row[5];
                    $codes[$code] = [
                        'code' => $code,
                        'locality' => $locality,
                        'settlements' => $settlementKey,
                        'municipality_id' => $municipalityKey,
                        'federal_entity_id' => $federalEntityKey
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
