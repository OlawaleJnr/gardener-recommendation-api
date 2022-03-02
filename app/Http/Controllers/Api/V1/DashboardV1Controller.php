<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class DashboardV1Controller extends Controller
{
  public function dashboard(Request $request)
  {
    $user = $request->user();
    $tokens = $user->tokens;
    return view('dashboard', compact('tokens'));
  }

  public function showToken()
  {
    return view('token-create');
  }

  public function storeToken(Request $request)
  {
    $request->validate([
      'name' => 'required|unique:personal_access_tokens,name'
    ]);

    $tokenName = $request->post('name');

    $user = $request->user();
    $token = $user->createToken($tokenName);

    $request->session()->flash('token', $token->plainTextToken);
    return response()->json([
      'message' => 'Personal Access Token for authorization created <br> Please wait to be redirected...',
      'redirectTo' => route('dashboard'),
      'success' => true
    ]);
  }

  public function deleteToken(PersonalAccessToken $token)
  {
    $token->delete();
  }
}
