<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<x-app-layout>
<body>
    <header>
        <div>
            <h1>業務支援サイト</h1>
            <p>SmertRailWorkFrea</p>
        </div>
        <div>
            <div class="container text-center">
                <div class="row row-cols-auto">
                    <p class="col-md-auto">役職：{{Auth::user()->job_title }}</p>
                    <p class="col-md-auto">社員番号:{{Auth::user()->employee_number }}</p>
                    <p class="col-md-auto">名前:{{Auth::user()->name }}</p>
                    <p class="col-md-auto">{{date('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        </div>
    </header>
    <saide>
        <div>
            <h2>報告書</h2>
            <div class="container text-center">
                <div class="row row-cols-auto">
                    <a href="/deferred/Report" class="nav-link">列車遅延報告書</a>
                    <a href="#" class="nav-link">乗務報告書</a>
                    <a href="#" class="nav-link">発光信号動作報告書</a>
                    <a href="#" class="nav-link">非常ブレーキ動作報告書</a>
                    <a href="/crewing_diary" class="nav-link">乗務日記</a>
                </div>
            </div>
        </div>
    </saide>
    <div>
        <h2>報告内容</h2>
            <div>
                <a href="/deferred/table" class="nav-link">遅延報告</a>
                <a href="/crewing_diary/list" class="nav-link">乗務日記</a>
            </div>
    </div>
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
                     <label>社員番号<input type="hidden" name="post[employee_number]" value={{ $employee_number }}>{{ $employee_number }}：名前{{$user_name}}　</label><br>
                     <label>日付</label>
                     <input type="date" name="post[report_date]" value={{date('Y-m-d') }}><br>
                </div>
                <div>
                    <p>遅延時間の報告の仕方</p>
                    <p>(MM)分で入力すること→例）　１２０</p>
                    <p>秒数は選択式です</p>
                    
                    @foreach($stations as $key => $station)
                        <label> {{ $station }} 着・発</label>
                         <input type="int" name="post[{{ $key }}_departure_minute]">
                        <select name="post[{{$key}}_departure_second]">
                            <option value=" ">-</option>
                            <option value="00">00</option>
                            <option value="30">30</option>
                        </select>
                        <input type="int" name="post[{{ $key }}_arrival_minute]">
                        <select name="post[{{$key}}_arrival_second]">
                            <option value=" ">-</option>
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
           <a href="/">トップへ</a>
        </div>
    </main>
</body>
</x-app-layout>
</html>