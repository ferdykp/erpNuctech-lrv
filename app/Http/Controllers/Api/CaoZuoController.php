<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaoZuoRiZhi;

class CaoZuoController extends Controller
{
    public function index(Request $request)
    {
        $data = CaoZuoRiZhi::all();

        return response()->json([
            'status' => true,
            'message' => 'Data Sended',
            'data' => $data
        ], 200);
    }
}
