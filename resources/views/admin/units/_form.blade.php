<div class="form-group">
    <label for="nama">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="keterangan">Keterangan</label>
    {{ Form::text('keterangan', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="tanggal_berdiri">Tanggal Berdiri</label>
    {{ Form::text('tanggal_berdiri', '2000-12-31', ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="unit_induk_id">Unit Induk</label>
    {{ Form::select('unit_induk_id', $induk, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih Unit Induk ...'])}}
</div>

