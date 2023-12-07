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
            <h1>列車遅延報告 一覧</h1>
                <div>
                    <!--検索機能-->
                    <form>
                        <div>
                            <label>日付検索</label>
                            <input type="date" name="from" value="{{ $from }}">
                            <span>~</span>
                            <input type="date" name="until" value="{{ $until }}">
                            <input type="submit" value="検索" >
                        </div>
                        
                    </form>
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
                        @foreach($deferred_list as $deferred_record)
                        <tr>
                            <th><a href="/deferred/detail/{{$deferred_record->id}}">{{ $deferred_record->train_number }}</a></th>

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
                        @endforeach
                    </table>
                </div>
        </div>
           <a href="/">トップへ</a>
    </main>
</body>
</x-app-layout>
</html>