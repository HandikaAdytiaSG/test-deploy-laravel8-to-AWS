<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $users = User::get()->all();


        return view('index', [
            'title' => 'Dashboard',
            'users' => $users
        ]);
    }

    public function tambahUser(Request $request) //tambah User
    {
        $validateData = $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'max:255', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);

        // buat no induk
        if ($request['gender'] == "laki-laki") {
            $userID = 3007202201;
        } else {
            $userID = 3007202202;
        }

        $user = User::latest()->first('id');

        if ($user == null) {
            $id = 1;
        } else {
            $no = $user->id;

            $id = $no + 1;
        }

        $no_induk = $userID . '00' . $id;

        // Foto Profil
        $gambar = "post-images/default.jpg";

        // Enkripsi password
        $password = bcrypt($validateData['password']);

        User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'role' => $request['role'],
            'gender' => $request['gender'],
            'no_induk' => $no_induk,
            'password' => $password,
            'gambar' => 'post-images/default.jpg'
        ]);

        return redirect()->route('dashboard');
    }

    public function hapusUser($id, User $user)  // hapus User
    {
        //cari
        $user = User::find($id);
        //hapus image
        // Storage::delete('public/posts/' . $user->gambar);

        //hapus post
        $user->delete();

        //redirect ke index
        return redirect()->route('dashboard');
    }

    public function viewEdit($id, User $user)  // View Edit User
    {
        //cari
        $user = User::find($id);

        return view('edit', [
            'title' => 'Edit Akun',
            'user' => $user
        ]);
    }
    public function editUser($id, Request $request, User $user)  // Edit User
    {
        //validate form
        $validateData = $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'max:255', 'email:dns'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);

        // buat no induk
        if ($request['gender'] == "laki-laki") {
            $userID = 3007202201;
        } else {
            $userID = 3007202202;
        }
        $no_induk = $userID . '00' . $id;

        $user = User::find($id)->update([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'role' => $request['role'],
            'gender' => $request['gender'],
            'no_induk' => $no_induk,
            'password' => $validateData['password'],
        ]);


        return redirect()->route("dashboard");
    }


}
