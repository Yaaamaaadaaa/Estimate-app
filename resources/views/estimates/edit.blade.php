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
<div id="app">
  <main>
    <div class="container">
      <form id="estimate_information" action="{{ route('estimates.edit', ['estimate' => $estimate->id]) }}" method="POST">
        @csrf
        <div class="row">
          <div class="col">
            <div class="form-group row">
                <input type="text" name="customer" value="{{ $estimate->customer }}" class="form-control">
            </div>
            <p>税抜合計金額</p>
            <p>消費税</p>
            <p>御見積合計金額</p>
          </div>
          <div class="col">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">件名:</label>
              <div class="col-md-10">
                <input type="text" name="title" value="{{ $estimate->title }}" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">納入期限:</label>
              <div class="col-md-10">
                <input type="text" name="deadline_at" value="{{ $estimate->deadline_at }}" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">納入場所:</label>
              <div class="col-md-10">
                <input type="text" name="location" value="{{ $estimate->location }}" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">取引方法:</label>
              <div class="col-md-10">
                <input type="text" name="transaction" value="{{ $estimate->transaction }}" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">有効期限:</label>
              <div class="col-md-10">
                <input type="text" name="effectiveness" value="{{ $estimate->effectiveness }}" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </form>
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
        <tr v-for="item in items" v-bind:key="item.id">
        <td>
      <input type="text" class="form-control" v-model="item.name" v-on:keyup.enter="append">
    </td>
    <td>
      <input type="text" class="form-control" v-model="item.unit">
    </td>
    <td>
      <input type="text" class="form-control" v-model="item.quenity">
    </td>
    <td>
      <input type="text" class="form-control" v-model="item.unit_price">
    </td>
    <td>
      <input type="text" class="form-control" v-model="item.other">
    </td>
    <td>
      <span v-on:click="append"><i class="fas fa-plus"></i></span>
    </td>
    <td>
      <i class="fas fa-trash-alt"></i>
    </td>
        </tr>
      </tbody>
    </table>
  </main>
  <footer class="fixed-bottom bg-dark">
    <nav class="my-navbar">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <button @click="saveItems">
              保存
            </button>
          </div>
          <div class="col-md-3 offset-md-6">
            <a href="#">
              <button>削除</button>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </footer>
</div>
<script src="{{ asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>