@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
     
@endsection

{{-- Content Utama 
    --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        
        <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i>Detail Peminjaman
                        
            </div>

            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"> Ruangan </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan[$PeminjamanRuangan->ruangan_id] }}</p>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-md-3 col-form-label"> peminjam </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $user[$PeminjamanRuangan->peminjam_id] }}</p>
                        </div>
                    </div>


                     <div class="form-group row">
                        <label class="col-md-3 col-form-label"> pengaju </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $PeminjamanRuangan->pengaju }}</p>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-md-3 col-form-label"> tanggal_pengajuan </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $PeminjamanRuangan->tanggal_pengajuan }}</p>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"> tanggal peminjaman </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $PeminjamanRuangan->tanggal_peminjaman }}</p>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"> jam mulai </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $PeminjamanRuangan->jam_mulai }}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"> tanggal_selesai </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $PeminjamanRuangan->tanggal_selesai }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"> jam_selesai </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $PeminjamanRuangan->jam_selesai }}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">status peminjaman </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $status[$PeminjamanRuangan->peminjaman_status_id] }}</p>
                        </div>
                    </div>


                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"> tujuan </label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $PeminjamanRuangan->tujuan }}</p>
                        </div>
                    </div>

                  <tbody>                               
                   
                </form>
            </div>
            <div  > @if($PeminjamanRuangan->peminjaman_status_id == 1)
                <a href="#" class="btn btn-sm btn-outline-primary" onclick="event.preventDefault();activation('{{ route('prosespeminjamans.deactivate', [$PeminjamanRuangan->id]) }}')">
                                    Disetujui (batalkan)
                    </a>
                    @else
                    <a href="#" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault();activation('{{ route('prosespeminjamans.activate', [$PeminjamanRuangan->id]) }}')">
                                    Belum disetujui (Setujui)
                </a>
                @endif
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


