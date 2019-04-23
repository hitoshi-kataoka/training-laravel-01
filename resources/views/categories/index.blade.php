@extends('layouts.app')
@section('title','カテゴリ一覧')
{{ link_to_route('items.index', '商品一覧を見る', ['class' => 'btn btn-info']) }}
@section('content')


    <div class="target">鎖骨</div>
    <script type="text/javascript">
        $(document).snowfall({
            flakeCount : 100,  //要素の数
            minSize : 5,       //最大の大きさ
            maxSize : 10,      //最小の大きさ
            round : true       //丸みを持たせる
        });;
        var input = [];
        konami = [83,65,75,79,84,85];

        $(window).keyup(function(e){
            input.push(e.keyCode);

            if (input.toString().indexOf(konami) >= 0)
            {
                alert("鎖骨コマンド発動！");
                $("div#target").css("fontSize","700%")
                input = [];
            }

        });
        $(function(){
            $('.target')
                .jrumble({ x:8, y:8, rotation:4 })
                .hover(function(){
                    $(this).trigger('startRumble');
                }, function(){
                    $(this).trigger('stopRumble');
                });
        });
    </script>
    {{ link_to_route('categories.create', '新規登録',[], ['class' => 'btn btn-primary'])}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>カテゴリー名</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ link_to_route('categories.show', $category->id, ['category' => $category->id]) }}</td>
                <td>{{$category->name}}</td>
                <td>{{ link_to_route('categories.edit', '編集', ['id' => $category->id], ['class' => 'btn btn-info']) }}</td>
                <td>
                    {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) }}
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
        $(function () {
            $(".btn-dell").click(function () {
                if (confirm("本当に削除しますか？")) {
                } else {
                    return false;
                }
            });
        });

        function scrollToTop() {
            scrollTo(0, 0);
        }
    </script>
@endsection
