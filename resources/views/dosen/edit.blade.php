@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('dosen.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('dosen.destroy', [$dosen->id]) }}" method="post" id="form-delete">
        @csrf
        @method('delete')
    </form>
@endsection

{{-- Content Utama --}}
@section('content')
<div class="row">
    <div class="col-md-12"> 
        <div class="card">

            {!! Form::model($dosen, ['route' => ['dosen.update', $dosen->id], 'files' => true, 'method' => 'patch'] ) !!}

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Update Dosen
            </div>

            <div class="card-body">    

                    @include('dosen._form')

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Update</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
            </div>

            {{ Form::close() }}

        </div>
    </div>
</div>
@endsection