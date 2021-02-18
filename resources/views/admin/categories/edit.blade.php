@extends('layouts.admin')

@section('content') 

<h2>Edit Category</h2>


{!! Form::model($Category,['method' => 'Patch', 'action' => ['CategoiresController@update',$Category->id],'files'=>true]) !!}
    
    <fieldset>
      <!-- title -->
        <div class="form-group">
            {!! Form::label('title', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
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



{!! Form::open(['method' => 'Delete', 'action' => ['CategoiresController@destroy',$Category->id],'files'=>true]) !!}



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
