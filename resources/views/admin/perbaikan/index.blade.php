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
                <i class="fa fa-align-justify"></i> Daftar Perbaikan
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Ruangan ID</th>
                            <th class="text-center">Tgl Pengajuan</th>
                            <th class="text-center">Pengaju ID</th>
                            <th class="text-center">Status Perbaikan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Update Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($perbaikans as $perbaikan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $ruangan[$perbaikan->ruangan_id] }}</td>
                            <td>{{ $perbaikan->tanggal_pengajuan }}</td>
                            <td>{{ $perbaikan->pengaju_id }}</td>
                            <td>{{ $status[$perbaikan->perbaikan_status_id] }}</td>
                           
                           
                            <td class="text-center">
                                @if($perbaikan->perbaikan_status_id == 1)
                                <a href="#" class="btn btn-sm btn-outline-primary" onclick="event.preventDefault();activation('{{ route('perbaikan.deactivate', [$perbaikan->id]) }}')">
                                     Belum disetujui
                                </a>
                                @else
                                <a href="#" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault();activation('{{ route('perbaikan.activate', [$perbaikan->id]) }}')">
                                    Disetujui 
                                </a>
                                @endif
                            </td>
                            
                            <td class="text-center">
                                <a href="{{ route('perbaikan.show', [$perbaikan->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> </i>
                                </a>
                                
                                
                            </td>

                            <td class="text-center">
                            <a href="{{ route('perbaikan.edit', [$perbaikan->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-pencil"> </i>
                                </a>
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

