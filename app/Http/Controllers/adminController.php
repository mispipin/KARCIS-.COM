<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{


    public function register(Request $request)
    {
        $fields = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|string|unique:users,email',
            'nohp' => 'required|string',
            'gender' => 'required|string',
            'password' => 'required|string|confirmed|min:6'
        ]);

        $user = User::create([
            'nama' => $fields['nama'],
            'email' => $fields['email'],
            'nohp' => $fields['nohp'],
            'gender' => $fields['gender'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('tokenku')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first();

        //check password
        if (!$user || !Hash::check($fields['password'], $user->password))
            return response([
                'message' => 'unauthorized'
            ], 401);
        
        $token = $user->createToken('tokenku')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return[
            'message' => 'logged out'
        ];
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            $tiket->delete();
            return response()->json([
                'status' => 200,
                'message' => "User Berhasil Dihapus"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "User Tidak Dapat Ditemukan"
            ], 404);
        }
    }
}
