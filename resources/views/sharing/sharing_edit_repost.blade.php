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
    <main class="container mt-4">
        <div class="card border-info mb-3 mx-auto p-4">
            <h1 class="card-header text-center fs-4 my-4">
                乗務日記　編集
            </h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        <form action="/crewing_diary/reconfirm/{{$crewingdiary->id}}" method="POST">
                @csrf
                
                <input type="hidden" name="post[id]" value="{{$crewingdiary->id}}">
                <div class="row justify-content-center">
                    <label class="form-label col-md-auto fs-5 mt-3">役職</label>
                    <div class="col-auto mt-3">
                        <select class="form-select" name="post[job_title]"> 
                            <option value="{{$crewingdiary->job_title}}">{{$crewingdiary->job_title}}</option>
                            <option value="運転士" {{ old('post.job_title') == '運転士' ? 'selected' : '' }}>運転士</option>
                            <option value="車掌" {{ old('post.job_title') == '車掌' ? 'selected' : '' }}>車掌</option>
                            <option value="駅係員" {{ old('post.job_title') == '駅係員' ? 'selected' : '' }}>駅係員</option>
                        </select>
                    </div>
                    <label class="form-label col-md-auto fs-5 ms-4 mt-3">天気</label>
                    <div class="col-auto mt-3">
                        <select class="form-select" name="post[weather]">
                            <option value="{{$crewingdiary->weather}}">{{$crewingdiary->weather}}</option>
                            <option value="晴れ" {{ old('post.weather') == '晴れ' ? 'selected' : '' }}>晴れ</option>
                            <option value="曇り" {{ old('post.weather') == '曇り' ? 'selected' : '' }}>曇り</option>
                            <option value="雨" {{ old('post.weather') == '雨' ? 'selected' : '' }}>雨</option>
                            <option value="雪" {{ old('post.weather') == '雪' ? 'selected' : '' }}>雪</option>
                        </select>
                    </div>
                <label class="form-label col-md-auto fs-5 ms-4 mt-3">時間帯</label>
                <div class="col-auto mt-3">
                        <select class="form-select" name="post[time_period]">
                            <option value="{{$crewingdiary->time_period}}">{{$crewingdiary->time_period}}</option>
                            <option value="早朝" {{ old('post.time_period') == '早朝' ? 'selected' : '' }}>早朝</option>
                            <option value="朝ラッシュ" {{ old('post.time_period') == '朝ラッシュ' ? 'selected' : '' }}>朝ラッシュ</option>
                            <option value="オフピーク" {{ old('post.time_period') == 'オフピーク' ? 'selected' : '' }}>オフピーク</option>
                            <option value="夕ラッシュ" {{ old('post.time_period') == '夕ラッシュ' ? 'selected' : '' }}>夕ラッシュ</option>
                            <option value="深夜" {{ old('post.time_period') == '深夜' ? 'selected' : '' }}>深夜</option>
                            <option value="休日" {{ old('post.time_period') == '休日' ? 'selected' : '' }}>休日</option>
                            <option value="臨時" {{ old('post.time_period') == '臨時' ? 'selected' : '' }}>臨時</option>
                        </select>
                    </div>
                </div>
                <label class="form-label fs-5 mt-3">タイトル</label>
                <input class="form-control my-2" type="text" name="post[title]" value="{{$crewingdiary->title}}">
                <label class="form-label fs-5 mt-3">本文</label>
                <textarea class="form-control my-2" rows="10" cols="33" name="post[body]">{{$crewingdiary->body}}</textarea><br>
                <label class="form-label fs-5 mt-3">タグ</label>
                <input class="form-control my-2" type="text" name="tags" value="{{$tagsAsString}}">
            <div class="row justify-content-end mt-4">
                <input class="btn btn-outline-primary btn-lg col-md-auto me-5"type="submit" value="編集・再投稿"/>
            </div>
            </form> 
        </div>
        <div class="text-end m-3">
            <a class="btn btn-outline-primary" href="/">トップへ</a>
            <a class="btn btn-outline-primary ms-3" href="/crewing_diary/detail/{{$crewingdiary->id}}">戻る</a>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>