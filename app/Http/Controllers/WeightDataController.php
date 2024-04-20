<?php

namespace App\Http\Controllers;

use App\Models\weightData;
use Carbon\Carbon;
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
    public function graph()
    {
        $auth = Auth::user();

        $weights = $auth->weights()->with('user')->orderBy('date', 'asc')->get();
        return view('weight.graph', compact('weights'));
    }

    public function create()
    {
        $auth = Auth::user();

        $weight = $auth->weights()->with('user')->latest()->first();

        if (empty($weight)) {
            $date = Carbon::now()->format('d F Y');
            $weight = '69';
            $bodyfat = '22';
        } else {
            $dateDB = $auth->weights()->latest()->value('date');
            $date = \Carbon\Carbon::parse($dateDB)->format('d F Y');
            $weight = $auth->weights()->latest()->value('weight');
            $bodyfat = $auth->weights()->latest()->value('bodyfat');
        }
        return view('weight.create', compact('weight', 'date', 'bodyfat'));
    }

    public function edit(weightData $weightData)
    {
        $auth = Auth::user();


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
