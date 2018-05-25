@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ route('peminjaman.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar peminjaman
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">ID Ruangan</th>

                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Tanggal Mulai</th>
                            <th class="text-center">Tanggal Selesai</th>
                            <th class="text-center">Status Peminjaman</th>
                            <th class="text-center">Tujuan</th>
                            <th class="text-center">Pembatalan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $peminjaman)
                        <tr>
                            <td>{{ $peminjaman->ruangan->nama}}</td>
                            <td>{{ $peminjaman->tanggal_pengajuan }}</td>
                            
                            <td>{{ $peminjaman->tanggal_mulai }}</td>
                            <td>{{ $peminjaman->tanggal_selesai }}</td>
                            <td>{{ $peminjaman->status->nama }}</td>
                            <td>{{ $peminjaman->tujuan }}</td>
                            
                            <td class="text-center">
                                <a href="/cancel/{{$peminjaman->id}}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-btn fa-bank"> </i>
                                </a>
                                <button onclick="event.preventDefault();confirmDeletion('{{ route('peminjaman.destroy', [$peminjaman->id]) }}');" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"> </i>
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

<form style="display: none" action="#" method="post" id="form-activation">
    @csrf
</form>

@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus peminjaman ini? ')){
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

