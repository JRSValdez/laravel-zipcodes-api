<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Seeder;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = [];
        $keysArray = [];
        ini_set('max_execution_time', 180);
        if (($open = fopen(database_path() . "/zipcodes.csv", "r")) !== FALSE) {
            $now = date("Y-m-d H:i:s", strtotime('now'));
            while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                $name = $row[3];
                $key = intval($row[11]);
                if (!in_array($key, $keysArray)) {
                    array_push($keysArray, $key);
                    array_push($municipalities, [
                        'name' => $name,
                        'key' => $key,
                        'created_at' => $now
                    ]);
                }
            }
            fclose($open);
        }

        Municipality::insert($municipalities);
    }
}
