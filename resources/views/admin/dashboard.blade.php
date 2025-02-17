@extends('template.base')

@section('title', 'Dasdboard Admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('purple/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah Buku <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-5">{{ $totalBooks }}</h2> <!-- Menampilkan jumlah buku -->
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('purple/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah Siswa <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-5">{{ $totalStudents }}</h2> <!-- Menampilkan jumlah siswa -->
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('purple/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Peminjaman <i class="mdi mdi-diamond mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-5">95</h2>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <h4 class="card-title float-start">Grafik Peminjaman Buku</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-end"></div>
                </div>
                <canvas id="visit-sale-chart" class="mt-4"></canvas> <!-- Grafik peminjaman -->
            </div>
        </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Diagram buku berdasarkan kategori</h4>
                <div class="doughnutjs-wrapper d-flex justify-content-center">
                <canvas id="bookByCategory"></canvas> <!-- Diagram buku berdasarkan kategori -->
                </div>
                <div id="bookByCategory-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
            </div>
        </div>
    </div>
</div>


<script>
    var booksByCategory = @json($booksByCategory); // Mengambil data kategori buku

    // Menyiapkan data untuk Doughnut Chart
    var categoryLabels = booksByCategory.map(function(item) {
        return item.category_id; // Nama kategori
    });
    
    var categoryCounts = booksByCategory.map(function(item) {
        return item.count; // Jumlah buku per kategori
    });

    var ctx = document.getElementById('bookByCategory').getContext('2d');
    var trafficChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Jumlah Buku',
                data: categoryCounts,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FFC107'],
            }]
        },
    });
</script>

@endsection