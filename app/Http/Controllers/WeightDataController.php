<?php

namespace App\Http\Controllers;

use App\Models\weightData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightDataController extends Controller
{
    public function index()
    {
        $auth = Auth::user();

        $weights = $auth->weights()->with('user')->orderBy('date', 'asc')->get();
        return view('weight.index', compact('weights'));
    }
    public function create()
    {
        $auth = Auth::user();

        $weight = $auth->weights()->with('user')->latest()->first();

        if ($weight) {
            $date = \Carbon\Carbon::parse($weight->date);
        } else {
            $weight = weightData::all()->where('user_id', 0)->first();
            $date = \Carbon\Carbon::parse($weight->date);
        }

        return view('weight.create', compact('weight', 'date'));

    }
    public function store(Request $request)
    {
        $auth = Auth::user();

        weightData::create([
            'user_id' => $auth->id,
            'date' => $request->input('date'),
            'weight' => $request->input('weight'),
            'bodyfat' => $request->input('bodyfat') ?? 0,
        ]);
        return redirect('/weight/create');
    }
}
