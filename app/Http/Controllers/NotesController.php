<?php

namespace App\Http\Controllers;

class NotesController extends Controller
{

    public function index()
    {
        return view('notes.index');
    }

}
