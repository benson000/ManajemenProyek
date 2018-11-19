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
				<th scope="col">ID Peserta</th>
				<th scope="col">Nama Peserta</th>
				<th scope="col">Keterangan</th>
				<th scope="col" colspan="2">Actions</th>
			</thead>
			<tbody>
			@foreach($participants as $key => $participant)
				<tr>
					<td>{{ $participant->id_events }}</td>
					<td>{{ $participant->id_peserta }}</td>
					<td>{{ $participant->nama }}</td>
					<td>{{ $participant->keterangan }}</td>

					<td>
						<a href="{{ route('participants.edit', $participant->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('participants.destroy', $participant->id) }}" method="post">
                  			@csrf
                  			@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<a href="{{ url('participants/create') }}"><button class="btn btn-success">Tambahkan Data</button></a>
	</div>
</div>
@endsection