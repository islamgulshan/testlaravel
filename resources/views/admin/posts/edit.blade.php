@extends('layouts.admin')

@section('content') 

<h2>Edit Post</h2>


{!! Form::model($post,['method' => 'Patch', 'action' => ['AdminPostController@update',$post->id],'files'=>true]) !!}
    
    <fieldset>
      <!-- title -->
        <div class="form-group">
            {!! Form::label('title', 'title:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
            </div>
        </div>


        <!-- Category -->
        <div class="form-group">
            {!! Form::label('category_id', 'Category:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('category_id',[''=>'Select Category']+$Category ,null, ['class' => 'form-control']) !!}
            </div>
        </div>


               <!-- Category -->
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::file('photo_id', ['class' => 'form-control']) !!}
                
            </div>
        </div>




        <!-- Description -->
        <div class="form-group">
            {!! Form::label('body', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::textarea('body',null, ['class' => 'form-control','rows'=>5]) !!}
            </div>
        </div>

         <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>

       

 
    </fieldset>
 
 {!! Form::close()  !!}



{!! Form::open(['method' => 'Delete', 'action' => ['AdminPostController@destroy',$post->id],'files'=>true]) !!}



  <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Delete', ['class' => 'btn btn-lg btn-danger pull-right'] ) !!}
            </div>
        </div>


{!! Form::close()  !!}
 


 <div class="row">
     @include('includes.form_error')
 </div>

@endsection 
