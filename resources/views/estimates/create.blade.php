<template>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>見積作成アプリ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">見積作成アプリ</a>
  </nav>
</header>
<main>
<div id='app'>
  <table class='table'>
    <thead>
      <tr>
        <th></th>
        <th>価格</th>
        <th>数量</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Nintendo Switch</td>
        <td>{{a}}</td>
        <td>
          <input class='form-control' type='number' v-model='b'>
        </td>
      </tr>
      <tr>
        <td>スプラトゥーン 2</td>
        <td>{{c}}</td>
        <td>
          <input class='form-control' type='number' v-model='d'>
        </td>
      </tr>
    </tbody>
  </table>
  <div class='text-right'>
    <p>  小計￥ {{sum}}</p>
    <p>消費税￥ {{tax}}</p>
    <p>  合計￥ {{sum + tax}}</p>
  </div>
</div>
</main>
<footer class="fixed-bottom">
  <nav class="my-navbar">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ route('estimates.create') }}">新規作成</a>
        </div>
        <div class="col-md-3 offset-md-6">
          <a href="#">ログアウト</a>
        </div>
      </div>
    </div>
  </nav>
</footer>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
</template>

<script>
new Vue({
    el: "#app",
    data: { a: 43300, b: 1, c: 5566, d: 1},
    computed: {
      sum: function() { return this.a * this.b + this.c * this.d },
      tax: function() { return Math.ceil(this.sum * 0.08) },
    },
  })
</script>