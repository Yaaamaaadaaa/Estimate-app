<?php

namespace App\Http\Controllers;

use App\Estimate;
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
}
