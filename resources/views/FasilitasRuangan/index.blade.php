@extends('blank')

<!-- {{-- Menu Breadcrumb --}} -->

<!-- {{-- Content Utama --}} -->
@section('content')
    <a type="button" class="btn btn-info btn-lg poll pull-right" data-toggle="modal" data-target="#add">Tambahkan Fasilitas </a>

<table class="table table-border" >
        <thead>
        <th>
            NO
        </th>
        <th>
            Nama
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>
    <tbody>
        @php $o=0; @endphp
        @foreach ($fasilitas as $f)
        <tr>
            <td>
                {{++$o}}
            </td>
            <td>
                {{$f->nama}}
            </td>
            <td>
                 <a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#edit-{{$f->id}}"> Edit Fasilitas </a>


            <!-- Modal Edit -->
            <div id="edit-{{$f->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Edit Fasilitas</h4>
                  </div>
                  <div class="modal-body">

                       
                {!!Form::model($f,['url'=> ['/edit/'.$f->id],'method'=>'patch'])!!}
                  Nama : <input type="text" name="nama">
                   <input type="hidden" name="id" value="{{$f->id}}">
                   <button type='submit' class="btn btn-info">Save</button>
                {!!Form::close()!!}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                  </div>
                </div>

              </div>
            </div>

            </td>
            <td>
                  {!! Form::open(['url' => ['/destroy/'.$f->id], 'method' => 'delete']) !!}
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}

            </td>
        </tr>
        @endforeach 
</table>
</div>



<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Fasilitas</h4>
      </div>
      <div class="modal-body">

       <form action='{{url("/create")}}' method='post'>
        {{ csrf_field() }}

       <label>Nama</label>
       <input name='nama' class='form-control'type='text'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type='submit' class="btn btn-info" name='save'>
        <form> 
      </div>
    </div>

  </div>
</div>



@endsection