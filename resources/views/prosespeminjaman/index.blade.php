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
                <i class="fa fa-align-justify"></i> Index Peminjaman
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nama Ruangan</th>
                            <th class="text-center">Peminjam </th>
                            <th class="text-center">Pengaju</th>
                            <th class="text-center">tanggal_pengajuan</th>
                            <th class="text-center">tanggal_peminjaman</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Check</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($PeminjamanRuangan as $PeminjamanRuangan)
                        
                        <tr>
                            <td>{{ $ruangan[$PeminjamanRuangan->ruangan_id] }}</td>
                            <td>{{ $user[$PeminjamanRuangan->peminjam_id] }}</td>
                            <td>{{ $PeminjamanRuangan->pengaju }}</td>
                            <td>{{ $PeminjamanRuangan->tanggal_pengajuan }}</td>
                            <td>{{ $PeminjamanRuangan->tanggal_peminjaman }}</td>
                           

                            <td class="text-center">
                                @if($PeminjamanRuangan->peminjaman_status_id == 1)
                                <a href="#" class="btn btn-sm btn-outline-primary" onclick="event.preventDefault();activation('{{ route('prosespeminjamans.deactivate', [$PeminjamanRuangan->id]) }}')">
                                    Disetujui (batalkan)
                                </a>
                                @else
                                <a href="#" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault();activation('{{ route('prosespeminjamans.activate', [$PeminjamanRuangan->id]) }}')">
                                    Belum disetujui (Setujui)
                                </a>
                                @endif

                                   
                            </td>
                                                    
                            
                            <td class="text-center">

                                <a href="{{ route('prosespeminjamans.show', [$PeminjamanRuangan->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> </i>
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


<form style="display: none" action="#" method="post" id="form-activation">
    @csrf
</form>



@endsection

@push('javascript')
<script>
     function activation(url){
        form = document.querySelector('#form-activation');
        form.action = url;
        form.submit();
    }

</script>
@endpush

