@extends('blank')

<!-- {{-- Menu Breadcrumb --}} -->

<!-- {{-- Content Utama --}} -->
@section('content')
<h1>EDIT</h1>

<form action='{{url("/fas/".$id)}}' method='patch'>
	Nama : <input type="text" name="nama">
	<input type="submit" class='btn btn-primary'>
</form>
@endsection