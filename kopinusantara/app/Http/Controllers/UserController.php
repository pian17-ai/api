<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function show(Request $request) {
		$user = $request->user();

		return response()->json([
			'status' => 'success',
			'message' => 'Get user successfully',
			'data' => $user	
		]);
	}
}
