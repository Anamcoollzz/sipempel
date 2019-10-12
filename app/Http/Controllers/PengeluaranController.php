<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemasukanPengeluaran;

class PengeluaranController extends Controller
{

	public function index(Request $request)
	{
		$tanggal = $request->query('tanggal');
		if(!$tanggal){
			$tanggal = date('Y-m-d');
		}elseif(!$this->isDate($tanggal)){
			$tanggal = date('Y-m-d');
		}
		$data = PemasukanPengeluaran::where('jenis', 'pengeluaran')
		->where('tanggal', $tanggal)
		->where('user_id', \Auth::id())
		->latest()->get();
		return view('pengeluaran.index', [
			'title'		=> 'Pengeluaran',
			'data'		=> $data,
			'active'	=> 'pengeluaran.index',
			'tanggal'	=> $tanggal,
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'item'			=> ['required', 'string'],
			'kategori'		=> ['required', 'string'],
			'nominal'		=> ['required', 'numeric', 'min:0'],
			'tanggal'		=> ['required', 'string', 'date_format:Y-m-d'],
			'tempat'		=> ['required', 'string'],
			'deskripsi'		=> ['nullable', 'string'],
		]);
		PemasukanPengeluaran::create([
			'nama_item'			=> $request->item,
			'kategori'			=> $request->kategori,
			'nominal'			=> $request->nominal,
			'tanggal'			=> $request->tanggal,
			'tempat'			=> $request->tempat,
			'deskripsi'			=> $request->deskripsi,
			'user_id'			=> \Auth::id(),
		]);
		return redirect()->back()->with('success_msg', 'Pengeluaran berhasil ditambahkan');
	}

	public function destroy(PemasukanPengeluaran $pengeluaran)
	{
		$pengeluaran->delete();
		return redirect()->back()->with('success_msg', 'Pengeluaran berhasil dihapus');
	}

	private function isDate($date){
		return preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date) ? true : false;
	}
}
