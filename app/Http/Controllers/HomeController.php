<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masukan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'title'     => 'Dashboard',
            'active'    => 'dashboard',
        ]);
    }

    public function profil()
    {
        return view('profil', [
            'title'     => 'Profil',
            'active'    => 'profil',
            'd'         => \Auth::user(),
        ]);
    }

    public function perbarui(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kota_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'string', 'date_format:Y-m-d', 'before:'.date('Y-m-d')],
            'hobi' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.\Auth::id()],
            'password' => ['nullable', 'string', 'min:5'],
        ]);
        $data = [
            'nama'              => $request->nama,
            'kota_lahir'        => $request->kota_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'hobi'              => $request->hobi,
            'email'             => $request->email,
        ];
        if($request->password){
            $data['password'] = \Hash::make($request->password);
        }
        \Auth::user()->update($data);
        return redirect()->back()->with('success_msg', 'Profil berhasil diperbarui');
    }

    public function masukan()
    {
        $data = Masukan::with('user')->paginate(10);
        return view('masukan.index', [
            'data'      => $data,
            'title'     => 'Masukan',
            'active'    => 'masukan.index',
        ]);
    }

    public function masukanPost(Request $request)
    {
        $request->validate([
            'masukan'       => 'required'
        ]);
        Masukan::create([
            'isi'       => $request->masukan,
            'user_id'   => \Auth::id(),
        ]);
        return redirect()->back()->with('success_msg', 'Masukkan anda berhasil dikirim. Terima kasih');
    }
}
