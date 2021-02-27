@extends('layouts.admin')

@section('content') 


@if($comments)

<h2>Comments</h2>


<table class="table">
    <thead>
      <th>Id</th>
      <th>Auther</th>
      <th>mail</th>
      <th>Body</th>
      <th>Post</th>
      <th>Status</th>
     <th>Action</th>
      
    </thead>
    
    <tbody>
    
    	@foreach($comments as $comment)
  	
  		<tr>
	        <td>{{$comment->id}}</td>
	        <td>{{$comment->auther}}</td>
	        <td>{{$comment->email}}</td>
	        <td>{{$comment->body}}</td>
	       
	      	<td><a href="{{route('home.post',$comment->post->id)}}">View post</a></td>
	      	<td>

	      	@if($comment->is_active==1)
	      		{!! Form::open(['method' => 'Patch', 'action' => ['CommentsController@update',$comment->id],'files'=>true]) !!}
	      		 <!-- Submit Button -->
	     		<input type="hidden"  name="is_active" value="0"> 
		        <div class="form-group">
		            <div class="col-lg-10 col-lg-offset-2">
		                {!! Form::submit('Un-Approve', ['class' => 'btn btn-lg btn-success '] ) !!}
		            </div>
		        </div>
 
				 {!! Form::close()  !!}
				 @else

				 {!! Form::open(['method' => 'Patch', 'action' => ['CommentsController@update',$comment->id],'files'=>true]) !!}

				 <input type="hidden"  name="is_active" value="1">
	      		 <!-- Submit Button -->
		        <div class="form-group">
		            <div class="col-lg-10 col-lg-offset-2">
		                {!! Form::submit('Approve', ['class' => 'btn btn-lg btn-info '] ) !!}
		            </div>
		        </div>
 
				 {!! Form::close()  !!}

				 @endif
			</td>	 
			<td>{!! Form::open(['method' => 'Delete', 'action' => ['CommentsController@destroy',$comment->id],'files'=>true]) !!}
	      		 <!-- Submit Button -->
	     		<input type="hidden"  name="is_active" value="0"> 
		        <div class="form-group">
		            <div class="col-lg-10 col-lg-offset-2">
		                {!! Form::submit('Delete', ['class' => 'btn btn-lg btn-danger'] ) !!}
		            </div>
		        </div>
 
				 {!! Form::close()  !!}</td>


      	</tr>   
		@endforeach
	</tbody>	

</table>
@else

<h1 class="text-center">No Comments</h1>
@endif

@endsection 
