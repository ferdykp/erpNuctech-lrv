<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientWeb;   // ← Tambahkan ini!

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = ClientWeb::query();

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', "%{$request->search}%")
                    ->orWhere('alamat', 'like', "%{$request->search}%");
            });
        }

        // Date range
        if ($request->filled('start_date')) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        // Sort
        $sort = $request->get('sort', 'desc');
        $query->orderBy('tanggal', $sort);

        $data = $query->paginate(10)->withQueryString();

        return view('dashboard.index', compact('data'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string',
            'alamat'    => 'nullable|string',
            'tanggal'   => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        return ClientWeb::create($data);
    }

    public function show($id)
    {
        return ClientWeb::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $client = ClientWeb::findOrFail($id);
        $client->update($request->all());

        return $client;
    }

    public function destroy($id)
    {
        $client = ClientWeb::findOrFail($id);
        $client->delete();

        return response()->json(['message' => 'deleted']);
    }
}
