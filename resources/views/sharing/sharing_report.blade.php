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
                乗務日記　投稿作成
            </h1>
            <form action="/crewing_diary/confirm" method="POST">
                @csrf
            
                <label>役職</label>
                <select name="post[job_title]"> 
                    <option value="">選択してください</option>
                    <option value="運転士">運転士</option>
                    <option value="車掌">車掌</option>
                    <option value="駅係員">駅係員</option>
                </select><br>
                <label>天気</label>
                <select name="post[weather]">
                    <option value="">選択してください</option>
                    <option value="晴れ">晴れ</option>
                    <option value="曇り">曇り</option>
                    <option value="雨">雨</option>
                    <option value="雪">雪</option>
                </select><br>
                <label>時間帯</label>
                <select name="post[time_period]">
                    <option value="">選択してください</option>
                    <option value="早朝">早朝</option>
                    <option value="朝ラッシュ">朝ラッシュ</option>
                    <option value="オフピーク">オフピーク</option>
                    <option value="夕ラッシュ">夕ラッシュ</option>
                    <option value="深夜">深夜</option>
                    <option value="休日">休日</option>
                    <option value="臨時">臨時</option>
                </select><br>
                <label>タイトル</label>
                <input type="text" name="post[title]"><br>
                <label>本文</label>
                <textarea rows="10" cols="33" name="post[body]"></textarea><br>
                <label>タグ</label>
                <input type="text" name="tags"><br>
            
                <input type="submit" value="投稿内容確認"/>
            
            </form> 
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>