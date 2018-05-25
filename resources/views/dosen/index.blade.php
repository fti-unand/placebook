@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ ('/dosen/create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')


<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Dosen
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">NIDN</th>
                            <th class="text-center">Gelar Depan</th>
                            <th class="text-center">Gelar Belakang</th>
                            <th class="text-center">No. HP</th>
                            <th class="text-center">Tempat Lahir</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $dosen)
                        <tr>
                            <td>{{ $dosen->nama }}</td>
                            <td>{{ $dosen->nip }}</td>
                            <td>{{ $dosen->nidn }}</td>
                            <td>{{ $dosen->gelar_depan }}</td>
                            <td>{{ $dosen->gelar_belakang }}</td>
                            <td>{{ $dosen->nohp }}</td>
                            <td>{{ $dosen->tempat_lahir }}</td>
                            <td>{{ $dosen->tanggal_lahir }}</td>
                            @if ( $dosen->jenis_kelamin ==1 )
                            <td>Laki-Laki</td>
                            @else 
                            <td>Perempuan</td>
                            @endif
                            
                            
                            <td class="text-center">
                                <a href="{{route('dosen.show', [$dosen->id])}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i></a>
                                <a href="{{route('dosen.edit', [$dosen->id])}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></a>
                                <button onclick="event.preventDefault();confirmDeletion('{{url('dosen/'.$dosen->id)}}');" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
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
        if(confirm('Anda yakin akan menghapus data dosen ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
    
</script>
@endpush

