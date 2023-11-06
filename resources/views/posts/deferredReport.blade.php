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
                <a href="#">列車遅延報告書</a>
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
                    @foreach($stations as $key => $station)
                        <label for="{{ $key }}Arrival"> {{ $station }} 着・発</label>
                        <input type="text" name="post[{{ $key }}ArrivalTime]" placeholder="MM:SS" pattern="([0-5][0-9]):[0-5][0-9]" >
                        <input type="text" name="post[{{ $key }}DepartureTime]" placeholder="MM:SS" pattern="([0-5][0-9]):[0-5][0-9]" ><br>
                    @endforeach
                    <label for="occurrenceReasons">事由</label>
                    <input type="checkbox" name="post[occurrenceReasons]" value="1">折り返し遅れ
                    <input type="checkbox" name="post[occurrenceReasons]" value="2"> 多客
                    <input type="checkbox" name="post[occurrenceReasons]" value="3"> 接続・待ち合わせ遅れ
                    <input type="checkbox" name="post[occurrenceReasons]" value="4"> 車両点検<br>

                    <label for="remarks">備考</label>
                    <textarea name="post[remarks]" rows="4" required></textarea><br>
                </div>
                <input type="submit" value="報告"/>
            </form>
           
        </div>
    </main>
</body>
</html>