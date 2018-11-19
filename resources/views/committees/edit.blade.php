@extends('layouts.app')

@section('content')
<div class="card uper">
  	<div class="card-header">
    	Edit Aktivitas
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
  			<form method="post" action="{{ route('committees.update', $committees->id) }}">
				{{-- PROTECTION TOKEN --}}
	      		@csrf
	      		@method('PATCH')
	      		{{-- PROTECTION TOKEN --}}

	          	<div class="form-group">
	              	<label for="name">Kode Event:</label>
	              	<select class="form-control" name="id_events" required>
	  					@foreach($events as $key => $event)
	  						<option value="{{ $event->id_events }}" <?php if($event->id_events == $committees->id_events) echo "selected='selected'" ?>>{{ $event->id_events }}</option>
	  					@endforeach
					</select>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">ID Panitia:</label>
	              	<input type="text" class="form-control" name="id_user" value="{{ $committees->id_user }}" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Password:</label>
	              	<input type="password" class="form-control" name="password" value="{{ $committees->password }}" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Nama Panitia:</label>
	              	<input type="text" class="form-control" name="nama" value="{{ $committees->nama }}" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Jabatan:</label>
	              	<input type="text" class="form-control" name="jabatan" value="{{ $committees->jabatan }}" required/>
	          	</div>
	          	
	          	<div class="form-group">
	              	<label for="name">Tanggung Jawab:</label>
	              	<input type="text" class="form-control" name="tanggung_jawab" value="{{ $committees->tanggung_jawab }}" required/>
	          	</div>

	          	<button type="submit" class="btn btn-primary">Simpan Data</button>
	      	</form>
      	</div>
  	</div>
</div>
@endsection