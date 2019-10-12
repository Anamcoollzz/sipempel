<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemasukanPengeluaran extends Model
{
	protected $table = 'pemasukan_pengeluaran';

	protected $fillable = [
		'nama_item',
		'jenis',
		'kategori',
		'nominal',
		'tanggal',
		'tempat',
		'deskripsi',
		'user_id',
	];
}
