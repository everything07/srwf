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
        <div class="card mt-4">
            <div class="card-body">
                <div class="m-5">
                    <h2 class="card-title border-bottom fs-3">{{$crewingdiary->title}}</h2>
                    <div class="row justify-content-end fs-5 mt-3">
                        <p class="card-text border-bottom col-md-auto">役職：{{$crewingdiary->job_title}}</p>
                        <p class="card-text border-bottom col-md-auto">天気：{{$crewingdiary->weather}}</p>
                        <p class="card-text border-bottom col-md-auto">時間帯：{{$crewingdiary->time_period}}</p>
                    </div>
                    <div class="mt-5">
                        <p class="card-text fs-5 mt-2">{!! nl2br($crewingdiary->body)!!}</p>
                    </div>
                    <div class="mt-5">
                        <div class="row">
                        @foreach($crewingdiary->tags as $tag)
                            <p class="col-md-auto me-2">
                                #{{$tag->tag}}
                            </p>
                        @endforeach
                        </div>
                    </div>
                    <div class="mt-3">
                        <lavel class="card-text">共感：{{$crewingdiary->likesCount($crewingdiary->id)}}</lavel>
                    </div>
                    <div class="text-end mt-4">
                        <a class="btn btn-outline-warning" href="/crewing_diary/editRepost/{{$crewingdiary->id}}">編集・再投稿</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end m-3">
            <a class="btn btn-outline-primary" href="/">トップへ</a>
            <a class="btn btn-outline-primary ms-3" href="/crewing_diary/list">戻る</a>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>