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
            <h1>列車遅延報告</h1>
                <div>
                    <!--検索機能-->
                </div>
                <div>
                    <div>
                        <lavel>社員番号</lavel>
                        <p>{{$deferredrecord['employee_number']}}</p>
                        <lavel>名前</lavel>
                        <p>マック太郎</p>
                        <lavel>仕業</lavel>
                        <p>{{$deferredrecord['job_number']}}</p>
                    </div>
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
                        <tr>
                            <th>{{$deferredrecord['train_number']}}</th>
                            <th>{{$deferredrecord['cars_number']}}</th>
                            <th>{{$deferredrecord['sina_departure_minute']}}:{{$deferredrecord['sina_departure_second']}}</th>
                            <th>{{$deferredrecord['sina_arrival_minute']}}:{{$deferredrecord['sina_arrival_second']}}</th>
                            <th>{{$deferredrecord['tokyo_departure_minute']}}:{{$deferredrecord['tokyo_departure_second']}}</th>
                            <th>{{$deferredrecord['tokyo_arrival_minute']}}:{{$deferredrecord['tokyo_arrival_second']}}</th>
                            <th>{{$deferredrecord['ueno_departure_minute']}}:{{$deferredrecord['ueno_departure_second']}}</th>
                            <th>{{$deferredrecord['ueno_arrival_minute']}}:{{$deferredrecord['ueno_arrival_second']}}</th>
                            <th>{{$deferredrecord['ikebukuro_departure_minute']}}:{{$deferredrecord['ikebukuro_departure_second']}}</th>
                            <th>{{$deferredrecord['ikebukuro_arrival_minute']}}:{{$deferredrecord['ikebukuro_arrival_second']}}</th>
                            <th>{{$deferredrecord['sinjuku_departure_minute']}}:{{$deferredrecord['sinjuku_departure_second']}}</th>
                            <th>{{$deferredrecord['sinjuku_arrival_minute']}}:{{$deferredrecord['sinjuku_arrival_second']}}</th>
                            <th>{{$deferredrecord['osaki_departure_minute']}}:{{$deferredrecord['osaki_departure_second']}}</th>
                            <th>{{$deferredrecord['osaki_arrival_minute']}}:{{$deferredrecord['osaki_arrival_second']}}</th>
                        </tr>
                    </table>
                    <div>
                        <lavel>事由</lavel><br>
                        <p>@foreach($deferredrecord->occurrencereason as $occurrencereason)
                            {{$occurrencereason->occurrence_reason}}
                        @endforeach
                        </p>
                        
                        <lavel>備考</lavel>
                        <p>{{$deferredrecord['remarks']}}</p>
                    </div>
                </div>
        </div>
    </main>
</body>
</html>