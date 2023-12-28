<<html lang="ja">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
<body>
    <header>
        <div>
            <a href="/">
                <h1 class="col-2">業務支援サイト</h1>
                <p class="col-2">SmertRailWorkFrea</p>
            </a>
        </div>
        <div>
            <div class="container text-center">
                <div class="row justify-content-end">
                    <p class="col-2">役職：{{Auth::user()->job_title }}</p>
                    <p class="col-2">社員番号:{{Auth::user()->employee_number }}</p>
                    <p class="col-2">名前:{{Auth::user()->name }}</p>
                    <p class="col-2">{{date('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        </div>
    </header>
    </x-slot>
    <saide>
        <div>
            <h2 style="font-size: 18px;">報告書</h2>
            <div class="container text-center">
                <div class="row justify-content-end">
                    <a href="/deferred/Report" class="col-2 nav-link">列車遅延報告書</a>
                    <a href="#" class="col-2 nav-link">乗務報告書</a>
                    <a href="#" class="col-2 nav-link">発光信号動作報告書</a>
                    <a href="#" class="col-2 nav-link">非常ブレーキ動作報告書</a>
                    <a href="/crewing_diary" class="col-2 nav-link">乗務日記</a>
                </div>
            </div>
        </div>
    </saide>
    <div>
        <h2>報告内容</h2>
            <div class="list-group">
                <a href="/deferred/table" class="col-2 btn btn-outline-primary">遅延報告</a>
                <a href="/crewing_diary/list" class="col-2 btn btn-outline-primary">乗務日記</a>
            </div>
    </div>
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
                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <th>列番</th><th>車号</th>
                            <th>品川：着</th><th>品川：発</th>
                            <th>東京：着</th><th>東京：発</th>
                            <th>上野：着</th><th>上野：発</th>
                            <th>池袋：着</th><th>池袋：発</th>
                            <th>新宿：着</th><th>新宿：発</th>
                            <th>大崎：着</th><th>大崎：発</th>
                        </tr>
                        @foreach($deferred_list as $deferred_record)
                        <tr>
                            <th><a class="link-primary" href="/deferred/detail/{{$deferred_record->id}}">{{ $deferred_record->train_number }}</a></th>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>