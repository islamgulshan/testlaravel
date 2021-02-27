@extends('layouts.admin')

@section('content') 

<h2>Posts</h2>


<table class="table">
    <thead>
      <th>Id</th>
      <th>Photo</th>
      <th>Title</th>
      <th>Comments</th>

      
      <th>Category</th>
      <th>User</th>
      <th>Created</th>
      <th>Update</th>
    </thead>

	@if($posts)
    
    <tbody>
    
 
  	@foreach($posts as $post)
  		<tr>
	        <td>{{$post->id}}</td>
	        <td><img src="{{url($post->photo? $post->photo->file:'Not Active')}}" height="50"></td>
	        <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
	        <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
	        <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
	        <td>{{$post->category? $post->category->name:'Uncategories'}}</td>
	        <td>{{$post->user->name}}</td>
	        <td>{{$post->created_at->diffForHumans()}}</td>
	        <td>{{$post->updated_at->diffForHumans()}}</td>
      	</tr>      
	
	@endforeach
	
	</tbody>	

	@endif


</table>

@endsection 
