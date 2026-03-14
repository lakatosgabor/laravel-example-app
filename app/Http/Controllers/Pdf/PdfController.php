<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generateTestPdf(){
        $data = [
            'title' => 'Teszt PDF Generálás',
            'date' => date('Y-m-d'),
            'user' => auth()->user()->name ?? 'Vendég'
        ];

        $pdf = Pdf::loadView('pdf.test', $data);

        return $pdf->stream('teszt.pdf');
        
        // return $pdf->download('teszt.pdf');
    }
}
