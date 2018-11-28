@extends('layouts.app')

@section('content')
<div class="container">
	@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}  
		</div><br/>
	@elseif(session()->get('error'))
		<div class="alert alert-danger">
			{{ session()->get('error') }}
		</div><br/>
	@endif
	<div class="row">
		<table class="table">
			<thead class="thead-dark">
				<th scope="col">ID Event</th>
				<th scope="col">ID Peserta</th>
				<th scope="col">Nama Peserta</th>
				<th scope="col">Keterangan</th>

				@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
				{{-- ADMIN AND DOSEN ONLY --}}
				<th scope="col" colspan="2">Actions</th>
				{{-- ADMIN AND DOSEN ONLY --}}
				@endif
			</thead>
			<tbody>
			@foreach($participants as $key => $participant)
				<tr>
					<td>{{ $participant->id_events }}</td>
					<td>{{ $participant->id_peserta }}</td>
					<td>{{ $participant->nama }}</td>
					<td>{{ $participant->keterangan }}</td>

					@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
					{{-- ADMIN AND DOSEN ONLY --}}
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
					{{-- ADMIN AND DOSEN ONLY --}}
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>

		@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		<a href="{{ url('participants/create') }}"><button class="btn btn-success">Tambahkan Data</button></a>
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		@endif
	</div>
</div>
@endsection