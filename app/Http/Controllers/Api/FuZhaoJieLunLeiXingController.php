<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuZhaoJieLunLeiXing;

class FuZhaoJieLunLeiXingController extends Controller
{
    public function index(Request $request)
    {
        $data = FuZhaoJieLunLeiXing::all();

        return response()->json([
            'status' => true,
            'message' => 'OK',
            'data' => $data
        ], 200);
    }
}
