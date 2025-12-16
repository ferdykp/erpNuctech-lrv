<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeiTuoDan;

class WeiTuoDanController extends Controller
{
    public function index(Request $request)
    {
        $query = WeiTuoDan::query();

        // --- Search ---
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('WeiTuoDanHao', 'like', "%$search%")
                    ->orWhere('LianXiRen', 'like', "%$search%")
                    ->orWhere('YingShouZongJinE', 'like', "%$search%");
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

        $allowedSort = ['WTD_ID', 'WeiTuoDanHao', 'LianXiRen', 'YingShouZongJinE', 'RuLuRiQi'];

        if (in_array($sortColumn, $allowedSort)) {
            $query->orderBy($sortColumn, $sortOrder);
        }

        // --- Pagination (ambil semua, tapi paginated untuk efisiensi) ---
        $data = $query->paginate(20)->withQueryString();

        return view('weituodan.index', compact('data'));
    }
}
