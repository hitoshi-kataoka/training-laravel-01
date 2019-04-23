@extends('layouts.app')
@section('title',"商品登録")
@section('content')
    <div class="container">
        {!! Form::open(array('url' => route('items.store'))) !!}
        <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
            @foreach ($errors->get('name') as $message)
            {{$message}}
            @endforeach
            <div class="form-group">
            {{ Form::label('name', '商品名：') }}
            {{ Form::text('name', null, ['class' => 'form-control','placeholder'=>"青木＝ぷり＝鎖骨"]) }}
        </div>
        </div>
        <div class="form-group">
            {{ Form::submit('登録', ['class' => 'btn btn-primary form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('category_id','カテゴリー：')}}
            {{ Form::select('category_id',$categories,null, ['class' => 'form-control']) }}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('script')

@endsection