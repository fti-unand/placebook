<div class="form-group">
    <label for="gedung_id">Gedung</label>
    {{ Form::select('gedung_id', $gedungs, null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="nama">Nama Ruangan</label>
    {{ Form::text('nama', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="luas">Luas Ruangan</label>
    {{ Form::text('luas', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="lantai">Lantai</label>
    {{ Form::text('lantai', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="bisa_dipinjam">Status Peminjaman</label>
    {{ Form::select('bisa_dipinjam', [4 => '', 1 => 'Bisa dipinjam', 0 => 'Tidak bisa dipinjam'], null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="kondisi">Kondisi</label>
    {{ Form::select('kondisi', $kondisis, null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="fungsi">Fungsi</label>
    {{ Form::select('fungsi', $fungsis, null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="unit_pengelola_id">Pengelola</label>
    {{ Form::select('unit_pengelola_id', $pengelolas, null, ['class' => 'form-control'])}}
</div>