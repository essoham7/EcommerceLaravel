<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFcontroller extends Controller
{
    public function PDF(){
        $pdf = PDF::loadView('facture');
    	return $pdf->stream('facture.pdf');
    }


}
