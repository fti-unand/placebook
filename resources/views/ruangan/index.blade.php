@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')

<a class="btn" href="{{ ('/ruangan/create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Ruangan
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Luas</th>
                            <th class="text-center">Lantai</th>
                            <th class="text-center">Peminjaman</th>
                            <th class="text-center">Kondisi</th>
                            <th class="text-center">Fungsi</th>
                            <th class="text-center">Pengelola</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ruangans as $ruangan)
                        <tr>
                            <td>{{ $ruangan->nama }}</td>
                            <td>{{ $ruangan->luas }}</td>
                            <td>{{ $ruangan->lantai}}</td>
                            @if($ruangan->bisa_dipinjam == 1)
                                <td>Ruangan Bisa Dipinjam</td>
                            @else
                                <td>Ruangan Tidak Bisa Dipinjam</td>
                            @endif
                            <td>{{ $ruangan->kondisi->nama}}</td>
                            <td>{{ $ruangan->fungsi->nama}}</td>
                            <td>{{ $ruangan->unit->nama}}</td>
                            
                            
                            <td class="text-center">
                                <a href="{{ route('ruangan.show', [$ruangan->id])}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"> </i></a>
                                <a href="{{ route('ruangan.edit', [$ruangan->id])}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil"> </i></a>
                                <button onclick="event.preventDefault();confirmDeletion('{{url('ruangan/'.$ruangan->id)}}');" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"> </i>
                                </button>   
                            </td>  
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

@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus ruangan ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
</script>
@endpush

