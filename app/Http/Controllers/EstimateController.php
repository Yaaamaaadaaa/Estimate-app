<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Item;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    public function index()
    {
        $estimates = Estimate::all();

        return view('estimates/index', [
            'estimates' => $estimates,
        ]);
    }

    public function showEditForm(Estimate $estimate)
    {
        return view('estimates/edit', [
            'estimate' => $estimate,
        ]);
    }

    public function create()
    {
        $estimate = new Estimate();
        $estimate->save();

        return redirect()->route('estimates.edit', [
            'estimate' => $estimate->id,
        ]);
    }
}
