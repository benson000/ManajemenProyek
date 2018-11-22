@extends('layouts.app')

@section('content')
<div class="card uper">
  	<div class="card-header">
    	Edit Event
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
  			<form method="post" action="{{ route('events.update', $events->id) }}" enctype="multipart/form-data">
				{{-- PROTECTION TOKEN --}}
	      		@csrf
	      		@method('PATCH')
	      		{{-- PROTECTION TOKEN --}}

	      		<div class="form-group">
	              	<label for="name">ID Event:</label>
	              	<input type="text" class="form-control" name="id_events" value="{{ $events->id_events }}" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Nama Event:</label>
	              	<input type="text" class="form-control" name="name" value="{{ $events->name }}" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Tanggal Dimulai:</label>
	              	<input type="date" class="form-control" name="start_date" value="{{ $events->start_date }}" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Tanggal Selesai:</label>
	              	<input type="date" class="form-control" name="end_date" value="{{ $events->end_date }}" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Tempat:</label>
	              	<input type="text" class="form-control" name="place" value="{{ $events->place }}" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Tema Event:</label>
	              	<input type="text" class="form-control" name="theme" value="{{ $events->theme }}" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Kategori:</label>
	              	<select class="form-control" name="category" required>
	  					@foreach($categories as $key => $category)
	  						<option value="{{ $category->nama }}" <?php if($category->nama == $events->name) echo "selected='selected'" ?>>{{ $category->nama }}</option>
	  					@endforeach
					</select>
	          	</div>
	          	
	      		<div class="form-group">
	              	<label for="name">Tujuan:</label>
	              	<input type="text" class="form-control" name="tujuan" value="{{ $events->tujuan }}" required/>
	          	</div>

	          	<div class="form-group">
	              	<label for="name">Proposal: [TIDAK USAH DIISI JIKA SUDAH UPLOAD]</label>
	              	<input type="file" class="form-control-file" name="proposal" value="{{ $events->proposal }}" />
	          	</div>

	          	<input type="hidden" name="approval" value="{{ $events->approval }}">

	          	<button type="submit" class="btn btn-primary">Simpan Data</button>
	      	</form>
      	</div>
  	</div>
</div>
@endsection