<html lang="ja">
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
                    <a href="/not" class="col-2 nav-link">乗務報告書</a>
                    <a href="/not" class="col-2 nav-link">発光信号動作報告書</a>
                    <a href="/not" class="col-2 nav-link">非常ブレーキ動作報告書</a>
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
            <h1>列車遅延報告書</h1>
            <form action="/deferred/{{$deferred_record->id}}" method="POST">
                @method('PUT')
                @csrf
               
                 <div>
                     <label>列車番号</label>
                     <input type="text" name="post[train_number]" value="{{ $deferred_record->train_number }}"><br>
                     <label>車両番号</label>
                     <input type="text" name="post[cars_number]" value="{{ $deferred_record->cars_number }}"><br>
                     <label>仕業</label>
                     <input type="text" name="post[job_number]" value="{{ $deferred_record->job_number }}"><br>
                     <lavel>社員番号  {{ $deferred_record->employee_number }} : 名前  {{$user_name}}</lavel><br>
                     <label>日付</label>
                     <input type="date" name="post[report_date]" value="{{$deferred_record->report_date}}"><br>
                </div>
                <div>
                    <p>遅延時間の報告の仕方</p>
                    <p>(MM)分で入力すること→例）　１２０</p>
                    <p>秒数は選択式です</p>
                    
                    @foreach($stations as $key => $station)
                        <label> {{ $station }} 着・発</label>
                         <input type="number" name="post[{{ $key }}_departure_minute]" value="{{ $deferred_record->{$key.'_departure_minute'} }}">
                        <select name="post[{{$key}}_departure_second]" value="{{ $deferred_record->{$key.'_departure_second'} }}">
                            <option value="{{ $deferred_record->{$key.'_departure_second'} }}">{{ $deferred_record->{$key.'_departure_second'} }}</option>
                            <option value=" ">-</option>
                            <option value="00">00</option>
                            <option value="30">30</option>
                        </select>
                        <input type="number" name="post[{{ $key }}_arrival_minute]" value="{{ $deferred_record->{$key.'_arrival_minute'} }}">
                        <select name="post[{{$key}}_arrival_second]" value="{{ $deferred_record->{$key.'_arrival_second'} }}">
                            <option value="{{ $deferred_record->{$key.'_arrival_second'} }}">{{ $deferred_record->{$key.'_arrival_second'} }}</option>
                            <option value=" ">-</option>
                            <option value="00">00</option>
                            <option value="30">30</option>
                        </select><br>
                    @endforeach
                    <label>事由</label>
                    <label>
                        ※再選択
                    </label>
                   @foreach($occurrence_reasons as $occurrence_reason)
                        <label>
                                <input type="checkbox" name="reasons_array[]" value="{{ $occurrence_reason->id }}" {{$occurrence_reason->reasonCompare($occurrence_reason->id, $deferred_record->occurrencereason)}}>
                                {{ $occurrence_reason->occurrence_reason }}
                        </label><br>    
                    @endforeach
                    <label for="remarks">備考</label><br>
                    <textarea name="post[remarks]" >{{ $deferred_record->remarks }}</textarea><br>
                    
                </div>
                <input type="submit" value="修正"/>
            </form>
            
            <form id="form_{{$deferred_record->id}}" action="/deferred/{{$deferred_record->id}}" method="post">
                @csrf
                @method('DELETE')
                
                
                <button type="button" onclick="deletePost({{ $deferred_record->id }})">削除</button> 
            </form>
            
            <a href="/">トップへ</a>
            <a href="/deferred/table">遅延報告　一覧</a>
            <a href="/deferred/detail/{{$deferred_record->id}}">戻る</a>
        </div>
    </main>
    <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>