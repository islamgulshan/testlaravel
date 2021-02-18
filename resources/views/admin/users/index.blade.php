@extends('layouts.admin')

@section('content') 

<h2>User List</h2>

@if(Session::has('delete_user'))

<p class="alert alert-danger">{{ session('delete_user')}}</p>

@endif

@if($users)
	<table class="table">
    <thead>
      <th>Id</th>
      <th>Photo</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Status</th>
      <th>Created</th>
      <th>Update</th>
    </thead>
    
    <tbody>
    

  	@foreach($users as $user)
  		<tr>
	        <td>{{$user->id}}</td>
	        <td><img src="{{url($user->photo? $user->photo->file:'Not Active')}}" height="50"></td>
	        <td><a href="{{route('user.edit',$user->id)}}">{{$user->name}}</a></td>
	        <td>{{$user->email}}</td>
	        <td>{{$user->role->name}}</td>
	        <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
	        <td>{{$user->created_at->diffForHumans()}}</td>
	        <td>{{$user->updated_at->diffForHumans()}}</td>
      	</tr>      
	@endforeach
	
	</tbody>	

</table>

@endif;

@endsection 
