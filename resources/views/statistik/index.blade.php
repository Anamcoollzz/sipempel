@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Lihat dari rentang waktu
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        @include('layouts.datemask', ['id'=>'dari_tanggal', 'label'=>'Dari Tanggal', 'value'=>$dari_tanggal])
                        @include('layouts.datemask', ['id'=>'sampai_tanggal', 'label'=>'Sampai Tanggal', 'value'=>$sampai_tanggal])
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Lihat
                                </button>
                                <a class="btn btn-primary" href="#" onclick="mingguLalu(event, 0)">Minggu Ini</a>
                                @foreach (range(1, 3) as $mingguKe)
                                <a class="btn btn-primary" href="#" onclick="mingguLalu(event, {{ $mingguKe }})">{{ $mingguKe }} Minggu Lalu</a>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="alert alert-info mt-5">
                Menampilkan data dari tanggal <strong>{{ $dari_tanggal }}</strong> sampai tanggal <strong>{{ $sampai_tanggal }}</strong>
            </div>

            <div class="card mt-5">
                <div class="card-header bg-danger text-white">Statistik Pengeluaran</div>

                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:auto; width:100%; overflow-y: auto;">
                        <canvas id="pengeluaran"></canvas>
                        <br>
                        @php
                        $sorted = $pengeluaran->sortBy('nominal')->reverse()->first();
                        @endphp
                        <h5 class="text-center">Pengeluaran terbanyak terjadi pada tanggal : {{ $sorted['tanggal'] }} sebesar Rp. {{ number_format($sorted['nominal'], 0, ',', '.') }}</h5>
                        <h4 class="text-center">Total Pengeluaran Keseluruhan : Rp. {{ number_format($pengeluaran->pluck('nominal')->sum(), 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header bg-primary text-white">Statistik Pemasukan</div>

                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:auto; width:100%; overflow-y: auto;">
                        <canvas id="pemasukan"></canvas>
                        @php
                        $sorted = $pemasukan->sortBy('nominal')->reverse()->first();
                        @endphp
                        <h5 class="text-center">Pemasukan terbanyak terjadi pada tanggal : {{ $sorted['tanggal'] }} sebesar Rp. {{ number_format($sorted['nominal'], 0, ',', '.') }}</h5>
                        <h4 class="text-center">Total Pemasukan Keseluruhan : Rp. {{ number_format($pemasukan->pluck('nominal')->sum(), 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('script')
<script>

    function mingguLalu(e, mingguKe) {
        e.preventDefault();
        var date = [
        @foreach (range(0, 3) as $mingguKe)
        ['{{ date('Y-m-d', strtotime('last sunday', strtotime('-'.$mingguKe.' weeks'))) }}', '{{ date('Y-m-d', strtotime('last saturday', strtotime('-'.($mingguKe-1).' weeks'))) }}'],
        @endforeach
        ];
        $('#dari_tanggal').val(date[mingguKe][0]);
        $('#sampai_tanggal').val(date[mingguKe][1]);
        $('#dari_tanggal').parents('form')[0].submit();
    }

    @foreach (['pengeluaran', 'pemasukan'] as $jenis)
    var {{$jenis}} = document.getElementById('{{$jenis}}');
    var myChart = new Chart({{$jenis}}, {
        type: 'bar',
        data: {
            labels: {!! ($$jenis)->pluck('tanggal')->toJson() !!},
            datasets: [{
                label: '# {{ucfirst($jenis)}}',
                data: {!! ($$jenis)->pluck('nominal')->toJson() !!},
                backgroundColor: [
                'rgba(246, 56, 15, 0.2)',
                'rgba(246, 120, 15, 0.2)',
                'rgba(246, 236, 15, 0.2)',
                'rgba(15, 246, 37, 0.2)',
                'rgba(15, 235, 246, 0.2)',
                'rgba(16, 15, 246, 0.2)',
                'rgba(131, 15, 246, 0.2)',
                ],
                borderColor: [
                'rgba(246, 56, 15, 1)',
                'rgba(246, 120, 15, 1)',
                'rgba(246, 236, 15, 1)',
                'rgba(15, 246, 37, 1)',
                'rgba(15, 235, 246, 1)',
                'rgba(16, 15, 246, 1)',
                'rgba(131, 15, 246, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    @endforeach
</script>
@endpush

@include('import.chart')