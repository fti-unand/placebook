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
                <i class="fa fa-align-justify"></i> Daftar Laporan Peminjaman Ruangan
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
<<<<<<< HEAD
                            <th class="text-center">Gedung</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Peminjam</th>
                            <th class="text-center">Tanggal Peminjaman</th>
                            <th class="text-center">Tanggal Selesai</th>
                            <th class="text-center">Tujuan</th>
=======
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Pengaju</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Aksi</th>
>>>>>>> ccd63fb1d63f106de579d2093d5d7c1acb8a47cd
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporans as $laporan)
                        <tr>
<<<<<<< HEAD
                            <td>{{ $laporan->gedung }}</td>
                            <td>{{ $laporan->ruangan }}</td>
                            <td>{{ $laporan->username }}</td>
                            <td>{{ $laporan->tanggal_peminjaman }}</td>
                            <td>{{ $laporan->tanggal_selesai}}</td>
                            <td>{{ $laporan->tujuan }}</td>
=======
                            <td>{{ $laporan->ruangan_id }}</td>
                            <td>{{ $laporan->pengaju}}</td>
                            <td>{{ $laporan->tanggal_pengajuan }}</td>
>>>>>>> ccd63fb1d63f106de579d2093d5d7c1acb8a47cd
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        
    </div>
</div>

<form style="display: none" action="#" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>

<form style="display: none" action="#" method="post" id="form-activation">
    @csrf
</form>

@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus user ini? ')){
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

