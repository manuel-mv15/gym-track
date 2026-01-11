<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class loginController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('username', $request->username)->first();
        if (!$user) {
            Session::flash("error", "Usuario no encontrado");
            return redirect()->route('loginFromView');
        }

        if (!Hash::check($request->password, $user->password)) {
            Session::flash("error", "Contraseña incorrecta");
            return redirect()->route('loginFromView');
        }
        Auth::login($user);
        Session::flash("success", "Login exitoso");
        return redirect()->route('home');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function register(Request $request)
    {
        /* $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 */


        if (User::where('username', $request->username)->first()) {
            Session::flash("error", "Usuario ya existe");
            return redirect()->route('registerFromView');
        }
        if(!$request->password == $request->password_confirmation) {
            Session::flash("error", "Las contraseñas no coinciden");
            return redirect()->route('registerFromView');
        }

        //rol user
        $role = Role::where('name', 'user')->first();

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach($role);  
        Auth::login($user);
        return redirect()->route('home');
    }

}
