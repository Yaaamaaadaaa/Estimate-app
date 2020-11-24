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
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">見積作成アプリ</a>
  </nav>
</header>
<main>
  <div id="app">
    <table class="table table-bordered">
        <thead  class="thead-dark">
            <tr>
                <th>ID</th>
                <th>商品名</th>
                <th>数</th>
                <th>単位</th>
                <th>単価</th>
                <th>その他</TH>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
          <tr is="item-table" v-for="item in items" v-bind:item="item" v-bind:key="item.id"></tr>
        </tbody>
    </table>
  </div>
</main>
<footer class="fixed-bottom">
  <nav class="my-navbar">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ route('estimates.create') }}">保存</a>
        </div>
        <div class="col-md-3 offset-md-6">
          <a href="#">ログアウト</a>
        </div>
      </div>
    </div>
  </nav>
</footer>
<script src="{{ asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>