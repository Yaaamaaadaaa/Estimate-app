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
    <a class="my-navbar-brand" href="{{ route('estimates.index') }}">見積作成アプリ</a>
  </nav>
</header>
<main>
  <div id="app">
    <div class="container">
      <div class="row">
        <div class="col-md">
          <form id="estimate_information">
            <input type="text" value="{{ $estimate->customer }}">様</input>
          </form>
          <p>税抜合計金額</p>
          <p>消費税</p>
          <p>御見積合計金額</p>
        </div>
        <div class="col_md">
          <form id="estimate_information">
            <p>件名:<input type="text" value="{{ $estimate->title }}" /></p>
            <p>納入期限:<input type="text"></p>
            <p>納入場所:<input type="text"></p>
            <p>取引方法:<input type="text"></p>
            <p>有効期限:<input type="text"></p>
          </form>
        </div>
      </div>
    </div>
    <table class="table table-bordered">
      <thead  class="thead-dark">
        <tr>
          <th>商品名</th>
          <th>単位</th>
          <th>数量</th>
          <th>単価</th>
          <th>備考</th>
          <th>追加</th>
          <th>削除</th>
        </tr>
      </thead>
      <tbody>
        <tr is="item-table" v-for="(item, index) in items" v-bind:item="item" v-bind:key="item.id" v-bind:index="index">
        </tr>
      </tbody>
    </table>
  </div>
</main>
<footer class="fixed-bottom">
  <nav class="my-navbar">
    <div class="container">
      <div class="row">
        <div v-on:click="save_items" class="col-md-3">
          <button type="submit" form="estimate_information">
            <a href="{{ route('estimates.create') }}">保存</a>
          </button>
        </div>
        <div class="col-md-3 offset-md-6">
          <button>
            <a href="#">削除</a>
          </button>
        </div>
      </div>
    </div>
  </nav>
</footer>
<script src="{{ asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>