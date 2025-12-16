<?php

namespace App\Http\Controllers;

use App\Models\CangKuJiBenXinXi;
use Illuminate\Http\Request;

class CangKuJiBenXinXiController extends Controller
{
    public function index(Request $request)
    {
        $query = CangKuJiBenXinXi::query();

        // --- Search ---
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('CKJBXX_ID', 'like', "%$search%")
                    ->orWhere('CangKuMingCheng', 'like', "%$search%")
                    ->orWhere('MianJi', 'like', "%$search%")
                    ->orWhere('YongTuMiaoShu', 'like', "%$search%")
                    ->orWhere('FuZuRen', 'like', "%$search%");
            });
        }

        // --- Date Range (RuLuRiQi) ---
        if ($request->filled('start_date')) {
            $query->whereDate('RuLuRiQi', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('RuLuRiQi', '<=', $request->end_date);
        }

        // --- Sorting ---
        $sortColumn = $request->get('sort_by', 'RuLuRiQi'); // default sort by tanggal
        $sortOrder  = $request->get('sort', 'desc');        // default desc

        $allowedSort = ['CangKuMingCheng', 'MianJi', 'YongTuMiaoShu'];

        if (in_array($sortColumn, $allowedSort)) {
            $query->orderBy($sortColumn, $sortOrder);
        }

        // --- Pagination (ambil semua, tapi paginated untuk efisiensi) ---
        $data = $query->paginate(20)->withQueryString();

        return view('cangKuJiBenXinXi.index', compact('data'));
    }
}
