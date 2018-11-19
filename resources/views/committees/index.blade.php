@extends('layouts.app')

@section('content')
<div class="container">
	@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}  
		</div><br/>
	@endif
	<div class="row">
		<table class="table">
			<thead class="thead-dark">
				<th scope="col">ID Event</th>
				<th scope="col">ID Panitia</th>
				<th scope="col">Nama Panitia</th>
				<th scope="col">Nama Panitia</th>
				<th scope="col">Tanggung Jawab</th>
				<th scope="col" colspan="2">Actions</th>
			</thead>
			<tbody>
			@foreach($committees as $key => $com)
				<tr>
					<td>{{ $com->id_events }}</td>
					<td>{{ $com->id_user }}</td>
					<td>{{ $com->nama }}</td>
					<td>{{ $com->jabatan }}</td>
					<td>{{ $com->tanggung_jawab }}</td>

					<td>
						<a href="{{ route('committees.edit', $com->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('committees.destroy', $com->id) }}" method="post">
                  			@csrf
                  			@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<a href="{{ url('committees/create') }}"><button class="btn btn-success">Tambahkan Data</button></a>
	</div>
</div>
@endsection