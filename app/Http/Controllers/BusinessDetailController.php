<?php

namespace App\Http\Controllers;

use App\Models\BusinessDetail;
use Illuminate\Http\Request;

class BusinessDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BusinessDetail::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('no_order', 'like', "%{$request->search}%")
                    ->orWhere('status_order', 'like', "%{$request->search}%");
            });
        }

        // if ($request->filled('start_date')) {
        //     $query->whereData('entry_time', '>=', $request->start_date);
        // }

        // if ($request->filled('end_date')) {
        //     $query->whereDate('entry_time', '<=', $request->end_date);
        // }

        $sort = $request->get('sort', 'desc');
        $query->orderBy('id', $sort);

        $data = $query->paginate(10)->withQueryString();

        return view('BusinessDetail.index', compact('data'));
        // return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'no_order' => 'required|string',
            'status_order' => 'required|string',
            'custom_abbrev' => 'required|string',
            'total' => 'required|string',
            'order_form' => 'required|string',
            'appointments' => 'required|string',
            'order_type' => 'required|string',
            'time_range' => 'required|string',
            'arrived' => 'required|date',
            'estimate_delivery' => 'required|string',
            'release' => 'required|string',
            'sales_staff' => 'required|string',
            'custom_notes' => 'required|string',
            'people_call' => 'required|string',
            'reviewer' => 'required|string',
            'date_review' => 'required|date',
            'people_in' => 'required|string',
            'date_in' => 'required|date',
            'modified_by' => 'required|string',
            'time_modified' => 'required|string',
        ]);

        // return response()->json([
        //     'message' => 'Data berhasil diterima',
        //     'data' => $data
        // ], 200);

        return BusinessDetail::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return BusinessDetail::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $customer = BusinessDetail::findOrFail($id);
        $customer->update($request->all());

        return $customer;
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = BusinessDetail::findOrFail($id);
        $customer->delete();

        return response()->json(['message' => 'deleted']);
    }
}
