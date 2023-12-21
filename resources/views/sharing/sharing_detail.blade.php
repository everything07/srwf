<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<x-app-layout>
<body>
    <header>
        <div>
            <h1>業務支援サイト</h1>
            <p>SmertRailWorkFrea</p>
        </div>
        <div>
            <div class="container text-center">
                <div class="row row-cols-auto">
                    <p class="col-md-auto">役職：{{Auth::user()->job_title }}</p>
                    <p class="col-md-auto">社員番号:{{Auth::user()->employee_number }}</p>
                    <p class="col-md-auto">名前:{{Auth::user()->name }}</p>
                    <p class="col-md-auto">{{date('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        </div>
    </header>
    <saide>
        <div>
            <h2>報告書</h2>
            <div class="container text-center">
                <div class="row row-cols-auto">
                    <a href="/deferred/Report" class="nav-link">列車遅延報告書</a>
                    <a href="#" class="nav-link">乗務報告書</a>
                    <a href="#" class="nav-link">発光信号動作報告書</a>
                    <a href="#" class="nav-link">非常ブレーキ動作報告書</a>
                    <a href="/crewing_diary" class="nav-link">乗務日記</a>
                </div>
            </div>
        </div>
    </saide>
    <div>
        <h2>報告内容</h2>
            <div>
                <a href="/deferred/table" class="nav-link">遅延報告</a>
                <a href="/crewing_diary/list" class="nav-link">乗務日記</a>
            </div>
    </div>
    <main>
        <div>
            <h2>タイトル：{{$crewingdiary->title}}</h2>  
        <div>
            <p>役職：{{$crewingdiary->job_title}}</p>
            <p>天気：{{$crewingdiary->weather}}</p>
            <p>時間帯：{{$crewingdiary->time_period}}</p>
        </div>
        <div>
            <p>本文：{!! nl2br($crewingdiary->body)!!}</p>
            </div>
            <div>
                <p>タグ：
                    @foreach($crewingdiary->tags as $tag)
                        #{{$tag->tag}}
                    @endforeach
                </p>
            </div>
            <div>
                <lavel>共感:{{$crewingdiary->likesCount($crewingdiary->id)}}</lavel><br>
                <br>
            </div>
            <div>
                <a href="/">トップへ</a><br>
                <a href="/crewing_diary/list">戻る</a><br>
                <a href="/crewing_diary/editRepost/{{$crewingdiary->id}}">編集・再投稿</a>
            </div>
        </div>
    </main>
</body>
</x-app-layout>
</html>