@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="" onclick="event.preventDefault();confirmDeletion('{{url('ruangan/'.$ruangan->id)}}');"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('ruangan.edit', [ $ruangan->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('ruangan.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('ruangan.destroy', [$ruangan->id]) }}" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> Informasi Ruangan
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Luas</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan->luas }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Lantai</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan->lantai }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Bisa Dipinjam</label>
                        <div class="col-md-9">

                        @if($ruangan->bisa_dipinjam==1)
                            <p class="col-form-label">Ruangan bisa dipinjam</p>
                        @else
                            <p class="col-form-label">Ruangan tidak bisa dipinjam</p>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Kondisi</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan->kondisi->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Fungsi</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan->fungsi->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Pengelola</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $ruangan->unit->nama }}</p>
                        </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('javascript')
<script>
     function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus ruangan ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
</script>