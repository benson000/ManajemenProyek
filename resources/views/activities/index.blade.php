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
				<th scope="col">Keterangan</th>
				<th scope="col" colspan="2">Actions</th>
			</thead>
			<tbody>
			@foreach($activities as $key => $act)
				<tr>
					<td>{{ $act->id_events }}</td>
					<td>{{ $act->name }}</td>
					<td>{{ $act->start_date }}</td>
					<td>{{ $act->end_date }}</td>
					<td>{{ $act->keterangan }}</td>

					<td>
						<a href="{{ route('activities.edit', $act->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('activities.destroy', $act->id) }}" method="post">
                  			@csrf
                  			@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<a href="{{ url('activities/create') }}"><button class="btn btn-success">Tambahkan Data</button></a>
	</div>
</div>
@endsection