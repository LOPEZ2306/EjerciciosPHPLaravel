<?php

namespace App\Http\Controllers;

class ExpensesController extends Controller
{

    public function index()
    {
        return view('expenses.index');
    }

}
