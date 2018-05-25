<div class="form-group">
    <label for="id">Ruangan</label>
    {{ Form::select('ruangan_id',$ruangans, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="tanggal pengajuan">Tanggal Peminjaman</label>
   {{ Form::date('tanggal_peminjaman','tanggal_peminjaman', null, ['class' => 'form-control','placeholder'=>'date'])}}
</div>
<div class="form-group">
    <label for="tanggal mulai">Tanggal Mulai</label>
   {{ Form::date('tanggal_mulai','tanggal_mulai', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="jam mulai">Jam Mulai</label>
   {{ Form::text('jam_mulai', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="tanggal selesai">Tanggal Selesai</label>
   {{ Form::date('tanggal_selesai','tanggal_selesai', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="jam selesai">Jam Selesai</label>
   {{ Form::text('jam_selesai', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="tujuan">Tujuan</label>
   {{ Form::text('tujuan', null, ['class' => 'form-control'])}}
</div>







