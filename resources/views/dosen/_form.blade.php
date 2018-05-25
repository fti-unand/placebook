<div class="form-group">
    <label for="nama"></label>
@if($edit==0)
    {{ Form::hidden('user_id', $user,null, ['class' => 'form-control'])}}
@else
<label>: {{$user->username}}
    {{ Form::hidden('user_id', $user->username,null, ['class' => 'form-control'])}}
    @endif

</div>


<div class="form-group">
    <label for="nama">Nama</label>
    {{ Form::text('nama',null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="nip">NIP</label>
    {{ Form::text('nip', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="nidn">NIDN</label>
    {{ Form::text('nidn', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="gelar_depan">Gelar Depan</label>
    {{ Form::text('gelar_depan', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="gelar_depan">Gelar Belakang</label>
    {{ Form::text('gelar_belakang', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="gelar_depan">Nomor HP</label>
    {{ Form::text('nohp', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="gelar_depan">Tempat Lahir</label>
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="gelar_depan">Tanggal Lahir</label>
    {{ Form::date('tanggal_lahir', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="gelar_depan">Jenis Kelamin</label>
    {{ Form::select('jenis_kelamin',['1'=>'laki - laki', '2' =>'perempuan'], null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="avatar">Foto</label>
    {{ Form::file('avatar', ['class' => 'form-control']) }}
</div>