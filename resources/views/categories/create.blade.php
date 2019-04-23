@extends('layouts.app')
@section('title',"カテゴリー登録")
@section('content')
    <div class="container">
        {!! Form::open(array('url' => route('categories.store'))) !!}
        <div class="form-group">
            {{ Form::label('name', 'カテゴリー名：') }}
            {{ Form::text('name', null, ['class' => 'form-control','placeholder'=>"青木＝ぷり＝鎖骨",'required'=>"required"]) }}
        </div>
        <div class="form-group">
            {{ Form::submit('登録', ['class' => 'btn btn-primary form-control']) }}
        </div>
        {!! Form::close() !!}
    </div>
@endsection