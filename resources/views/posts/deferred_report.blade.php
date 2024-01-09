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
        <div class="card align-items-center border-info mb-3 mx-auto p-4" style="max-width: 40%;">
            <h1 class="card-header fs-4 my-4">列車遅延報告書</h1>
            <form action="/posts" method="POST">
                @csrf
                <div>
                    <div class="row justify-content-end">
                        <label class="form-label col-4 mx-2">社員番号<input type="hidden" name="post[employee_number]" value={{ $employee_number }}>{{ $employee_number }}：名前{{$user_name}}　</label>
                    </div>
                    <label class="form-label">列車番号</label>
                    <input type="text" class="form-control" name="post[train_number]"><br>
                    <label class="form-label">車両番号</label>
                    <input type="text" class="form-control" name="post[cars_number]"><br>
                    <label class="form-label">仕業</label>
                    <input type="text" class="form-control" name="post[job_number]"><br>
                    <label class="form-label">日付</label>
                    <input type="date" class="form-control" name="post[report_date]" value={{date('Y-m-d') }}><br>
                </div>
                <div>
                    <p>遅延時間の報告の仕方</p>
                    <p>(MM)分で入力すること→例）　１２０</p>
                    <p>秒数は選択式です</p>
                    
                    @foreach($stations as $key => $station)
                    <div class="row">
                        <label class="form-label col mx-2"> {{ $station }} 着・発</label>
                         <input type="int" class="form-control col mx-2" name="post[{{ $key }}_departure_minute]">
                        <select class="form-select col mx-2" name="post[{{$key}}_departure_second]">
                            <option value=" ">-</option>
                            <option value="00">00</option>
                            <option value="30">30</option>
                        </select>
                        <input type="int" class="form-control col mx-2" name="post[{{ $key }}_arrival_minute]">
                        <select class="form-select col mx-2" name="post[{{$key}}_arrival_second]">
                            <option value=" ">-</option>
                            <option value="00">00</option>
                            <option value="30">30</option>
                        </select><br>
                    </div>
                    @endforeach
                    <label class="form-label">事由</label><br>
                    <div class="row">
                        @foreach($occurrence_reasons as $occurrence_reason)
                            <lavel class="form-label col ms-2">
                                <input type="checkbox" class="form-check col me-2" name="reasons_array[]" value="{{ $occurrence_reason->id}}">
                                    {{$occurrence_reason->occurrence_reason}}
                                </input><br>
                            </lavel>
                        @endforeach
                    </div>
                    <label for="remarks" class="form-label">備考</label><br>
                    <textarea class="form-control" name="post[remarks]" rows="4"></textarea><br>
                </div>
                <div class="row justify-content-end">
                    <input type="submit" class="btn btn-outline-primary btn-lg col-2 me-5" value="報告"/>
                </div>
            </form>
        </div>
        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>