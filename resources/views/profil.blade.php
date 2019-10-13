@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.alert', ['type'=>'success'])
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profilku</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('perbarui') }}">
                        @csrf
                        @method("PUT")

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama')? old('nama') : $d->nama }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kota_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Kota Lahir') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input id="kota_lahir" type="text" class="form-control @error('kota_lahir') is-invalid @enderror" name="kota_lahir" value="{{ old('kota_lahir')? old('kota_lahir') : $d->kota_lahir }}" required autocomplete="kota_lahir" autofocus>

                                @error('kota_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input data-toggle="datemask" id="tanggal_lahir" type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir')? old('tanggal_lahir') : $d->tanggal_lahir }}" required autocomplete="tanggal_lahir" autofocus>

                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hobi" class="col-md-4 col-form-label text-md-right">{{ __('Hobi') }}</label>

                            <div class="col-md-6">
                                <input id="hobi" type="text" class="form-control @error('hobi') is-invalid @enderror" name="hobi" value="{{ old('hobi')? old('hobi') : $d->hobi }}" autocomplete="hobi" autofocus>

                                @error('hobi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')? old('email') : $d->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" value="{{ old('password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div align="center">
                            Terakhir kali diperbarui {{ \Auth::user()->updated_at }}
                            <br>
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Perbarui') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
