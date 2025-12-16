<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChanPinXian;


class ChanPinXianController extends Controller
{
    public function index(Request $request)
    {
        $data = ChanPinXian::all();

        return response()->json([
            'status' => true,
            'message' => 'Data gudang berhasil diambil',
            'data' => $data
        ], 200);
    }
}
