@extends('cms.cms-index')
@section('custom-css')
<link href="{{ asset('main') }}/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">

<link href="{{ asset('main') }}/src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/light/widgets/modules-widgets.css">    

<link href="{{ asset('main') }}/src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/dark/widgets/modules-widgets.css">  
<style>
    .icon {
        font-size: 50px;
    }
    .text {
        font-size: 20px;
    }
</style>


@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-3 col-12 mb-2 mt-2">
            <div class="card">
                <div class="card-header text-center">
                    <span class="text">Papan Informasi</span>
                </div>
                <div class="card-body text-center">
                    <p>Belum ada informasi saat ini...</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-2 mt-2">
            <div class="card">
                <div class="card-header text-center">
                    <span class="text">Mata Pelajaran Hari Ini</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Record Id</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Durasi</th>
                                    <th>Nama Pengajar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>Seni Budaya</td>
                                    <td>08.00 - 09.40</td>
                                    <td>Muhamad Rifky</td>
                                    <td><span class="badge badge-success">Hadir</span></td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>Matematika</td>
                                    <td>10.00 - 11.40</td>
                                    <td>Muhamad Sugiman</td>
                                    <td><span class="badge badge-danger">Tidak Hadir</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 mb-2 mt-2">
            <div class="card">
                <div class="card-header text-center">
                    <span class="text">Presentasi Kehadiran</span>
                </div>
                <div class="card-body text-center">
                    <div id="chart" class="chart"></div>
                
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom-js')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    @php

    @endphp
    document.addEventListener('DOMContentLoaded', function() {
      const data = [5,5, 5]; // Data representasi persentase Hadir, Izin, Sakit
      const categories = ['Hadir', 'Izin', 'Sakit'];

      const chart = new ApexCharts(document.querySelector("#chart"), {
        series: data,
        chart: {
          type: 'donut',
          height: 350
        },
        labels: categories,
        plotOptions: {
          pie: {
            donut: {
              labels: {
                show: true,
                total: {
                  show: true,
                  label: 'Total',
                  formatter: function(w) {
                    return data.reduce((a, b) => a + b, 0) + '%';
                  }
                }
              }
            }
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
      });

      chart.render();
    });
  </script>
<!-- <script src="{{ asset('main') }}/src/assets/js/widgets/modules-widgets.js"></script> -->
@endsection
