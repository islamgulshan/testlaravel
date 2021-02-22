@extends('layouts.admin')

@section('content') 

<h2>Create Category</h2>


{!! Form::open(['method' => 'Post', 'action' => 'CategoiresController@store','files'=>true]) !!}
 
    <fieldset>
 
      
      <!-- title -->
        <div class="form-group">
            {!! Form::label('title', 'title:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
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

 <div class="row">
     @include('includes.form_error')
 </div>

@endsection 
