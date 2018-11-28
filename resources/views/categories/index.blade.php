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
				<th scope="col">Nama Kategori</th>
				@if(Auth::user()->type == 'a')
				{{-- ADMIN ONLY --}}
				<th scope="col" colspan="2">Actions</th>
				{{-- ADMIN ONLY --}}
				@endif
			</thead>
			<tbody>
			@foreach($categories as $key => $cat)
				<tr>
					<td>{{ $cat->nama }}</td>
					
					@if(Auth::user()->type == 'a')
					{{-- ADMIN ONLY --}}
					<td>
						<a href="{{ route('categories.edit', $cat->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('categories.destroy', $cat->id) }}" method="post">
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
		<a href="{{ url('categories/create') }}">
			<button class="btn btn-success">Tambahkan Data</button>
		</a>
		{{-- ADD DATA - DOSEN AND ADMIN ONLY --}}
		@endif
	</div>
</div>
@endsection