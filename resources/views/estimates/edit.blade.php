@extends('layout')

@section('content')
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
              <p>税抜合計金額:<input type="text" class="form-control" :value="totalPrice | priceLocaleString"></p>
              <p>消費税:<input type="text" class="form-control" :value="taxPrice | priceLocaleString"></p>
              <p>御見積合計金額:<input type="text" class="form-control" :value="totalPriceWithTax | priceLocaleString"></p>
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
            <th>金額</th>
            <th>備考</th>
            <th>追加</th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in listItems" :key="item.id">
            <td>
              <input type="text" class="form-control" v-model="item.name" @keyup.enter="append">
            </td>
            <td>
              <input type="text" class="form-control" v-model="item.unit">
            </td>
            <td>
              <input type="text" class="form-control" v-model="item.quantity">
            </td>
            <td>
              <input type="text" class="form-control" v-model="item.unit_price">
            </td>
            <td>
              <input type="text" class="form-control" :value="itemPrice(item.quantity, item.unit_price, index) | priceLocaleString">
            </td>
            <td>
              <input type="text" class="form-control" v-model="item.other">
            </td>
            <td>
              <span @click="append"><i class="fas fa-plus"></i></span>
            </td>
            <td>
              <span @click="remove(item.id, index)"><i class="fas fa-trash-alt"></i></span>
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
              <button type="submit" form="estimate_information" @click="saveItems">
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
@endsection

@section('scripts')
  <script src="{{ asset('js/app.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
@endsection
