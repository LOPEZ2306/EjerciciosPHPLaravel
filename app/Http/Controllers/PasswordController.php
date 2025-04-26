<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index(Request $request)
    {
        $password = null;
        $error = null;

        if ($request->isMethod('post')) {
            $length = $request->input('length');
            $includeNumbers = $request->has('includeNumbers');
            $includeSpecialChars = $request->has('includeSpecialChars');

            if ($length <= 0) {
                $error = "La longitud de la contraseña debe ser mayor que 0.";
            } else {

                $password = $this->generatePassword($length, $includeNumbers, $includeSpecialChars);
            }
        }

        return view('password.index', compact('password', 'error'));
    }

    private function generatePassword($length = 8, $includeNumbers = true, $includeSpecialChars = true)
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()_-+=<>?/[]{}';

        $characters = $letters;

        if ($includeNumbers) {
            $characters .= $numbers;
        }

        if ($includeSpecialChars) {
            $characters .= $specialChars;
        }

        $password = '';
        $maxIndex = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, $maxIndex);
            $password .= $characters[$randomIndex];
        }

        return $password;
    }
}
