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
    <div>
        <h2>報告内容</h2>
            <div>
                <a href="/deferred/table">遅延報告</a>
                <a href="/crewing_diary/list">乗務日記</a>
            </div>
    </div>
    <main>
        <div>
            <h1>列車遅延報告</h1>
                <div>
                    <!--検索機能-->
                </div>
                <div>
                    <div>
                        <lavel>社員番号__{{$deferred_record['employee_number']}}</lavel><br>
                        <lavel>名前__{{$user_name}}</lavel><br>
                        <lavel>報告日__{{$deferred_record['report_date']}}</lavel><br>
                        <lavel>仕業__{{$deferred_record['job_number']}}</lavel><br>
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
                            <th>{{$deferred_record['train_number']}}</th>
                            <th>{{$deferred_record['cars_number']}}</th>
                            <td>{{$deferred_record->formatTime("sina_departure")}}</td>
                            <td>{{$deferred_record->formatTime("sina_arrival")}}</td>
                            <td>{{$deferred_record->formatTime("tokyo_departure")}}</td>
                            <td>{{$deferred_record->formatTime("tokyo_arrival")}}</td>
                            <td>{{$deferred_record->formatTime("ueno_departure")}}</td>
                            <td>{{$deferred_record->formatTime("ueno_arrival")}}</td>
                            <td>{{$deferred_record->formatTime("ikebukuro_departure")}}</td>
                            <td>{{$deferred_record->formatTime("ikebukuro_arrival")}}</td>
                            <td>{{$deferred_record->formatTime("sinjuku_departure")}}</td>
                            <td>{{$deferred_record->formatTime("sinjuku_arrival_")}}</td>
                            <td>{{$deferred_record->formatTime("osaki_departure")}}</td>
                            <td>{{$deferred_record->formatTime("osaki_arrival")}}</td>
                        </tr>
                    </table>
                    <div>
                        <lavel>事由</lavel><br>
                        <p>
                            @foreach($deferred_record->occurrencereason as $occurrencereason)
                            {{$occurrencereason->occurrence_reason}}
                            @endforeach
                        </p>
                        
                        <lavel>備考</lavel>
                        <p>{{$deferred_record['remarks']}}</p>
                    </div>
                </div>
        </div>
    </main>
    <div>
        <a href="/">トップへ</a>
        <a href="/deferred/table">戻る</a>
        <a href="/deferred/edit/{{$deferred_record->id}}">修正・削除</a>
    </div>
</body>
</x-app-layout>
</html>