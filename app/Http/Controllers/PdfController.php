<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona; 
use PDF;

class PdfController extends Controller
{
    public function imprimirpersonas(Request $request)
    {
        $personas=Persona::orderBy('id','ASC')->get();
        $pdf = PDF::loadView('pdf.personasPDF',['personas' => $personas ]);
        $pdf->setPaper('carta', 'A4');
      
         //return $pdf->stream();

         return $pdf->download('Listado de Personas.pdf');
    }    
}
