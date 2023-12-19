<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
<body>
    <header>
        <div>
            <h1>業務支援サイト</h1>
            <p>SmertRailWorkFrea</p>
        </div>
        <div>
            <div>
                <p>社員番号:{{Auth::user()->employee_number }}</p>
                <p>名前:{{Auth::user()->name }}</p>
                <p>役職：{{Auth::user()->job_title }}</p>
            </div>
            <div>
                <p>{{date('Y-m-d H:i:s') }}</p>
            </div>
        </div>
    </header>
    <saide>
        <div>
            <h2>報告書</h2>
            <div>
                <a href="/deferred/Report">列車遅延報告書</a>
                <a href="#">乗務報告書</a>
                <a href="#">発光信号動作報告書</a>
                <a href="#">非常ブレーキ動作報告書</a>
                <a href="/crewing_diary">乗務日記</a>
            </div>
        </div>
    </saide>
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