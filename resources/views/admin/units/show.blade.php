@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('units.destroy', [ $Unit->id]) }}"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('units.edit', [ $Unit->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('units.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('units.destroy', [$Unit->id]) }}" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> Informasi Unit
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $Unit->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Keterangan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $Unit->keterangan }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Berdiri</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $Unit->tanggal_berdiri }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Unit Induk</label>
                        <div class="col-md-9">
                            <?php $Induk = DB::table('unit')->where('id', $Unit->unit_induk_id)->value('nama');?>
                            <?php echo $Induk?>
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
        if(confirm('Anda yakin akan menghapus unit ini?')){
            form = document.querySelector('form-delete');
            form.submit();
        }
    }
</script>