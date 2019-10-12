@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="text-center">Selamat datang di Sistem Informasi Pemasukan Pengeluaran</h4>
                    <br>
                    Sistem yang dibuat bertujuan untuk mempermudah anda dalam menghitungan pemasukan dan pengeluaran anda tiap harinya. Dilengkapi beberapa menu untuk mempermudah anda dalam mengatur keuangan anda.
                    <br>
                    Berikut beberapa menu yang ada di sistem ini :
                    <ul>
                        <li><a href="{{ route('home') }}">Dashboard</a> (Sekilas tentang sistem)</li>
                        <li><a href="{{ route('pengeluaran.index') }}">Pengeluaran</a> (Menambah, melihat dan menghapus pengeluaran)</li>
                        <li><a href="{{ route('pemasukan.index') }}">Pemasukan</a> (Menambah, melihat dan menghapus pemasukan)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
