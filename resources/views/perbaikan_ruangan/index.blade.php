@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ route('perbaikanruangans.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Pengajuan
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Ruangan</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Pengajuan Status </th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Detail</th>
                        </tr>


                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        ?>
                         @foreach($perbaikan_ruangans as $perbaikanRuangan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $ruangans[$perbaikanRuangan->ruangan_id] }}</td>
                            <td>{{ $perbaikanRuangan->tanggal_pengajuan }}</td>
                            <td>{{ $perbaikanRuangan->perbaikanStatus->nama }}</td>
                            
                            <td class="text-center">
                                @if($perbaikanRuangan->perbaikan_status_id == 1)
                                <a href="#" class="btn btn-sm btn-outline-primary" onclick="event.preventDefault();ajukan('{{ route('perbaikanruangans.deactivate', [$perbaikanRuangan->id]) }}')">
                                     Batalkan Pengajuan
                                </a>
                              
                                @else
                                <a href="#" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault();ajukan('{{ route('perbaikanruangans.activate', [$perbaikanRuangan->id]) }}')">
                                     Ajukan Perbaikan
                                </a>
                                @endif
                            </td>
                        
                               <td>
                            
                             <div class='btn-group'>
                                    <a href="{!! route('perbaikanruangans.show', [$perbaikanRuangan->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                                
                         
                             </div>
                               
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

   

    function ajukan(url){
        form = document.querySelector('#form-activation');
        form.action = url;
        form.submit();
    }


</script>
@endpush



