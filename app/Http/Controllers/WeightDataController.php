<?php

namespace App\Http\Controllers;

use App\Models\weightData;
use Carbon\Carbon;
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();

        $weights = $auth->weights()->with('user')->orderBy('date', 'desc')->get(); // newest to oldest
        return view('weight.index', compact('weights'));
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(weightDummyData $weightDummyData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($weightData)
    {
        $weight = weightData::find($weightData);

        return view('weight.edit', compact('weight'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $weightId)
    {
        $auth = auth()->user();

        $weights = $auth->weights()->with('user')->orderBy('date', 'desc')->get(); // newest to oldest

        $weightData = weightData::find($weightId);
        $weightData->date = $request->input('date');
        $weightData->weight = $request->input('weight');
        $weightData->bodyfat = $request->input('bodyfat') ?? 0;
        $weightData->save();

        return view('weight.index', compact('weights'));
    }

    /**
     * Remove the specified resource from storage.
     */
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
