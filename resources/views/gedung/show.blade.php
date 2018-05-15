@extends('blank')

{{-- Menu Breadcrumb --}}


{{-- Content Utama --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('gedungs.index') }}"><i class="icon-list"></i> List</a>
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Informasi Gedung
            </div>
            <div class="card-body">
                <form action="" method="post">

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Gedung          :</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $gedung->nama }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Lokasi Gedung :</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $gedung->lokasi }}</p>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Luas Gedung :</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $gedung->luas }} m2</p>
                        </div>
                    </div>

                 <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jumlah Lantai :</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $gedung->jumlah_lantai }}</p>
                        </div>
                    </div>

                       <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tahun Pembangunan     :</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $gedung->tahun_pembangunan }}</p>
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
        if(confirm('Anda yakin akan menghapus user ini?')){
            form = document.querySelector('form-delete');
            form.submit();
        }
    }
</script>