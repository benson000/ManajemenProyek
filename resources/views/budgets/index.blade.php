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
				<th scope="col">Saldo</th>
				<th scope="col">Keterangan</th>
				<th scope="col" colspan="2">Actions</th>
			</thead>
			<tbody>
			@foreach($budgets as $key => $bud)
				<tr>
					<td>{{ $bud->id_events }}</td>
					<td>{{ $bud->saldo }}</td>
					<td>{{ $bud->keterangan }}</td>

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
				</tr>
			@endforeach
			</tbody>
		</table>

		<a href="{{ url('budgets/create') }}"><button class="btn btn-success">Tambahkan Data</button></a>
	</div>
</div>
@endsection