<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
            <h1>列車遅延報告 一覧</h1>
            <div>
                <!--検索機能-->
                <form>
                    <label>検索</label>
                    <input type="submit" value="検索" >
                </form>
            </div>
            <div>
                <h1>乗務日記</h1>
                <div>
                    @foreach($crewingdiarys as $crewingdiary)
                    <div>
                        <label>タイトル</label>
                        <h2>{{$crewingdiary->title}}</h2>
                        <div>
                            <label>役職</label>
                            <p>{{$crewingdiary->job_title}}</p>
                            <label>天気</label>
                            <p>{{$crewingdiary->weather}}</p>
                            <label>時間帯</label>
                            <p>{{$crewingdiary->time_period}}</p>
                        </div>
                        <div>
                            <label>本文</label>
                            <p>{{$crewingdiary->body}}</p>
                            
                        </div>
                        <div>
                            <label>タグ</label>
                            <p>
                            @foreach($crewingdiary->tags as $tag)
                            {{$tag->tag}}
                            @endforeach
                            </p>
                        </div>
                        <div>
                            <label>共感</label>
                            <p>{{$crewingdiary->sympathy}}</p>
                            <form>
                                <input type="hidden" name="sympathy" value={{$crewingdiary->sympathy}} ><br> 
                                <input type="submit" value="👍" >
                            </form>
                            <!--<p>{{$crewingdiary->id}}</p>-->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class='paginate'>
                {{ $crewingdiarys->links() }}
            </div>
        </div>
           <a href="/">トップへ</a>
    </main>
</body>
</html>