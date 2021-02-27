@extends('layouts.post_detail')

@section('content')

<!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{url($post->photo?$post->photo->file:'900x300.png')}}" alt="">

                <hr>

                 
                 <p>{{$post->body}}</p>   

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    @if(Session::has('comments'))

                        {{Session('comments')}}
                         
                    @endif    

                   @if(Auth::check())

                   {!! Form::open(['method' => 'Post', 'action' => 'CommentsController@store','files'=>true]) !!}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                        
                  <!-- title -->
                    <div class="form-group">
                        {!! Form::label('Body', 'Body:', ['class' => 'col-lg-2 control-label']) !!}
                        
                            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>3]) !!}
                         
                    </div>

                                 <!-- Submit Button -->
                    <div class="form-group">
                         
                            {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info '] ) !!}
                       
                    </div>

                    {!! Form::close()  !!}

                    @endif

 
                </div>

                <hr>

                <!-- Posted Comments -->

                @if(count($comments)>0)

                @foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{url($comment->photo? $comment->photo:'Not Active')}}" height="50" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->title}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}

                        {!! Form::open(['method' => 'POST', 'action' => 'CommentsReplyController@createReply','files'=>true]) !!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                          <!-- title -->
                            <div class="form-group">
                                {!! Form::label('Body', 'Body:', ['class' => 'col-lg-2 control-label']) !!}
                                
                                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>1]) !!}
                                </div>
                             <div class="form-group">
                         
                            {!! Form::submit('Reply', ['class' => 'btn btn-lg btn-info '] ) !!}
                       
                    </div>

                    {!! Form::close()  !!}


                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
                @endforeach
                @endif

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        
                    </div>
                </div>

@endsection
