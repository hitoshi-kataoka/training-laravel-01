@extends('layouts.app')
@section('title', 'カテゴリ編集')
@section('content')
    {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) }}
    <div class="form-group">
        {{ Form::label('name', '商品名：') }}
        {{ Form::text('name', $category->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('更新', ['class' => 'btn btn-success btn-edit form-control']) }}
    </div>
    {{ Form::close() }}
@endsection
@section('script')
    <script>
        $(function(){
            $(".btn-edit").click(function(){
                if(confirm("本当に編集しますか？")){
                }else{
                    return false;
                }
            });
        });
    </script>
@endsection