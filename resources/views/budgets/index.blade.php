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
				<th scope="col">Saldo</th>
				<th scope="col">Keterangan</th>

				@if(Auth::user()->type == 'a')
				{{-- ADMIN ONLY --}}
				<th scope="col" colspan="2">Actions</th>
				{{-- ADMIN ONLY --}}
				@endif
			</thead>
			<tbody>
			@foreach($budgets as $key => $bud)
				<tr>
					<td>{{ $bud->id_events }}</td>
					<td>{{ $bud->saldo }}</td>
					<td>{{ $bud->keterangan }}</td>

					@if(Auth::user()->type == 'a')
					{{-- ADMIN ONLY --}}
					<td>
						<a href="{{ route('budgets.edit', $bud->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('budgets.destroy', $bud->id) }}" method="post">
                  			@csrf
                  			@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
					{{-- ADMIN ONLY --}}
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>
		
		@if(Auth::user()->type == 'a' || Auth::user()->type == 'd')
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		<a href="{{ url('budgets/create') }}">
			<button class="btn btn-success">Tambahkan Data</button>
		</a>
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		@endif
		
	</div>
</div>
@endsection