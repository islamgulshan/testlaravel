@extends('layouts.admin')

@section('content') 

<h2>Photos</h2>

@if(Session::has('delete_photo'))

<p class="alert alert-danger">{{ session('delete_photo')}}</p>

@endif

<table class="table">
    <thead>
      <th>Id</th>
      <th>Photo</th>
      <th>Created</th>
      <th>Action</th>
    </thead>

	@if($Photos)
    
    <tbody>
    
 
  	@foreach($Photos as $Photo)
  		<tr>
	        <td>{{$Photo->id}}</td>
	        <td><img src="{{url($Photo->file? $Photo->file:'Not Active')}}" height="50"></td>
	        <td>{{$Photo->created_at->diffForHumans()}}</td>
	       	<td>{!! Form::open(['method' => 'Delete', 'action' => ['MediaController@destroy',$Photo->id],'files'=>true]) !!}



  <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Delete', ['class' => 'btn btn-lg btn-danger pull-right'] ) !!}
            </div>
        </div>


{!! Form::close()  !!}</td> 
      	</tr>      
	
	@endforeach
	
	</tbody>	

	@endif


</table>

@endsection 
