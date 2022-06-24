<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiLaundry;
use PDF;

class PdfPrint extends Controller
{
    public function print()
    {
        $transaksi = TransaksiLaundry::all();
        $transaksi = $transaksi->reverse();
        $pdf = PDF::loadView('pdf.pdf', ['transaksi'=>$transaksi]);
        return $pdf->stream();
    }
}
