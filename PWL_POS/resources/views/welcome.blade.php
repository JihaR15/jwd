@extends('layouts.template')

@section('content')
{{-- <div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        Selamat Datang semua, ini adalah halaman utama dari aplikasi ini.
    </div>
</div> --}}
@if(in_array(Auth::user()->level->level_kode, ['ADM', 'MNG', 'STF']))
<div class="row">
    <div class="col-md-12">
        <div class="small-box bg-primary">
            <div class="inner text-center">
                <h4>Tambah Transaksi</h4>
                <p>Klik untuk menambahkan</p>
            </div>
            <div class="icon">
                <i class="fas fa-plus-circle"></i>
            </div>
            <a href="javascript:void(0)" onclick="modalAction('{{ url('penjualan/create_ajax') }}')" class="small-box-footer">
                Tambah <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endif
<div class="row">
    <!-- Ringkasan Kartu -->
    @if(in_array(Auth::user()->level->level_kode, ['ADM', 'MNG']))
        
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPenjualan }}</h3>
                    <p>Total Penjualan</p>
                </div>
                <div class="icon"><i class="fas fa-shopping-cart"></i></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalBarang }}</h3>
                    <p>Jumlah Barang</p>
                </div>
                <div class="icon"><i class="fas fa-boxes"></i></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalUser }}</h3>
                    <p>User Terdaftar</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>
    @endif

    <!-- Chart Penjualan Bulanan -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grafik Penjualan Bulanan</h3>
            </div>
            <div class="card-body">
                <canvas id="chartPenjualan" style="max-height:300px;"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if(in_array(Auth::user()->level->level_kode, ['ADM', 'MNG', 'STF']))
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header"><strong>Barang dengan Stok Rendah (<10) </strong></div>
            <div class="card-body">
                @if($barangStokRendah->isEmpty())
                    <p>Tidak ada barang dengan stok rendah.</p>
                @else
                    <ul class="list-group">
                        @foreach ($barangStokRendah as $barang)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $barang->barang_nama }}
                                <span class="badge bg-danger">{{ $barang->stok_jumlah }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header"><strong>Penjualan Terakhir Anda</strong></div>
            <div class="card-body">
                @if($penjualanTerakhir)
                    <p><strong>Kode:</strong> {{ $penjualanTerakhir->penjualan_kode }}</p>
                    <p><strong>Pembeli:</strong> {{ $penjualanTerakhir->pembeli }}</p>
                    <p><strong>Tanggal:</strong> {{ $penjualanTerakhir->penjualan_tanggal }}</p>
                @else
                    <p>Belum ada penjualan yang dilakukan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
      
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog"
    data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPenjualan');
    const chartPenjualan = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [{
                label: 'Total Penjualan',
                data: {!! json_encode($totalPerBulan) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }
</script>
@endpush
