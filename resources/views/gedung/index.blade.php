@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ route('gedungs.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Gedung
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nama Gedung</th>
                            <th class="text-center">Lokasi Gedung</th>
                            <th class="text-center">Luas Gedung</th>
                            <th class="text-center">Jumlah Lantai</th>
                            <th class="text-center">Tahun Pembangunan</th>
                            <th class="text-center">Aksi</th>
                        </tr>


                    </thead>
                    <tbody>
                        @foreach($gedungs as $gedung)
                        <tr>
                            <td>{{ $gedung->nama }}</td>
                            <td>{{ $gedung->lokasi }}</td>
                            <td>{{ $gedung->luas }} m2</td>
                            <td>{{ $gedung->jumlah_lantai }}</td>
                            <td>{{ $gedung->tahun_pembangunan }}</td>
                            

                            <td class="text-center">
                                <a href="{{ route('gedungs.show', [$gedung->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> </i>
                                </a>
                                <a href="{{ route('gedungs.edit', [$gedung->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <button onclick="event.preventDefault();confirmDeletion('{{ route('gedungs.destroy', [$gedung->id]) }}');" class="btn btn-sm btn-outline-danger">
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
        if(confirm('Anda yakin akan menghapus data gedung ini? ')){
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

