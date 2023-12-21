<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">SRWF </x-slot>
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
    
    <div>
        @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>