@extends('layouts.admin')

@section('content') 

<h2>Update User</h2>

{!! Form::model($user,['method' => 'PATCH', 'action' =>[ 'AdminUsersController@update',$user->id],'files'=>true]) !!}

<div class="col-sm-3">
    <img class="img img-responsive img-rounded" src="{{url($user->photo?$user->photo->file:'./images/default_400.png')}}"/>
</div>

<div class="col-sm-9">

    <fieldset>
 
  <!-- Name -->
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>
    </div>


    <!-- Email -->
    <div class="form-group">
        {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
        </div>
    </div>

    <!-- Role -->
    <div class="form-group">
        {!! Form::label('role_id', 'Role:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::select('role_id',[''=>'Choose Role']+$roles ,null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Status -->
    <div class="form-group">
        {!! Form::label('is_active', 'Status:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),null, ['class' => 'form-control']) !!}
        </div>
    </div>


     <!-- password -->
    <div class="form-group">
        {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>


    <!--pictor -->
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::file('photo_id', ['class' => 'form-control']) !!}
        </div>
    </div>




     <!-- Submit Button -->
    <div class="form-group">
        <div class="col-lg-6 col-lg-offset-2">
            {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
        </div>
    </div>

       

 
</fieldset>
 
{!! Form::close()  !!}


{!! Form::open(['method' => 'Delete', 'action' =>[ 'AdminUsersController@destroy',$user->id],'files'=>true]) !!}

 <!-- Submit Button -->
    <div class="form-group">
        <div class="col-lg-6 col-lg-offset-2">
            {!! Form::submit('Delete', ['class' => 'btn btn-lg btn-danger pull-right'] ) !!}
        </div>
    </div>

{!! Form::close()  !!}

@include('includes.form_error')

@endsection 
