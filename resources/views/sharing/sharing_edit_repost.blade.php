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
        <form action="/crewing_diary/reconfirm/{{$crewingdiary->id}}" method="POST">
                @csrf
                
                <input type="hidden" name="post[id]" value="{{$crewingdiary->id}}">
                
                <label>役職</label>
                <select name="post[job_title]"> 
                    <option value="{{$crewingdiary->job_title}}">{{$crewingdiary->job_title}}</option>
                    <option value="運転士">運転士</option>
                    <option value="車掌">車掌</option>
                    <option value="駅係員">駅係員</option>
                </select><br>
                <label>天気</label>
                <select name="post[weather]">
                    <option value="{{$crewingdiary->weather}}">{{$crewingdiary->weather}}</option>
                    <option value="晴れ">晴れ</option>
                    <option value="曇り">曇り</option>
                    <option value="雨">雨</option>
                    <option value="雪">雪</option>
                </select><br>
                <label>時間帯</label>
                <select name="post[time_period]">
                    <option value="{{$crewingdiary->time_period}}">{{$crewingdiary->time_period}}</option>
                    <option value="早朝">早朝</option>
                    <option value="朝ラッシュ">朝ラッシュ</option>
                    <option value="オフピーク">オフピーク</option>
                    <option value="夕ラッシュ">夕ラッシュ</option>
                    <option value="深夜">深夜</option>
                    <option value="休日">休日</option>
                    <option value="臨時">臨時</option>
                </select><br>
                <label>タイトル</label>
                <input type="text" name="post[title]" value="{{$crewingdiary->title}}"><br>
                <label>本文</label>
                <textarea rows="10" cols="33" name="post[body]">{{$crewingdiary->body}}</textarea><br>
                <label>タグ</label>
                <input type="text" name="tags" value="{{$tagsAsString}}"><br>
            
                <input type="submit" value="編集・再投稿"/>
            
            </form> 
            <div>
                <a href="/">トップへ</a><br>
                <a href="/crewing_diary">戻る</a><br>
            </div>
        </div>
    </main>
</body>
</x-app-layout>
</html>