<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZipCodeResource;
use App\Models\ZipCode;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    public function index(Request $request, string $zipCode)
    {
        $zipCode = ZipCode::where('code', $zipCode)->with('municipality')->first();
        if ($zipCode) {
            $response = new ZipCodeResource($zipCode);
            return response()->json($response);
        }
        return $this->notFoundResponse();
    }
}
