<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function index(){

    	$pdf = PDF::loadView('pdf/generate_pdf');

    	return $pdf->stream();

    }
}
