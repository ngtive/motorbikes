<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $bikes = Bike::query()->paginate(10);
        return view('admin.home', compact('user', 'bikes'));
    }
    public function login(Request $request) {
        $validated = $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated, true)) {
            return redirect()->route('home');
        } else {
            throw ValidationException::withMessages(['email' => 'Password or email is incorrect']);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
