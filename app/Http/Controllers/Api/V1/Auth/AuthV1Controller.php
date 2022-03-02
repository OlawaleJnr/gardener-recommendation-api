<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthV1Controller extends Controller
{
  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email|string',
      'password' => 'required|string',
      'remember' => 'boolean'
    ]);

    $remember = $credentials['remember'] ?? false;
    unset($credentials['remember']);

    // Attempt Login
    if (auth('web')->attempt($credentials, $remember)) {
      $user = auth('web')->user();
      return response()->json([
        'two_factor' => false,
        'user' => $user,
        'redirectTo' => route('dashboard'),
      ], 200);
    } else {
      return response()->json([
        'error' => 'The provided credentials are not correct!'
      ], 422);
    }
  }

  public function logout()
  {

  }
}
