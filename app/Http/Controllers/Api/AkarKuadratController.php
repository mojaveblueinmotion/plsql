<?php

namespace App\Http\Controllers\Api;

use App\Models\AkarKuadrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AkarKuadratController extends Controller
{
    public function hitungAkarKuadrat($number)
    {
        if(!is_numeric($number)){
            return response()->json(['error' => 'Input Tidak Boleh String'], 400);
        }
        else if ($number > 340000000000000000000000000000000) {
            return response()->json(['error' => 'Angka Melebihi Batas Float'], 400);
        } else {
            $result = DB::select('CALL CalculateAkarKuadrats(?)', array($number));

            return response()->json(['result' => $result]);
        }
    }
}
