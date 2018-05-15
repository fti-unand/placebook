@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('perbaikanruangans.destroy', [ $perbaikanRuangan->id]) }}" onclick="event.preventDefault();confirmDeletion();"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('perbaikanruangans.edit', [ $perbaikanRuangan->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('perbaikanruangans.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('perbaikanruangans.destroy', [$perbaikanRuangan->id]) }}" method="post" id="form-delete">
        @csrf
        @method('delete')
    </form>
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
                        <label class="col-md-3 col-form-label">Status Perbaikan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $status[$perbaikanRuangan->perbaikan_status_id] }}</p>
                        </div>
                    </div>

                       <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status Pengajuan</label>
                        <?php 
                                if ( $perbaikanRuangan->status_pengajuan==1 ) {
                                ?><p class="col-form-label"> Diajukan </p><?php
                                }
                                else{
                                 ?><p class="col-form-label"> dibatalkan </p><?php
                                }
                             ?>
                    </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Perbaikan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikanRuangan->tanggal_perbaikan  }}</p>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Selesai Perbaikan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $perbaikanRuangan->tanggal_selesai_perbaikan  }}</p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('javascript')
<script>
    function confirmDeletion(){
        if(confirm('Anda yakin akan data ini ?')){
            form = document.querySelector('form-delete');
            form.submit();
        }
    }
</script>

