<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaoZuoRiZhi;

class CaoZuoRiZhiController extends Controller
{
    public function index(Request $request)
    {
        $query = CaoZuoRiZhi::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('CZRZID', 'like', "%$search%")
                    ->orWhere('CaoZuoRen', 'like', "%$search%")
                    ->orWhere('CaoZuoShiJian', 'like', "%$search%")
                    ->orWhere('CaoZuoNeiRong', 'like', "%$search%")
                    ->orWhere('CaoZuoGongNeng', 'like', "%$search%");
            });
        }

        // --- Date Range (RuLuRiQi) ---
        if ($request->filled('start_date')) {
            $query->whereDate('CaoZuoShiJian', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('CaoZuoShiJian', '<=', $request->end_date);
        }

        // --- Sorting ---
        $sortColumn = $request->get('sort_by', 'CaoZuoShiJian'); // default sort by tanggal
        $sortOrder  = $request->get('sort', 'desc');        // default desc

        $allowedSort = ['CZRZID', 'CaoZuoRen', 'CaoZuoShiJian', 'CaoZuoNeiRong', 'CaoZuoGongNeng'];

        if (in_array($sortColumn, $allowedSort)) {
            $query->orderBy($sortColumn, $sortOrder);
        }

        // --- Pagination (ambil semua, tapi paginated untuk efisiensi) ---
        $data = $query->paginate(20)->withQueryString();

        return view('caoZuoRiZhi.index', compact('data'));
    }
}
