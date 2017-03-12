<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\AuthTransformer;
use Auth;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request,User $user)
    {
        if (!Auth::attempt(['email' => $request->email,'password'=>$request->password])){
            return response()->json(['error' => 'Your credential is wrong','401']);
        }

        $user = $user->find(Auth::user()->id);

        return fractal()
            ->item($user)
            ->transformWith(new AuthTransformer)
            ->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request,User $user)
    {
        $this->validate($request, [
            'email'     => 'required|unique:users|email',
            'password'  => 'required|min:8',
            'name'      => 'required'
        ]);

        $user = $user->create([
            'email'     => $request->email,
            'password'  => bcrypt($request->passowrd),
            'name'      => $request->name,
            'api_token' => bcrypt($request->email),
            'role_id'   => 2,
            'avatar'    => 'users/March2017/b5q7TOivgOYChrwL0Mgf.png'
        ]);

        return fractal()
            ->item($user)
            ->transformWith(new AuthTransformer)
            ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
//        return $user;
        //
        $user = $user->all();
        return fractal()
            ->collection($user)
            ->transformWith(new AuthTransformer())
            ->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
