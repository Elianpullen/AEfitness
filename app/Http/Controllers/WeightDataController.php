<?php

namespace App\Http\Controllers;

use App\Models\weightData;
use Illuminate\Http\Request;

class WeightDataController extends Controller
{


    public function index()
    {
        $weights = weightData::orderBy('date', 'asc')->get();
        return view('weight.create', compact('weights'));
    }

    public function create()
    {
        $weight = weightData::latest()->first();
        $date = \Carbon\Carbon::parse($weight->date ?? 0);
        return view('weight.index', compact('weight', 'date'));
    }

    public function store(Request $request)
    {
        $weight = new weightData;
        $weight->date = $request->input('date');
        $weight->weight = $request->input('weight');
        $weight->bodyfat = $request->input('bodyfat') ?? 0;
        $weight->save();
        return redirect('/weight/create')->with('success', 'Weight added');
    }
}
