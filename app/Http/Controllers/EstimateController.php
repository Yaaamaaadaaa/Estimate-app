<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstimateController extends Controller
{
    public function index()
    {
        $estimates = Auth::user()->estimates()->get();

        return view('estimates/index', [
            'estimates' => $estimates,
        ]);
    }

    public function showEditForm(Request $request)
    {
        $estimate_id = $request->input('estimate');
        $estimate = Estimate::find($estimate_id);

        return view('estimates/edit', [
            'estimate' => $estimate,
        ]);
    }

    public function edit(Request $request)
    {
        $estimate_id = $request->input('estimate');
        $current_estimate = Estimate::find($estimate_id);

        $current_estimate->title = $request->title;
        $current_estimate->location = $request->location;
        $current_estimate->transaction = $request->transaction;
        $current_estimate->effectiveness = $request->effectiveness;
        $current_estimate->customer = $request->customer;
        $current_estimate->deadline_at = $request->deadline_at;
        $current_estimate->estimated_at = $request->estimated_at;

        $current_estimate->save();

        return redirect()->route('estimates.edit', [
            'estimate' => $estimate_id
        ]);

    }

    public function create()
    {
        $estimate = new Estimate();
        Auth::user()->estimates()->save($estimate);

        return redirect()->route('estimates.edit', [
            'estimate' => $estimate->id,
        ]);
    }

    public function delete(Request $request)
    {
        $estimate_id = $request->input('estimate');
        Estimate::find($estimate_id)->delete();

        return redirect()->route('estimates.index');
    }
}
