@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
 
    <a class="btn" href="{{ route('perbaikanruangans.index') }}"><i class="icon-list"></i> List</a>

@endsection

{{-- Content Utama --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Informasi Pengajuan Perbaikan Ruangan
            </div>
            <div class="card-body">
                <form action="" method="post">
                   <div class="form-group row">
                        <label class="col-md-3 col-form-label">Ruangan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangans[$perbaikanRuangan->ruangan_id] }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikanRuangan->tanggal_pengajuan }}</p>
                        </div>
                    </div>
                    
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Pengaju</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $users[$perbaikanRuangan->pengaju_id] }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Alasan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikanRuangan->alasan }}</p>
                        </div>
                    </div>


                       <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status Pengajuan</label>
                        <?php 
                                if ( $perbaikanRuangan->perbaikan_status_id==1 ) {
                                ?><p class="col-form-label"> Diajukan </p><?php
                                }
                                else{
                                 ?><p class="col-form-label"> dibatalkan </p><?php
                                }
                             ?>
                    </div>

                       <div class="form-group row">
                        <label class="col-md-3 col-form-label">Aksi</label>
                       
                         @if($perbaikanRuangan->perbaikan_status_id == 1)
                                <a href="{{ route('perbaikanruangans.batalkan', $perbaikanRuangan->id)}}" class="btn btn-sm btn-outline-primary">
                                     Batalkan Pengajuan
                                </a>
                              
                                @else
                                <a href="{{ route('perbaikanruangans.ajukan', $perbaikanRuangan->id)}}" class="btn btn-sm btn-outline-secondary">
                                     Ajukan Perbaikan
                                </a>
                                @endif
                     
                    </div>


               

                </form>
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

   

    function ajukan(url){
        form = document.querySelector('#form-activation');
        form.action = url;
        form.submit();
    }


</script>
@endpush




