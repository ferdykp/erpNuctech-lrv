<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillCreateRule;

class BillCreateRuleController extends Controller
{
    public function index(Request $request)
    {
        $query = BillCreateRule::query();

        // --- Search ---
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('BCRU_ID', 'like', "%$search%")
                    ->orWhere('BCRUType', 'like', "%$search%")
                    ->orWhere('Prefix', 'like', "%$search%")
                    ->orWhere('BCRU_Remark', 'like', "%$search%");
            });
        }

        // --- Date Range (RuLuRiQi) ---
        if ($request->filled('start_date')) {
            $query->whereDate('Create_time', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('Create_time', '<=', $request->end_date);
        }

        // --- Sorting ---
        $sortColumn = $request->get('sort_by', 'Create_time'); // default sort by tanggal
        $sortOrder  = $request->get('sort', 'desc');        // default desc

        $allowedSort = ['BCRU_ID', 'BCRUType', 'Prefix', 'Create_Time'];

        if (in_array($sortColumn, $allowedSort)) {
            $query->orderBy($sortColumn, $sortOrder);
        }

        // --- Pagination (ambil semua, tapi paginated untuk efisiensi) ---
        $data = $query->paginate(20)->withQueryString();

        return view('billCreateRule.index', compact('data'));
    }
}
