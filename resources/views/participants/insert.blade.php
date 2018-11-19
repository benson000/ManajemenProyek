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
  			<form method="post" action="{{ route('participants.store') }}">
				{{-- PROTECTION TOKEN --}}
	      		@csrf
	      		{{-- PROTECTION TOKEN --}}

	          	<div class="form-group">
	              	<label for="name">Kode Event:</label>
	              	<select class="form-control" name="id_events" required>
	  					@foreach($events as $key => $event)
	  						<option value="{{ $event->id_events }}">{{ $event->id_events }}</option>
	  					@endforeach
					</select>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">ID Peserta:</label>
	              	<input type="text" class="form-control" name="id_peserta" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Password:</label>
	              	<input type="password" class="form-control" name="password" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Nama Peserta:</label>
	              	<input type="text" class="form-control" name="nama" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Keterangan Aktivitas:</label>
	              	<input type="text" class="form-control" name="keterangan" required/>
	          	</div>

	          	<button type="submit" class="btn btn-primary">Simpan Data</button>
	      	</form>
      	</div>
  	</div>
</div>
@endsection