@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')

@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Statistik Penggunaan Gedung dan Ruangan
            </div>
            <!-- tbpinjam -->
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Gedung</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Jumlah Peminjaman</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $pinjam)
                        <tr>
                            <td>{{ $pinjam->tahun }}</td>
                            <td>{{ $pinjam->gedung }}</td>
                            <td>{{ $pinjam->ruangana }}</td>
                            <td>{{ $pinjam->jmlhpeminjam }}</td>

                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
            
            
        </div>

        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Statistik Perbaikan Gedung dan Ruangan
            </div>
            <!-- tbpinjam -->
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Gedung</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Jumlah Perbaikan</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perbaikan as $pinjam)
                        <tr>
                            <td>{{ $pinjam->tahun }}</td>
                            <td>{{ $pinjam->gedung }}</td>
                            <td>{{ $pinjam->ruangana }}</td>
                            <td>{{ $pinjam->jmlhperbaikan }}</td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
            
        </div>

<div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Chart Statistik Penggunaan dan Perbaikan
            </div>
            <!-- tbpinjam -->
            <div class="card-body">
                
@push('javascript')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    $(function () { 
        var data_click = <?php echo $click; ?>;
        var data_viewer = <?php echo $viewer; ?>;
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Statistik Gedung dan Ruangan'
        },
        xAxis: {
            categories: ['Gedung A','']
        },
        yAxis: {
            title: {
                text: 'Jumlah Total'
            }
        },
        series: [{
            name: 'Peminjaman',
            data: data_click
        }, {
            name: 'Perbaikan',
            data: data_viewer
        }]
    });
});
</script>
@endpush

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> </div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
            
        </div>

@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus laporan ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
    
    function activation(url){
        form = document.querySelector('#form-activation');
        form.action = url;
        form.submit();
    }
</script>
@endpush

