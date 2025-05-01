<?php

namespace App\Http\Controllers;

class TasksController extends Controller
{

    public function index()
    {
        return view('tasks.index');
    }

}
