@extends('layouts.app')

@section('content')
<div class="card uper">
  	<div class="card-header">
    	Add Share
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
  			<form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
				{{-- PROTECTION TOKEN --}}
	      		@csrf
	      		{{-- PROTECTION TOKEN --}}

	      		<div class="form-group">
	              	<label for="name">ID Event:</label>
	              	<input type="text" class="form-control" name="id_events" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Nama Event:</label>
	              	<input type="text" class="form-control" name="name" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Tanggal Dimulai:</label>
	              	<input type="date" class="form-control" name="start_date" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Tanggal Selesai:</label>
	              	<input type="date" class="form-control" name="end_date" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Tempat:</label>
	              	<input type="text" class="form-control" name="place" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Tema Event:</label>
	              	<input type="text" class="form-control" name="theme" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Kategori:</label>
	              	<select class="form-control" name="category" required>
	  					@foreach($categories as $key => $category)
	  						<option value="{{ $category->nama }}" >{{ $category->nama }}</option>
	  					@endforeach
					</select>
	          	</div>
	          	
	      		<div class="form-group">
	              	<label for="name">Tujuan:</label>
	              	<input type="text" class="form-control" name="tujuan" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Proposal:</label>
	              	<input type="file" class="form-control-file" name="proposal" required/>
	          	</div>

	          	<input type="hidden" name="approval" value="BELUM DISETUJUI">

	          	<button type="submit" class="btn btn-primary">Simpan Data</button>
	      	</form>
      	</div>
  	</div>
</div>
@endsection