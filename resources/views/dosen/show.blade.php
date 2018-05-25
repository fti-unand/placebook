@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('dosen.edit', [ $dosen->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('dosen.index') }}"><i class="icon-list"></i> List</a>
    
    <button onclick="event.preventDefault();confirmDeletion('{{url('dosen/'.$dosen->id)}}');" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Hapus</a>
    <form style="display: none" action="#" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> Informasi User
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Username</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">NIP</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->nip }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">NIDN</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->nidn }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Gelar Depan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->gelar_depan }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Gelar Belakang</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->gelar_belakang }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">No.HP</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->nohp }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tempat Lahir</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->tempat_lahir }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"> Tanggal Lahir</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $dosen->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-9">
                        @if ( $dosen->jenis_kelamin ==1 )
                            <p class="col-form-label">Laki-Laki</p>
                        @else 
                            <p class="col-form-label">Perempuan</p>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{$dosen->london}}</label>
                        <div class="col-md-9 text-center">
                            <!-- <img height="20" width="30" src="{{$dosen->london}}" /> -->
                            {{$dosen->london}}
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
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus data dosen ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
    
</script>
@endpush

