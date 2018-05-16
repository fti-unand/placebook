<div class="form-group">
    <label for="perbaikan_status_id">Status Perbaikan</label>
    {{ Form::select('perbaikan_status_id',['1'=>'Pending','2'=>'Mnunggu vendor','3'=>'Sedang Diperbaiki','4'=>'Selesai Diperbaiki'], null, ['class' => 'form-control'])}}
</div>


