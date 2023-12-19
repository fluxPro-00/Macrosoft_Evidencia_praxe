<?php

namespace App\Http\Controllers;

use App\Models\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('Email');
        $password = $request->input('Heslo');

        $user = Pouzivatel::where('Email', $email)->first();

        if ($user && Hash::check($password, $user->Heslo)) {
            $typ = $user->only(['Typ']);

            switch ($typ) {
                case 1:
                    $token = $user->createToken('auth-token')->plainTextToken;
                    return response()->json(['token' => $token], 200);
                case 2:
                    // Code for when $typ is 2
                    break;
                case 3:
                    // Code for when $typ is 3
                    break;
                case 4:
                    // Code for when $typ is 4
                    break;
                default:
                    break;
            }
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
