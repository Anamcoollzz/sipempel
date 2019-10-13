@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.alert', ['type'=>'success'])

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-{{$color}} text-white">{{ ucfirst($jenis) }} Baru</div>

                <div class="card-body">
                    <form method="POST" action="{{ route($jenis.'.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="item" class="col-md-4 col-form-label text-md-right">{{ __('Item') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input id="item" type="text" class="form-control @error('item') is-invalid @enderror" name="item" value="{{ old('item') }}" required autocomplete="item" autofocus>

                                @error('item')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nominal" class="col-md-4 col-form-label text-md-right">{{ __('Nominal') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input id="nominal" type="text" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ old('nominal') }}" required autocomplete="nominal" autofocus>

                                @error('nominal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input data-toggle="datemask" id="tanggal" type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') ? old('tanggal') : date('Y-m-d') }}" required autocomplete="tanggal" autofocus>

                                @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input required="required" id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" autocomplete="kategori" autofocus>

                                @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ old('tempat') }}" required autocomplete="tempat">

                                @error('tempat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" autocomplete="deskripsi">

                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-{{$color}}">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-{{$color}} text-white">Lihat Berdasarkan Tanggal</div>

                <div class="card-body">
                    <form>

                        <div class="form-group row">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input data-toggle="datemask" id="tanggal" type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $tanggal }}" required autocomplete="tanggal" autofocus>

                                @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-{{$color}}">
                                    {{ __('Lihat') }}
                                </button>
                                @if($tanggal != date('Y-m-d'))
                                <a class="btn btn-{{$color}}" href="?tanggal={{ date('Y-m-d') }}">Hari Ini</a>
                                @endif
                                @if($tanggal != date('Y-m-d', strtotime('-1 days')))
                                <a class="btn btn-{{$color}}" href="?tanggal={{ date('Y-m-d', strtotime('-1 days')) }}">Kemarin</a>
                                @endif
                                @foreach (range(2, 4) as $jarak)
                                @if($tanggal != date('Y-m-d', strtotime('-'.$jarak.' days')))
                                <a class="btn btn-{{$color}}" href="?tanggal={{ date('Y-m-d', strtotime('-'.$jarak.' days')) }}">{{ $jarak }} Hari Lalu</a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-{{$color}} text-white">{{ $title }} anda pada {{ $tanggal }}</div>

                <div class="card-body">
                    <table id="dt" class="table table-bordered table-striped table-hovered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Nominal</th>
                                <th>Kategori</th>
                                <th>Tempat</th>
                                <th>Deskripsi</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama_item }}</td>
                                <td align="right">{{ $d->nominal }}</td>
                                <td>{{ $d->kategori }}</td>
                                <td>{{ $d->tempat }}</td>
                                <td>{{ $d->deskripsi }}</td>
                                <td>
                                    <a onclick="hapus(event, '{{ route($jenis.'.destroy', [$d->id]) }}')" href="#" class="btn btn-{{$color}} btn-sm">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('import.datatable')

@if($color == 'danger')
@push('style')
<style>
    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #e3342f;
        border-color: #e3342f;
    }
</style>
@endpush
@endif

@push('script')
<form action="" id="form-hapus" method="post">
    @csrf
    @method('DELETE')
</form>
<script>
    function hapus(e, url) {
        if(confirm('Anda yakin?')){
            document.getElementById('form-hapus').action = url;
            document.getElementById('form-hapus').submit();
        }
    }
</script>
@endpush