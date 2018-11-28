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
				<th scope="col">ID Panitia</th>
				<th scope="col">Nama Panitia</th>
				<th scope="col">Nama Panitia</th>
				<th scope="col">Tanggung Jawab</th>

				@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
				{{-- ADMIN AND DOSEN ONLY --}}
				<th scope="col" colspan="2">Actions</th>
				{{-- ADMIN AND DOSEN ONLY --}}
				@endif
			</thead>
			<tbody>
			@foreach($committees as $key => $com)
				<tr>
					<td>{{ $com->id_events }}</td>
					<td>{{ $com->id_user }}</td>
					<td>{{ $com->nama }}</td>
					<td>{{ $com->jabatan }}</td>
					<td>{{ $com->tanggung_jawab }}</td>
					
					@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
					{{-- ADMIN AND DOSEN ONLY --}}
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
					{{-- ADMIN AND DOSEN ONLY --}}
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>

		@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		<a href="{{ url('committees/create') }}">
			<button class="btn btn-success">Tambahkan Data</button>
		</a>
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		@endif
	</div>
</div>
@endsection