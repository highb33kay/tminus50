<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

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

			// update the user role
			$user = User::where('email', $request->email)->first();

			// Assign the role to the user
			$role = Role::where('name', $request->role)->first();
			$user->roles()->attach($role);

			return response()->json([
				'success' => true,
				'message' => 'User created successfully',
			], 201);


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

	public function role(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'role' => 'required|string',
			]);

			if ($validator->fails()) {
				return response()->json(['error' => $validator->errors()], 400);
			}

			// add the role to the database
			Role::create([
				'name' => $request->role,
			]);

			// return a response 
			return response()->json([
				'success' => true,
				'message' => 'User role updated successfully',
			], 201);
		} catch (\Exception $e) {
			Log::error('User Role Create Failed: ' . $e->getMessage());

			return response()->json([
				'success' => false,
				'message' => 'Role Create Failed',
			], 400);
		}
	}
}
