<div class="form-group">
    <label for="ruangan_id">Ruangan</label>
    {{ Form::select('ruangan_id',$ruangans, null, ['class' => 'form-control'])}}
</div>


<div class="form-group">
    <label for="alasan">Alasan</label>
    {{ Form::textarea('alasan', null, ['class' => 'form-control'])}}
</div>

<!-- <div class="form-group">
    <label for="perbaikan_status_id">Perbaikan Status</label>
    {{ Form::select('perbaikan_status_id',['1'=>'Ajukan'], null, ['class' => 'form-control'])}}
</div>
 -->

