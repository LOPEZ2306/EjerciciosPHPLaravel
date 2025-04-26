<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index(Request $request)
    {

        $totalFormatted = null;
        $propinaAmountFormatted = null;
        $totalWithTipFormatted = null;
        $propina = null;
        $error = null;

        if ($request->isMethod('post')) {

            $productos = $request->input('productos', []);
            $propina = $request->input('propina', 10);

            $total = array_sum($productos);

            $propinaAmount = ($total * $propina) / 100;

            $totalWithTip = $total + $propinaAmount;

            $totalFormatted = number_format($total, 0, ',', '.');
            $propinaAmountFormatted = number_format($propinaAmount, 0, ',', '.');
            $totalWithTipFormatted = number_format($totalWithTip, 0, ',', '.');
        }

        return view('tips.index', compact(
            'totalFormatted',
            'propinaAmountFormatted',
            'totalWithTipFormatted',
            'propina',
            'error'
        ));
    }
}
