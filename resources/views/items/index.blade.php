@extends('layouts.app')
@section('title','商品一覧')
{{ link_to_route('categories.index', 'カテゴリ一覧を見る') }}
@section('content')
    <div id="target">プリクラ</div>
    <script type="text/javascript">
        $(document).snowfall({
            flakeCount : 100,  //要素の数
            minSize : 5,       //最大の大きさ
            maxSize : 10,      //最小の大きさ
            round : true       //丸みを持たせる
        });
        $(document).snowfall();
        var input = [];
            konami = [83,65,75,79,84,85];

            $(window).keyup(function(e) {
                input.push(e.keyCode);

                if (input.toString().indexOf(konami) >= 0) {
                    alert("青木コマンド発動！");
                    $("div#target").css("fontSize", "500%");
                    input = [];
                }

                });
        $(function () {
            $('#target')
                .jrumble({x: 8, y: 8, rotation: 4})
                .hover(function () {
                    $(this).trigger('startRumble');
                }, function () {
                    $(this).trigger('stopRumble');
                });
            })
    </script>
    {{ link_to_route('items.create', '新規登録', [], ['class' => 'btn btn-primary']) }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>カテゴリー</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ link_to_route('items.show', $item->id, ['item' => $item->id]) }}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{ link_to_route('items.edit', '編集', ['id' => $item->id], ['class' => 'btn btn-info']) }}</td>
                <td>
                    {{ Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-danger btn-dell']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
    <footer>
        <a class="btn" onclick="scrollToTop()">トップに戻る</a>
    </footer>
@endsection
@section('script')
    <script>
        $(function(){
            $(".btn-dell").click(function(){
                if(confirm("本当に削除しますか？")){
                }else{
                    return false;
                }
            });
        });
    </script>
@endsection
