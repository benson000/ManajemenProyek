@extends('layouts.app')

@section('content')
<div class="card uper">
  	<div class="card-header">
    	Edit Kategori
  	</div>
  	<div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      	<div class="container">
  			<form method="post" action="{{ route('categories.update', $categories->id) }}">
				{{-- PROTECTION TOKEN --}}
	      		@csrf
	      		@method('PATCH')
	      		{{-- PROTECTION TOKEN --}}

	      		<div class="form-group">
	              	<label for="name">Nama Kategori:</label>
	              	<input type="text" class="form-control" name="nama" value="{{ $categories->nama }}" required/>
	          	</div>

	          	<button type="submit" class="btn btn-primary">Simpan Data</button>
	      	</form>
      	</div>
  	</div>
</div>
@endsection