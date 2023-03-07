<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $federalEntitties = collect();
        if (($open = fopen(database_path() . "/zipcodes.csv", "r")) !== FALSE) {
            while (($row = fgetcsv($open, 1000, "|")) !== FALSE) {
                $name = $row[4];
                $key = $row[7];
                if (!$federalEntitties->contains('name', $name)) {
                    $federalEntitties->add(['name' => $row[4], 'key' => $key, 'code' => null]);
                }
            }

            fclose($open);
        }

        dd($federalEntitties);
    }
}
