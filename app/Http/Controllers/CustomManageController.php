<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerManegement;

class CustomManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CustomerManegement::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('custom_name', 'like', "%{$request->search}%")
                    ->orWhere('custome_code', 'like', "%{$request->search}%");
            });
        }

        if ($request->filled('start_date')) {
            $query->whereDate('entry_time', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('entry_time', '<=', $request->end_date);
        }

        $sort = $request->get('sort', 'desc');
        $query->orderBy('entry_time', $sort);

        $data = $query->paginate(10)->withQueryString();

        return view('customManage.index', compact('data'));
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
            'custom_code' => 'required|string',
            'custom_name' => 'required|string',
            'custom_abbrev' => 'required|string',
            'industry_class' => 'required|string',
            'no_telp' => 'required|string',
            'seller' => 'required|string',
            'fax' => 'required|string',
            'email' => 'required|string',
            'entry_person' => 'required|string',
            'entry_time' => 'required|date',
            'isIt_affective' => 'required|string',
        ]);

        return CustomerManegement::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CustomerManegement::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = CustomerManegement::findOrFail($id);
        $customer->update($request->all());

        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = CustomerManegement::findOrFail($id);
        $customer->delete();

        return response()->json(['message' => 'deleted']);
    }
}
