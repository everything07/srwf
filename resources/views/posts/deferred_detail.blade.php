<!DOCTYPE html>
<html lang="ja">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
<body class="">
    <header>
        <div class="d-flex flex-column">
            <a href="/" class="text-center">
                <h1 class="col-12 col-md-2 font-monospace">業務支援サイト</h1>
                <p class="col-12 col-md-2">SmertRailWorkFrea</p>
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
        <div class="container mt-2">
            <h2 class="fs-3 mt-4">報告書</h2>
            <div class="container text-center">
                <div class="row justify-content-end">
                    <a href="/deferred/Report" class="col-2 nav-link">列車遅延報告書</a>
                    <a href="/not" class="col-2 nav-link">乗務報告書</a>
                    <a href="/not" class="col-2 nav-link">発光信号動作報告書</a>
                    <a href="/not" class="col-2 nav-link">非常ブレーキ動作報告書</a>
                    <a href="/crewing_diary" class="col-2 nav-link">乗務日記</a>
                </div>
            </div>
        </div>
    </saide>
    <div class="container mt-2">
        <h2 class="fs-4 mt-4">報告内容</h2>
        <div class="row ">
            <div class="col-2">
                <div class="list-group">
                    <a href="/deferred/table" class="btn btn-outline-primary mt-2">遅延報告</a>
                    <a href="/crewing_diary/list" class="btn btn-outline-primary mt-2">乗務日記</a>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="container mt-4">
            <div class="card">
            <h1 class="text-center fs-4 mt-4">列車遅延報告</h1>
                <div>
                    <div class="row justify-content-end mt-4">
                        <lavel class="col-2">仕業__{{$deferred_record['job_number']}}</lavel><br>
                        <lavel class="col-2">社員番号__{{$deferred_record['employee_number']}}</lavel><br>
                        <lavel class="col-2">名前__{{$user_name}}</lavel><br>
                        <lavel class="col-2">報告日__{{$deferred_record['report_date']}}</lavel><br>
                    </div>
                    <table class="table table-striped table-bordered text-center mt-4">
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
                    <div class="text-center mt-4">
                        <lavel class="fs-5 mt-2">事由</lavel><br>
                        <div class="row justify-content-center my-2">
                        @foreach($deferred_record->occurrencereason as $occurrencereason)
                            <p class="col-md-auto">{{$occurrencereason->occurrence_reason}}</p>
                        @endforeach
                        </div>
                        <lavel class="fs-5 mt-4">備考</lavel>
                        <p class="mt-2">{{$deferred_record['remarks']}}</p>
                    </div>
                    <div class="d-grid justify-content-md-end m-5">
                        <div>
                            <a class="btn btn-warning" href="/deferred/edit/{{$deferred_record->id}}">修正・削除</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="text-end m-3">
                    <a class="link-offset-2" href="/deferred/table">戻る</a>
                    <a class="link-offset-2" href="/">トップへ</a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>