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
                <a href="#">乗務のヒント</a>
            </div>
        </div>
    </saide>
    <main>
        <div>
            <h1>列車遅延報告 一覧</h1>
                <div>
                    <!--検索機能-->
                </div>
                <div>
                    <table>
                        <tr>
                            <th>列番</th><th>車号</th>
                            <th>品着</th><th>品発</th>
                            <th>東着</th><th>東発</th>
                            <th>上着</th><th>上発</th>
                            <th>池着</th><th>池発</th>
                            <th>新着</th><th>新発</th>
                            <th>大着</th><th>大発</th>
                        </tr>
                        @foreach($deferred_records as $deferred_record)
                        <tr>
                            <th><a href="{{ url('deferred/detail', $deferred_record->id) }}">{{ $deferred_record->train_number }}</a>
</th>
                            <th>{{$deferred_record['cars_number']}}</th>
                            <th>{{$deferred_record['sina_departure_minute']}}:{{$deferred_record['sina_departure_second']}}</th>
                            <th>{{$deferred_record['sina_arrival_minute']}}:{{$deferred_record['sina_arrival_second']}}</th>
                            <th>{{$deferred_record['tokyo_departure_minute']}}:{{$deferred_record['tokyo_departure_second']}}</th>
                            <th>{{$deferred_record['tokyo_arrival_minute']}}:{{$deferred_record['tokyo_arrival_second']}}</th>
                            <th>{{$deferred_record['ueno_departure_minute']}}:{{$deferred_record['ueno_departure_second']}}</th>
                            <th>{{$deferred_record['ueno_arrival_minute']}}:{{$deferred_record['ueno_arrival_second']}}</th>
                            <th>{{$deferred_record['ikebukuro_departure_minute']}}:{{$deferred_record['ikebukuro_departure_second']}}</th>
                            <th>{{$deferred_record['ikebukuro_arrival_minute']}}:{{$deferred_record['ikebukuro_arrival_second']}}</th>
                            <th>{{$deferred_record['sinjuku_departure_minute']}}:{{$deferred_record['sinjuku_departure_second']}}</th>
                            <th>{{$deferred_record['sinjuku_arrival_minute']}}:{{$deferred_record['sinjuku_arrival_second']}}</th>
                            <th>{{$deferred_record['osaki_departure_minute']}}:{{$deferred_record['osaki_departure_second']}}</th>
                            <th>{{$deferred_record['osaki_arrival_minute']}}:{{$deferred_record['osaki_arrival_second']}}</th>
                           
                        </tr>
                        @endforeach
                    </table>
                </div>
        </div>
    </main>
</body>
</html>