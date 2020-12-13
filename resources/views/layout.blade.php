<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>見積作成アプリ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-xs navbar-dark bg-dark p-1">
      <a class="navbar-brand" href="{{ route('estimates.index') }}">見積作成アプリ</a>
      <div class="navbar-control" style="color:white;">
        @if(Auth::check())
          <span class="navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
          ｜
          <a href="#" id="logout" class="navbar-item" style="color:white;">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @else
          <a class="navbar-item" href="{{ route('login') }}" style="color:white;">ログイン</a>
          ｜
          <a class="navbar-item" href="{{ route('register') }}" style="color:white;">会員登録</a>
        @endif
      </div>
    </nav>
  </header>
  @yield('content')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  @if(Auth::check())
    <script>
      document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
      });
    </script>
  @endif
  @yield('scripts')
</body>
</html>