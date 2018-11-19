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
				<th scope="col">Nama Aktivitas</th>
				<th scope="col">Jam Dimulai</th>
				<th scope="col">Jam Selesai</th>
				<th scope="col">Tempat Pelaksanaan</th>
				<th scope="col">Tema Acara</th>
				<th scope="col">Kategori</th>
				<th scope="col">Tujuan</th>

				<th scope="col" colspan="2">Actions</th>
			</thead>
			<tbody>
			@foreach($events as $key => $evt)
				<tr>
					<td>{{ $evt->id_events }}</td>
					<td>{{ $evt->name }}</td>
					<td>{{ $evt->start_date }}</td>
					<td>{{ $evt->end_date }}</td>
					<td>{{ $evt->place }}</td>
					<td>{{ $evt->theme }}</td>
					<td>{{ $evt->category }}</td>
					<td>{{ $evt->tujuan }}</td>

					<td>
						<a href="{{ route('events.edit', $evt->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('events.destroy', $evt->id) }}" method="post">
                  			@csrf
                  			@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<a href="{{ url('events/create') }}">
			<button class="btn btn-success">Tambahkan Data</button>
		</a>
	</div>
</div>
@endsection