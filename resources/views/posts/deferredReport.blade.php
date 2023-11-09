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
            <h2>一覧</h2>
            <div>
                <a href="/deferred">列車遅延報告書</a>
                <a href="#">乗務報告書</a>
                <a href="#">発光信号動作報告書</a>
                <a href="#">非常ブレーキ動作報告書</a>
                <a href="#">乗務のヒント</a>
            </div>
        </div>
    </saide>
    <main>
        <div>
            <h1>列車遅延報告書</h1>
            <form action="/posts" method="POST">
                @csrf
                 <div>
                     <label>列車番号</label>
                     <input type="text" name="post[trainNumber]"><br>
                     <label>車両番号</label>
                     <input type="text" name="post[carsNumber]"><br>
                     <label>仕業</label>
                     <input type="text" name="post[jobNumber]"><br>
                     <p>名前</p>
                     <input type="number" name="post[enpoyeeNumber]" value="3033"><br>
                </div>
                <div>
                    <p>遅延時間の報告の仕方</p>
                    <p>例）３０秒延→３０、１分３０秒→１３０、１０分延→１０００</p>
                    <p>６０分以上の場合は時間に換算し、１時間２０分延の場合は１２０００とすること</p>
                    
                    @foreach($stations as $key => $station)
                        <label for="{{ $key }}Arrival"> {{ $station }} 着・発</label>
                        <input type="text" name="post[{{ $key }}Arrival]">
                        <input type="text" name="post[{{ $key }}Departure]"><br>
                    @endforeach
                    <label for="occurrenceReasons">事由</label>
                    <input type="checkbox" name="post[occurrenceReasons]" value="折り返し遅れ">折り返し遅れ
                    <input type="checkbox" name="post[occurrenceReasons]" value="多客"> 多客
                    <input type="checkbox" name="post[occurrenceReasons]" value="接続・待合せ遅れ"> 接続・待ち合わせ遅れ
                    <input type="checkbox" name="post[occurrenceReasons]" value="車両点検"> 車両点検<br>

                    <label for="remarks">備考</label>
                    <textarea name="post[remarks]" rows="4"></textarea><br>
                </div>
                <input type="submit" value="報告"/>
            </form>
           
        </div>
    </main>
</body>
</html>