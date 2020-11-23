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

    public function showCreateForm()
    {
        return view('estimates/create.vue');
    }
}
