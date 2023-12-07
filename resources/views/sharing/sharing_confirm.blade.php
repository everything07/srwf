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
                <p>社員番号:</p>
                <p>名前:</p>
                <p>役職：</p>
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
            <h1>
                乗務日記　投稿作成
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
                <!--いいね-->
               <input type="hidden" name="post[sympathy]" value="{{$inputs['post']['sympathy']}}"><br>
                
                <input type="submit" value="投稿">
                
            </form>
        </div>
    </main>
</body>
</x-app-layout>
</html>