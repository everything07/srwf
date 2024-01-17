<!DOCTYPE html>
<html lang="ja">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
<body class="">
    <header>
        <div class="d-flex flex-column">
            <a href="/" class="text-center">
                <h1 class="col-12 col-md-2 font-monospace">業務支援サイト</h1>
                <p class="col-12 col-md-2">SmertRailWorkFrea</p>
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
        <div class="container mt-2">
            <h2 class="fs-3 mt-4">報告書</h2>
            <div class="container text-center">
                <div class="row justify-content-end">
                    <a href="/deferred/Report" class="col-2 nav-link">列車遅延報告書</a>
                    <a href="/not" class="col-2 nav-link">乗務報告書</a>
                    <a href="/not" class="col-2 nav-link">発光信号動作報告書</a>
                    <a href="/not" class="col-2 nav-link">非常ブレーキ動作報告書</a>
                    <a href="/crewing_diary" class="col-2 nav-link">乗務日記</a>
                </div>
            </div>
        </div>
    </saide>
    <div class="container mt-2">
        <h2 class="fs-3 mt-4">報告内容</h2>
        <div class="row ">
            <div class="col-2">
                <div class="list-group">
                    <a href="/deferred/table" class="btn btn-outline-primary mt-2">遅延報告</a>
                    <a href="/crewing_diary/list" class="btn btn-outline-primary mt-2">乗務日記</a>
                </div>
            </div>
        </div>
    </div>
    <main class="container">
        <div>
            <h1 class="text-center fs-3 mt-4">乗務日記 一覧</h1>
            <div class="d-flex justify-content-end my-4">
                <div class="card col-md-auto m-1">
                    <!--検索機能-->
                    <form>
                        <div class="row m-2 align-items-center">
                            <lavel class="form-label col-md-auto">検索ワード</lavel>
                            <div class="col-md-auto">
                                <input class="form-control me-2" type="search" name="word">
                            </div>
                            <div class="dropdown col-md-auto">
                                <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">検索範囲を絞る</button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <lavel class="form-label col-md-auto">完全一致のみ表示</lavel>
                                        <input class="col-md-auto" type="checkbox" name="condition" value=1 >
                                    </li>
                                    @foreach($columnNames as $key => $columnName)
                                    <li>
                                        <lavel class="form-label col-md-auto">{{$columnName}}</lavel>
                                        <input type="checkbox" name=columns[{{$key}}] value={{$key}} >&nbsp;&nbsp;&nbsp;
                                    </li>
                                    @endforeach
                                    <li>
                                        <lavel class="form-label col-md-auto">タグ</lavel>
                                        <input type="checkbox" name="selectedTag" value=1>
                                    </li>
                                </ul>
                            </div>
                        
                            <input class="btn btn-outline-success col-md-auto" type="submit" value="検索" >
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div>
                    @foreach($crewingdiarys as $crewingdiary)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h2 class="card-title fs-3"><a href="/crewing_diary/detail/{{$crewingdiary->id}}" >タイトル：{{$crewingdiary->title}}</a></h2>
                            <div>
                                <p class="card-text mt-2">役職：{{$crewingdiary->job_title}}</p>
                                <p class="card-text mt-2">天気：{{$crewingdiary->weather}}</p>
                                <p class="card-text mt-2">時間帯：{{$crewingdiary->time_period}}</p>
                            </div>
                            <div>
                                <p class="card-text mt-2">本文：{!! nl2br( mb_strimwidth($crewingdiary->body, 0, 50, "...") )!!}</p>
                            </div>
                            <div>
                                <p class="card-text mt-2">タグ：
                                    @foreach($crewingdiary->tags as $tag)
                                    {{$tag->tag}}
                                    @endforeach
                                </p>
                            </div>
                            <div class="mt-2">
                                <lavel class="card-text">共感:{{$crewingdiary->likesCount($crewingdiary->id)}}</lavel>
                                <div class="mt-2">
                                    @if($crewingdiary->isLikedByUser(Auth::id()))
                                        <form action="/crewing_diary/toggleLike/{{ $crewingdiary->id }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-primary" type="submit">いいね解除</button>
                                        </form>
                                    @else
                                        <form action="/crewing_diary/toggleLike/{{ $crewingdiary->id }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-primary" type="submit">いいね</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-end m-3">
                                @if( $crewingdiary->user_id == Auth::user()->id )
                                    <form action="/crewing_diary/delete/{{ $crewingdiary->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-primary" type="submit">削除</button>
                                    </form>
                                @else
                                    <form action="/crewing_diary/deletingOrder/{{ $crewingdiary->id }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-outline-primary" type="submit">削除依頼</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class='paginate'>
                {{ $crewingdiarys->links() }}
            </div>
        </div>
           <a class="btn btn-outline-primary" href="/">トップへ</a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>