<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KullaniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.kullanici', ['users' => $users]);
    }


    /**
     * Insert Data
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'profile_photo_path' => $request->input('profile_photo_path')

        ]);

        return redirect()->route('admin_kullanici');

    }

    /**
     * Store a newly created resource in storage.
     *y vnç.İ:.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $profile_photo_path = $request->input('profile_photo_path');

       //$is_admin = $is_admin == "on" ? 1 : 0;


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->profile_photo_path=$profile_photo_path;

        $user->save();

        return Redirect::to("/kullanici");

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.kullanici",["user"=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,User $user, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $profile_photo_path = $request->input('profile_photo_path');

        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->profile_photo_path=$profile_photo_path;

        $user->save();
        return redirect()->route('admin_kullanici');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
