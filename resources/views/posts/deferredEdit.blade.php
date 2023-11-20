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
                     <p>名前</p>
                     <input type="number" name="post[employee_number]" value="{{ $deferred_record->employee_number }}"><br>
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
</body>
</html>