<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return ResponseFormatter::success(
            Auth::user(),
            'Data Profile User berhasil diambil'
        );
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users,username,'.$user->id.',id'],
            'email' => ['required', 'string', 'email', 'unique:users,email,'.$user->id.',id'],
            'phone' => ['string'],
        ]);

        $user->update($request->all());

        return ResponseFormatter::success(
            $user,
            'Profile Updated'
        );
    }
}
