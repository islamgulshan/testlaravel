@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone.min.css" integrity="sha512-WvVX1YO12zmsvTpUQV8s7ZU98DnkaAokcciMZJfnNWyNzm7//QRV61t4aEr0WdIa4pe854QHLTV302vH92FSMw==" crossorigin="anonymous" />
@endsection


@section('content') 



<h2>Upload Media</h2>

{!! Form::open(['method' => 'Post', 'action' => 'MediaController@store','class'=>'dropzone','files'=>true]) !!}
 
    <fieldset>
 
    


 
    </fieldset>
 
 {!! Form::close()  !!}

@endsection 

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone-amd-module.min.js"></script>

@endsection
