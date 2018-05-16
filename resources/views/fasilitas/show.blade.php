@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('fasilitas.destroy', [ $detail->id]) }}" onclick="event.preventDefault();confirmDeletion();"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('fasilitas.edit', [ $detail->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('fasilitas.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('fasilitas.destroy', [$detail->id]) }}" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> Informasi fasilitas
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Fasilitas ID</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $detail->id }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Fasilitas</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $detail->nama }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Waktu Pembuatan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $detail->created_at }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Waktu Perubahan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $detail->updated_at }}</p>
                        </div>
                    </div>

                    <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 20px">NO</th>
                            <th class="text-center">Nama Ruangan</th>
                            <th class="text-center" style="width: 20px">Jumlah</th>
                            <th class="text-center" style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0;?>
                        @foreach($tampil as $tampil)
                        <tr>
                            <td style="width: 20px">{{ ++$no }}</td>
                            <td>{{ $tampil->nmruangan }}</td>
                            <td style="width: 20px">{{ $tampil->jumlah }}</td>
                                                        
                            <td class="text-center" style="width: 40px" >
                                <a href="{{ route('fasilitas.show', [$tampil->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> </i>
                                </a>
                                <a href="{{ route('fasilitas.edit', [$tampil->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <button onclick="event.preventDefault();confirmDeletion('{{ route('fasilitas.destroy', [$tampil->id]) }}');" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"> </i>
                                </button>
                                
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        if(confirm('Anda yakin akan menghapus Fasilitas ini?')){
            form = document.querySelector('form-delete');
            form.submit();
        }
    }
</script>