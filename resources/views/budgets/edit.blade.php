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
  			<form method="post" action="{{ route('budgets.update', $budgets->id) }}">
				{{-- PROTECTION TOKEN --}}
	      		@csrf
	      		@method('PATCH')
	      		{{-- PROTECTION TOKEN --}}

	          	<div class="form-group">
	              	<label for="name">Kode Events:</label>
	              	<select class="form-control" name="id_events" required>
	  					@foreach($events as $key => $event)
	  						<option value="{{ $event->id_events }}" <?php if($event->id_events == $budgets->id_events) echo "selected='selected'"; ?>>{{ $event->id_events }}</option>
	  					@endforeach
					</select>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Saldo:</label>
	              	<input type="number" class="form-control" name="saldo" value="{{ $budgets->saldo }}" required/>
	          	</div>
	          	<div class="form-group">
	              	<label for="name">Keterangan:</label>
	              	<input type="text" class="form-control" name="keterangan" value="{{ $budgets->keterangan }}" required/>
	          	</div>

	          	<button type="submit" class="btn btn-primary">Simpan Data</button>
	      	</form>
      	</div>
  	</div>
</div>
@endsection