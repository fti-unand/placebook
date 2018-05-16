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
                <i class="fa fa-align-justify"></i> Laporan Perbaikan Kerusakan Ruangan
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
<<<<<<< HEAD
                            <th class="text-center">Gedung</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Pengaju</th>
                            <th class="text-center">Tanggal Perbaikan</th>
                            <th class="text-center">Tanggal Selesai Perbaikan</th>
                            <th class="text-center">Alasan</th>
                            
=======
                            <th class="text-center">ID Ruangan</th>
                            <th class="text-center">Alasan</th>
                            <th class="text-center">Tanggal Perbaikan</th>
>>>>>>> ccd63fb1d63f106de579d2093d5d7c1acb8a47cd
                            
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($rusaks as $rusak)
                        <tr>
<<<<<<< HEAD
                            <td>{{ $rusak->gedung }}</td>
                            <td>{{ $rusak->ruangan }}</td>
                            <td>{{ $rusak->username }}</td>
                            <td>{{ $rusak->tanggal_perbaikan }}</td>
                            <td>{{ $rusak->tanggal_selesai_perbaikan}}</td>
                            <td>{{ $rusak->alasan }}</td>
=======
                            <td>{{ $rusak->ruangan_id }}</td>
                            <td>{{ $rusak->alasan}}</td>
                            <td>{{ $rusak->tanggal_perbaikan }}</td>
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

