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
                <a>宛先</a>
                <input type="text" name="customer" value="{{ $estimate->customer }}" class="form-control">
              </div>
              <p>税抜合計金額:<input type="text" class="form-control" :value="totalPrice | priceLocaleString"></p>
              <p>消費税:<input type="text" class="form-control" :value="taxPrice | priceLocaleString"></p>
              <p>御見積合計金額:<input type="text" class="form-control" :value="totalPriceWithTax | priceLocaleString"></p>
            </div>
            <div class="col">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">見積日:</label>
                <div class="col-md-10">
                  <input type="text" name="estimated_at" id="estimated_at" value="{{ $estimate->estimated_at }}" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">件名:</label>
                <div class="col-md-10">
                  <input type="text" name="title" value="{{ $estimate->title }}" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">納入期限:</label>
                <div class="col-md-10">
                  <input type="text" list="deadline_list" name="deadline_at" value="{{ $estimate->deadline_at }}" class="form-control">
                  <datalist id="deadline_list">
                    @foreach(['御打ち合わせによる', '受注後1週間以内', '受注後1ヶ月以内'] as $value)
                      <option value="{{ $value }}">
                    @endforeach
                  </datalist>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">納入場所:</label>
                <div class="col-md-10">
                  <input type="text" list="location_list" name="location" value="{{ $estimate->location }}" class="form-control">
                  <datalist id="location_list">
                    @foreach(['御打ち合わせによる', '貴社指定場所'] as $value)
                      <option value="{{ $value }}">
                    @endforeach
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">取引方法:</label>
                <div class="col-md-10">
                  <input type="text" list="transaction_list" name="transaction" value="{{ $estimate->transaction }}" class="form-control">
                  <datalist id="transaction_list">
                    @foreach(['御打ち合わせによる', '月末締め、翌月末にて'] as $value)
                      <option value="{{ $value }}">
                    @endforeach
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">有効期限:</label>
                <div class="col-md-10">
                  <input type="text" list="effectiveness_list" name="effectiveness" value="{{ $estimate->effectiveness }}" class="form-control">
                  <datalist id="effectiveness_list">
                    @foreach(['発行より1ヶ月以内', '発行より3ヶ月以内'] as $value)
                      <option value="{{ $value }}">
                    @endforeach
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
              <input type="text" class="form-control" v-model="item.name">
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
            <div class="col-md-3">
              <a href="{{ route('pdf.index', ['estimate' => $estimate->id]) }}" onclick="window.open(this.href, '_blank'); return false;">
                <button>印刷</button>
              </a>
            </div>
            <div class="col-md-3">
              <a href="{{ route('estimates.index') }}">
                <button onclick="return confirm('保存されていないデータは消えますがよろしいですか？')">見積一覧に戻る</button>
              </a>
            </div>
            <div class="col-md-3">
              <form action="{{ route('estimates.delete', ['estimate' => $estimate->id]) }}" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('削除します。よろしいですか？')">削除</button>
              </form>
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
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script>
    flatpickr(document.getElementById('estimated_at'), {
      locale: 'ja',
      dateFormat: "Y/m/d"
    });
  </script>
@endsection
