@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ route('units.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Unit
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"> </th>
                            <th class="text-center">Nama Unit</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Tanggal Berdiri</th>
                            <th class="text-center">Unit Induk</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            ?>
                        @foreach($Units as $Unit)
                        <tr>
                            
                            
                            <td><?php echo $no++ ?></td>
                            <td>{{ $Unit->nama }}</td>
                            <td>{{ $Unit->keterangan }}</td>
                            <td>{{ $Unit->tanggal_berdiri}}</td>
                            <?php $Induk = DB::table('unit')->where('id', $Unit->unit_induk_id)->value('nama');?>
                            <td><?php echo $Induk?></td>
                            
                            <td class="text-center">
                                <a href="{{ route('units.show', [$Unit->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> </i>
                                </a>
                                <a href="{{ route('units.edit', [$Unit->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <button onclick="event.preventDefault();confirmDeletion('{{ route('units.destroy', [$Unit->id]) }}');" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"> </i>
                                </button>
                                
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
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus unit ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
    
    function activation(url){
        form = document.querySelector('#form-activation');
        form.action = url;
        form.submit();
    }
</script>
@endpush

