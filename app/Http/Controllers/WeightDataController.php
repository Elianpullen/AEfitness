<?php

namespace App\Http\Controllers;

use App\Models\weightData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightDataController extends Controller
{
    public function graph()
    {
        $auth = Auth::user();
        $weights = $auth->weights()->with('user')->orderBy('date', 'asc')->get(); // Oldest to newest

        return view('weight.graph', compact('weights'));
    }

    public function index()
    {
        $auth = Auth::user();
        $weights = $auth->weights()->with('user')->orderBy('date', 'desc')->get(); // newest to oldest

        return view('weight.index', compact('weights'));
    }

    public function create()
    {
        $auth = Auth::user();

        $dateDB = $auth->weights()->latest()->value('date');
        $date = \Carbon\Carbon::parse($dateDB)->format('d F Y');
        $weight = $auth->weights()->latest()->value('weight');
        $bodyfat = $auth->weights()->latest()->value('bodyfat');

        return view('weight.create', compact('date', 'weight', 'bodyfat'));
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

    public function edit($weightData)
    {
        $weight = weightData::find($weightData);

        return view('weight.edit', compact('weight'));
    }

    public function update(Request $request, $weightId)
    {
        $auth = Auth::user();
        $weights = $auth->weights()->with('user')->orderBy('date', 'desc')->get(); // newest to oldest

        $weightData = weightData::find($weightId);
        $weightData->date = $request->input('date');
        $weightData->weight = $request->input('weight');
        $weightData->bodyfat = $request->input('bodyfat') ?? 0;
        $weightData->save();

        return view('weight.index', compact('weights'));
    }

    public function destroy($weightId)
    {
        $auth = Auth::user();

        $weight = weightData::select()
            ->where('user_id', $auth->id)
            ->where('id', $weightId);
        $weight->delete();

        return redirect('/weight');
    }
}
