@extends('layouts.admin-main')
@section('title', $title)
@section('dashboard', 'active')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $baru }}</h3>
                        <p>Laporan baru</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3>{{ $diterima }}</h3>
                        <p>Di terima</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $proses }}</h3>
                        <p>Dalam Proses</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-load-b"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $selesai }}</h3>
                        <p>Selesai Proses</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-circled"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $tidakValid }}</h3>
                        <p>Tidak Valid</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-alert-circled"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-black">
                    <div class="inner">
                        <h3>{{ $pengguna }}</h3>
                        <p>Pengguna Sistem</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person text-white-50"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Status laporan</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="statusChart"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
             <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Pelaporan Dalam Mingguan</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="weeklyChart"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
    </section>
@endsection
@push('add-js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Retrieve the data from the server
        const pengaduans = @json($pengaduans);
        console.log(pengaduans);

        // Prepare the chart data for status
        const statusCounts = {
            "BARU": 0,
            "DITERIMA": 0,
            "DALAM PROSES": 0,
            "TIDAK VALID": 0,
            "SELESAI": 0,
        };

        pengaduans.forEach((pengaduan) => {
            statusCounts[pengaduan.status]++;
        });

        console.log(statusCounts);

        const statusChartData = {
            labels: Object.keys(statusCounts),
            datasets: [{
                label: "Status Laporan",
                data: Object.values(statusCounts),
                backgroundColor: ["rgba(255, 206, 86, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 99, 132, 0.2)", "rgba(75, 192, 192, 0.2)"],
                borderColor: ["rgba(255, 206, 86, 1)", "rgba(54, 162, 235, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 99, 132, 1)", "rgba(75, 192, 192, 1)"],
            }],
        };

        // Create the status chart
        const statusCtx = document.getElementById("statusChart").getContext("2d");
        new Chart(statusCtx, {
            type: "bar",
            data: statusChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                    },
                },
            },
        });


        const complaintData = [];
        const dateLabels = [];

        for (let i = 6; i >= 0; i--) {
            const date = new Date();
            date.setDate(date.getDate() - i);
            dateLabels.push(formatDate(date));
        }


        dateLabels.forEach((dateLabel) => {
            const count = pengaduans.filter((pengaduan) => {
                const pengaduanDate = new Date(pengaduan.created_at);
                return formatDate(pengaduanDate) === dateLabel;
            }).length;
            complaintData.push(count);
        });

        console.log(complaintData);

        const weeklyChartData = {
            labels: dateLabels,
            datasets: [{
                label: "Jumlah Pengaduan Dalam Mingguan",
                data: complaintData,
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1,
            }],
        };

        // Create the weekly chart
        const weeklyCtx = document.getElementById("weeklyChart").getContext("2d");
        new Chart(weeklyCtx, {
            type: "line",
            data: weeklyChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                    },
                },
            },
        });

        function formatDate(date) {
            const options = { year: 'numeric', month: 'numeric', day: 'numeric' };
            return date.toLocaleDateString('en-US', options);
        }
    });
</script>


@endpush
