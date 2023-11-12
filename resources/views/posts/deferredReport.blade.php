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
                     <input type="text" name="post[train_number]"><br>
                     <label>車両番号</label>
                     <input type="text" name="post[cars_number]"><br>
                     <label>仕業</label>
                     <input type="text" name="post[job_number]"><br>
                     <p>名前</p>
                     <input type="int" name="post[employee_number]" value=3003><br>
                </div>
                <div>
                    <p>遅延時間の報告の仕方</p>
                    <p>(MM)分で入力すること→例）　１２０</p>
                    <p>秒数は選択式です</p>
                    
                    @foreach($stations as $key => $station)
                        <label> {{ $station }} 着・発</label>
                        <input type="int" name="post[{{ $key }}_arrival_minute]">
                        <select name="post[{{$key}}_arrival_second]">
                            <option value="00">00</option>
                            <option value="00">30</option>
                        </select>
                        <input type="int" name="post[{{ $key }}_departure_minute]">
                        <select name="post[{{$key}}_departure_second]">
                            <option value="00">00</option>
                            <option value="30">30</option>
                        </select><br>
                    @endforeach
                    <label>事由</label>
                    @foreach($occurrence_reasons as $occurrence_reason)
                        <lavel>
                            <input type="checkbox" name="reasons_array[]" value="{{ $occurrence_reason->id}}">
                                {{$occurrence_reason->occurrence_reason}}
                            </input><br>
                        </lavel>
                    @endforeach
                    <label for="remarks">備考</label>
                    <textarea name="post[remarks]" rows="4"></textarea><br>
                </div>
                <input type="submit" value="報告"/>
            </form>
           
        </div>
    </main>
</body>
</html>