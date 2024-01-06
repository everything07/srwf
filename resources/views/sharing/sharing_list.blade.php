<html lang="ja">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
<body>
    <header>
        <div>
            <a href="/">
                <h1 class="col-2">業務支援サイト</h1>
                <p class="col-2">SmertRailWorkFrea</p>
            </a>
        </div>
        <div>
            <div class="container text-center">
                <div class="row justify-content-end">
                    <p class="col-2">役職：{{Auth::user()->job_title }}</p>
                    <p class="col-2">社員番号:{{Auth::user()->employee_number }}</p>
                    <p class="col-2">名前:{{Auth::user()->name }}</p>
                    <p class="col-2">{{date('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        </div>
    </header>
    </x-slot>
    <saide>
        <div>
            <h2 style="font-size: 18px;">報告書</h2>
            <div class="container text-center">
                <div class="row justify-content-end">
                    <a href="/deferred/Report" class="col-2 nav-link">列車遅延報告書</a>
                    <a href="#" class="col-2 nav-link">乗務報告書</a>
                    <a href="#" class="col-2 nav-link">発光信号動作報告書</a>
                    <a href="#" class="col-2 nav-link">非常ブレーキ動作報告書</a>
                    <a href="/crewing_diary" class="col-2 nav-link">乗務日記</a>
                </div>
            </div>
        </div>
    </saide>
    <div>
        <h2>報告内容</h2>
            <div class="list-group">
                <a href="/deferred/table" class="col-2 btn btn-outline-primary">遅延報告</a>
                <a href="/crewing_diary/list" class="col-2 btn btn-outline-primary">乗務日記</a>
            </div>
    </div>
    <main>
        <div>
            <h1>乗務日記 一覧</h1>
            <div>
                <!--検索機能-->
                <form>
                    <lavel>検索ワード</lavel>
                    <input tyoe="texit" name="word">
                    <lavel>完全一致のみ表示</lavel>
                    <input type="checkbox" name="condition" value=1 ><br>
                    <lavel>検索範囲を絞る</lavel><br>
                    @foreach($columnNames as $key => $columnName)
                    <lavel>{{$columnName}}</lavel>
                    <input type="checkbox" name=columns[{{$key}}] value={{$key}} >&nbsp;&nbsp;&nbsp;
                    @endforeach
                    <lavel>タグ</lavel>
                    <input type="checkbox" name="selectedTag" value=1>
                    <br>
                    <input type="submit" value="検索" >
                </form>
            </div>
            <div>
                <br>
                <h1>乗務日記</h1>
                <br>
                <div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <br>
                <br>
                <div>
                    @foreach($crewingdiarys as $crewingdiary)
                    <div>
                        <h2><a href="/crewing_diary/detail/{{$crewingdiary->id}}" >タイトル：{{$crewingdiary->title}}</a></h2>
                        <div>
                            <p>役職：{{$crewingdiary->job_title}}</p>
                            <p>天気：{{$crewingdiary->weather}}</p>
                            <p>時間帯：{{$crewingdiary->time_period}}</p>
                        </div>
                        <div>
                           <p>本文：{!! nl2br( mb_strimwidth($crewingdiary->body, 0, 100, "...") )!!}</p>
                        </div>
                        <div>
                            <p>タグ：
                            
                            @foreach($crewingdiary->tags as $tag)
                            {{$tag->tag}}
                            @endforeach
                            </p>
                        </div>
                        <div>
                            <lavel>共感:{{$crewingdiary->likesCount($crewingdiary->id)}}</lavel>
                            @if($crewingdiary->isLikedByUser(Auth::id()))
                                <form action="/crewing_diary/toggleLike/{{ $crewingdiary->id }}" method="post">
                                    @csrf
                                    <button type="submit">いいね解除</button>
                                </form>
                            @else
                                <form action="/crewing_diary/toggleLike/{{ $crewingdiary->id }}" method="post">
                                    @csrf
                                    <button type="submit">いいね</button>
                                </form>

                            @endif
                            
                        </div>
                        <div>
                            @if( $crewingdiary->user_id == Auth::user()->id )
                                <form action="/crewing_diary/delete/{{ $crewingdiary->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">削除</button>
                                </form>
                            @else
                                <form action="/crewing_diary/deletingOrder/{{ $crewingdiary->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">削除依頼</button>
                                </form>
                            @endif
                            
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
            <div class='paginate'>
                {{ $crewingdiarys->links() }}
            </div>
        </div>
           <a href="/">トップへ</a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>