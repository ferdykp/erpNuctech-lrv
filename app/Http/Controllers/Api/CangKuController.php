<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CangKuJiBenXinXi;

class CangKuController extends Controller
{
    public function index()
    {
        $data = CangKuJiBenXinXi::all();

        return response()->json([
            'status' => true,
            'message' => 'Data gudang berhasil diambil',
            'data' => $data
        ], 200);
    }
}
