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
				<th scope="col">Nama Aktivitas</th>
				<th scope="col">Jam Dimulai</th>
				<th scope="col">Jam Selesai</th>
				<th scope="col">Tempat Pelaksanaan</th>
				<th scope="col">Tema Acara</th>
				<th scope="col">Kategori</th>
				<th scope="col">Tujuan</th>
				<th scope="col">Proposal</th>
				
				@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
				{{-- ADMIN AND DOSEN ONLY --}}
				<th scope="col">Approval</th>
				
				@if(Auth::user()->type == 'a')
				{{-- ADMIN ONLY --}}
				<th scope="col" colspan="3">Actions</th>
				{{-- ADMIN ONLY --}}
				@endif

				{{-- ADMIN AND DOSEN ONLY --}}
				@endif
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

					@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')

					{{-- DOWNLOAD PROPOSAL --}}
					<td>
						<a href="events/proposal/{{ $evt->proposal }}">Download Proposal</a>
					</td>
					<td>{{ $evt->approval }}</td>
					{{-- DOWNLOAD PROPOSAL --}}

					{{-- ACC --}}
					<td>
						<form action="{{ route('events.update', $evt->id) }}" method="post">
							{{-- PROTECTION TOKEN --}}
                  			@csrf
                  			@method('PATCH')
                  			{{-- PROTECTION TOKEN --}}
							
							<!-- EDIT -->
							<input type="hidden" name="id_events" value="{{ $evt->id_events }}">
							<input type="hidden" name="name" value="{{ $evt->name }}">
							<input type="hidden" name="start_date" value="{{ $evt->start_date }}">
							<input type="hidden" name="end_date" value="{{ $evt->end_date }}">
							<input type="hidden" name="place" value="{{ $evt->place }}">
							<input type="hidden" name="theme" value="{{ $evt->theme }}">
							<input type="hidden" name="category" value="{{ $evt->category }}">
							<input type="hidden" name="tujuan" value="{{ $evt->tujuan }}">
							<input type="hidden" name="proposal" value="{{ $evt->proposal }}">
							<input type="hidden" name="approval" value="DISETUJUI">
							
							<?php if($evt->approval != "DISETUJUI"){
								?>
								<button type="submit" class="btn btn-success">Setujui</button>
								<?php
							} ?>
						</form>
					</td>
					{{-- ACC --}}

						@if(Auth::user()->type == 'a')
						{{-- ADMIN ONLY --}}
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
						{{-- ADMIN ONLY --}}
						@endif
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>

		@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		<a href="{{ url('events/create') }}">
			<button class="btn btn-success">Tambahkan Data</button>
		</a>
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		@endif
	</div>
</div>
@endsection