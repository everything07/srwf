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

</body>
</x-app-layout>
</html>