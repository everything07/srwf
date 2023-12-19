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
            <h1>
                乗務日記　投稿確認
            </h1>
            <form action="/crewing_diary/repost/{{$crewingdiary->id}}" method="POST">
                @method('PUT')
                @csrf
                
                <input type="hidden" name="post[id]" value="{{ session('reconfirm_data.post.id') }}">
                
                <label>役職</label>
                {{ session('reconfirm_data.post.job_title') }}
                <input type="hidden" name="post[job_title]" value="{{ session('reconfirm_data.post.job_title') }}"><br>
                
                <label>天気</label>
                {{ session('reconfirm_data.post.weather') }}
                <input type="hidden" name="post[weather]" value="{{ session('reconfirm_data.post.weather') }}"><br>
                
                <label>時間帯</label>
                {{ session('reconfirm_data.post.time_period') }}
                <input type="hidden" name="post[time_period]" value="{{ session('reconfirm_data.post.time_period') }}"><br>
                
                <label>タイトル</label>
                {{ session('reconfirm_data.post.title') }}
                <input type="hidden" name="post[title]" value="{{ session('reconfirm_data.post.title') }}"><br>
                
                <label>本文</label>
                {{ session('reconfirm_data.post.body') }}
                <input type="hidden" name="post[body]" value="{{ session('reconfirm_data.post.body') }}"><br>
                
                <label>タグ</label>
                {{ session('reconfirm_data.tags') }}
                <input type="hidden" name="tags" value="{{ session('reconfirm_data.tags') }}"><br>
                <br>
                
                <input type="submit" value="投稿">
                
            </form>
        </div>
    </main>
</body>
</x-app-layout>
</html>