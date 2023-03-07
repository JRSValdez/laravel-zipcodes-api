<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
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

        dd($settlementTypes);
    }
}