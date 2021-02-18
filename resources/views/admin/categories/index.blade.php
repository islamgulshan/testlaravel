@extends('layouts.admin')

@section('content') 

<h2>Categoires</h2>


<table class="table">
    <thead>
      <th>Id</th>
      
      <th>Title</th>
       
      <th>Created</th>
      <th>Update</th>
    </thead>

	@if($category)
    
    <tbody>
    
 
  	@foreach($category as $categorys)
  		<tr>
	        <td>{{$categorys->id}}</td>
	        
	        <td><a href="{{route('Categoires.edit',$categorys->id)}}">{{$categorys->name}}</a></td>
	        
	        <td>{{$categorys->created_at->diffForHumans()}}</td>
	        <td>{{$categorys->updated_at->diffForHumans()}}</td>
      	</tr>      
	
	@endforeach
	
	</tbody>	

	@endif


</table>

@endsection 
