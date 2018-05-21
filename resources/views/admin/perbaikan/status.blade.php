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
                <i class="fa fa-align-justify"></i> Status Perbaikan
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama Ruangan</th>
                            <th class="text-center">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($perbaikans as $perbaikan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $ruangan[$perbaikan->ruangan_id] }}</td>
                            <td>{{ $status[$perbaikan->perbaikan_status_id] }}</td>
                            
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
        if(confirm('Anda yakin akan menghapus user ini? ')){
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
    var hidden = false;
    function sembunyi()
    {
        
        hidden = !hidden;
        if(hidden){
            document.getElementsByTagName('btn').style.visibility='hidden';
        } else{
            document.getElementsByTagName('btn').style.visibility='visible';
        }
    }
</script>
@endpush

