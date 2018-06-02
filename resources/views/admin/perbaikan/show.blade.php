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
                <i class="fa fa-align-justify"></i> Detail Perbaikan
            </div>
            <div class="card-body">
                <form action="" method="post">
                   
                   
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Ruangan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan[$perbaikans->ruangan_id] }}</p>
                        </div>
                        <label class="col-md-3 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikans->tanggal_pengajuan }}</p>
                        </div>
                        <label class="col-md-3 col-form-label">User Pengaju</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $user[$perbaikans->pengaju_id] }}</p>
                        </div>
                        <label class="col-md-3 col-form-label">Alasan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikans->alasan }}</p>
                        </div>
                        <label class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $status[$perbaikans->perbaikan_status_id] }}</p>
                        </div>
                        <label class="col-md-3 col-form-label">Tanggal Perbaikan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikans->tanggal_perbaikan }}</p>
                        </div>
                        <label class="col-md-3 col-form-label">Tanggal Selesai Perbaikan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikans->tanggal_selesai_perbaikan }}</p>
                        </div>
                    </div>

                  
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection

