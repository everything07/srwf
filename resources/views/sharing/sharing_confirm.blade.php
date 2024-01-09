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
        <h2 class="fs-4 mt-4">報告内容</h2>
        <div class="row ">
            <div class="col-2">
                <div class="list-group">
                    <a href="/deferred/table" class="btn btn-outline-primary mt-2">遅延報告</a>
                    <a href="/crewing_diary/list" class="btn btn-outline-primary mt-2">乗務日記</a>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div>
            <h1>
                乗務日記　投稿確認
            </h1>
            <form action="/crewing_diary/post" method="POST">
                @csrf
                
                <label>役職</label>
                {{$inputs['post']['job_title'] }}
                <input type="hidden" name="post[job_title]" value="{{$inputs['post']['job_title'] }}"><br>
                <br>
                <label>天気</label>
                 {{$inputs['post']['weather']}}
                <input type="hidden" name="post[weather]" value="{{$inputs['post']['weather']}}"><br>
                <br>
                <label>時間帯</label>
                 {{$inputs['post']['time_period']}}
                <input type="hidden" name="post[time_period]" value="{{$inputs['post']['time_period']}}"><br>
                <br>
                <label>タイトル</label>
                 {{$inputs['post']['title']}}
                <input type="hidden" name="post[title]" value="{{$inputs['post']['title']}}"><br>
                <br>
                <label>本文</label>
                 {{$inputs['post']['body']}}
                <input type="hidden" name="post[body]" value="{{$inputs['post']['body']}}"><br>
                <br>
                <label>タグ</label>
                 {{$inputs['tags']}}
                <input type="hidden" name="tags" value="{{$inputs['tags']}}"><br>
                <br>
                
                <input type="submit" value="投稿">
                
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>