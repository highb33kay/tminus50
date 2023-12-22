<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
	/**
	 * Register a new user
	 */
	public function register(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required|string',
				'email' => 'required|email|unique:users,email',
				'password' => 'required|string',
			]);

			if ($validator->fails()) {
				return response()->json(['error' => $validator->errors()], 400);
			}

			// save the user
			User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'role' => 'user',
			]);

			// return a response 
			return response()->json([
				'success' => true,
				'message' => 'User created successfully',
			], 201);
		} catch (\Exception $e) {
			Log::error('User Registration Failed: ' . $e->getMessage());

			return response()->json([
				'success' => false,
				'message' => 'User Registration Failed',
			], 400);
		}
	}
}
