@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.alert', ['type'=>'success'])

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Masukan anda berarti untuk kami</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="masukan" class="col-md-4 col-form-label text-md-right">{{ __('Masukan') }} <font color="red">*</font></label>

                            <div class="col-md-6">
                                <textarea id="masukan" class="form-control @error('masukan') is-invalid @enderror" name="masukan" autocomplete="masukan">{{ old('masukan') }}</textarea>

                                @error('masukan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">Masukan Terbaru</div>
                <div class="card-body">
                    @if($data->count() > 0)
                    @foreach ($data as $d)
                    <h5><i class="fa fa-user"></i> {{ $d->user->nama }}</h5>
                    <p>{{ $d->isi }}</p>
                    @if(!$loop->last)
                    <hr>
                    @endif
                    @endforeach
                    @else
                    <i>Ayuk kasih masukan anda, karena itu sangat berarti bagi kami :)</i>
                    @endif
                </div>
            </div>
        </div>

        {{ $data->links() }}
    </div>
</div>
@endsection