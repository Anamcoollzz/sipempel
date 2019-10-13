<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemasukanPengeluaran;

class StatistikController extends Controller
{

	private function getDate(){
		$date = [];
		foreach (range(0, date('w')) as $day) {
			array_unshift($date, date('Y-m-d', strtotime("-{$day} days")));
		}
		return $date;
	}

	public function __invoke(Request $request)
	{
		$date = $this->getDate();
		$dari_tanggal = $date[0];
		$sampai_tanggal = end($date);
		if($request->isMethod('post')){
			$dari_tanggal = $request->dari_tanggal;
			$sampai_tanggal = $request->sampai_tanggal;
			if($dari_tanggal && $sampai_tanggal){
				$request->validate([
					'dari_tanggal'		=> 'date_format:Y-m-d',
					'sampai_tanggal'	=> 'date_format:Y-m-d',
				]);
				$request->validate([
					'dari_tanggal'		=> 'before_or_equal:'.$sampai_tanggal,
					'sampai_tanggal'	=> 'after_or_equal:'.$dari_tanggal,
				]);
				$rangeHari = (strtotime($sampai_tanggal) - strtotime($dari_tanggal)) / 86400;
				$rangeHari++;
				if($rangeHari > 7){
					$request->validate([
						'dari_tanggal'		=> [
							function ($attribute, $value, $fail) {
								$fail('Range hari maksimal 7 hari');
							},
						],
						'sampai_tanggal'		=> [
							function ($attribute, $value, $fail) {
								$fail('Range hari maksimal 7 hari');
							},
						],
					]);
				}
				$date = [];
				for ($i=strtotime($dari_tanggal); $i <= strtotime($sampai_tanggal); $i+=86400) { 
					array_push($date, date('Y-m-d', $i));
				}
			}
		}
		$pengeluaran = [];
		$epmasukan = [];
		foreach ($date as $day) {
			$pengeluaran[] = [
				'tanggal'	=> $day,
				'nominal'	=> PemasukanPengeluaran::where('jenis', 'pengeluaran')->where('tanggal', $day)->sum('nominal'),
			];
			$pemasukan[] = [
				'tanggal'	=> $day,
				'nominal'	=> PemasukanPengeluaran::where('jenis', 'pemasukan')->where('tanggal', $day)->sum('nominal'),
			];
		}
		return view('statistik.index', [
			'title'				=> 'Statistik',
			'pengeluaran'		=> collect($pengeluaran),
			'pemasukan'			=> collect($pemasukan),
			'active'			=> 'statistik.index',
			'dari_tanggal'		=> $dari_tanggal,
			'sampai_tanggal'	=> $sampai_tanggal,
		]);
	}

}
