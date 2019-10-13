<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemasukanPengeluaran;

class PengeluaranController extends Controller
{

	protected $jenis = 'pengeluaran';
	protected $color = 'danger';

	public function index(Request $request)
	{
		$tanggal = $request->query('tanggal');
		if(!$tanggal){
			$tanggal = date('Y-m-d');
		}elseif(!$this->isDate($tanggal)){
			$tanggal = date('Y-m-d');
		}
		$data = PemasukanPengeluaran::where('jenis', $this->jenis)
		->where('tanggal', $tanggal)
		->where('user_id', \Auth::id())
		->latest()->get();
		$kategori = PemasukanPengeluaran::where('jenis', $this->jenis)->groupBy('kategori')->get()->pluck('kategori');
		$tempat = PemasukanPengeluaran::where('jenis', $this->jenis)->groupBy('tempat')->get()->pluck('tempat');
		return view('pengeluaran.index', [
			'title'		=> ucfirst($this->jenis),
			'data'		=> $data,
			'active'	=> $this->jenis.'.index',
			'tanggal'	=> $tanggal,
			'kategori'	=> $kategori,
			'tempat'	=> $tempat,
			'jenis'		=> $this->jenis,
			'color'		=> $this->color,
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
			'jenis'				=> $this->jenis,
			'nama_item'			=> $request->item,
			'kategori'			=> $request->kategori,
			'nominal'			=> $request->nominal,
			'tanggal'			=> $request->tanggal,
			'tempat'			=> $request->tempat,
			'deskripsi'			=> $request->deskripsi,
			'user_id'			=> \Auth::id(),
		]);
		return redirect($this->jenis.'?tanggal='.$request->tanggal)->with('success_msg', ucfirst($this->jenis).' berhasil ditambahkan');
	}

	public function destroy(PemasukanPengeluaran $pengeluaran)
	{
		$pengeluaran->delete();
		return redirect()->back()->with('success_msg', ucfirst($this->jenis).' berhasil dihapus');
	}

	private function isDate($date){
		return preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date) ? true : false;
	}
}
