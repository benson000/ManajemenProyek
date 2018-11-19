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
				<th scope="col">Nama Kategori</th>

				<th scope="col" colspan="2">Actions</th>
			</thead>
			<tbody>
			@foreach($categories as $key => $cat)
				<tr>
					<td>{{ $cat->nama }}</td>

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
				</tr>
			@endforeach
			</tbody>
		</table>

		<a href="{{ url('categories/create') }}">
			<button class="btn btn-success">Tambahkan Data</button>
		</a>
	</div>
</div>
@endsection