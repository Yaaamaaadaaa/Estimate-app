<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        @font-face {
            font-family: ipam;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/ipam.ttf') }}') format('truetype');
        }
        @font-face {
            font-family: ipam;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/ipam.ttf') }}') format('truetype');
        }
        body {
            font-family: ipam !important;
        }
        .box {
          width        : 50px;
          height       : 50px;
          background   : white;
          border       : medium solid #000000;
          position: absolute;
        }
    </style>
</head>
<body>
  <h1 style="text-align:center;">御見積書</h1>
  <div style="float:left">
    <h2>{{ $estimate['customer'] }}様</h2>
    <p>下記の通り御見積申し上げます</p>
    <p>件名：{{ $estimate['title'] }}</p>
    <p>納入期限：{{ $estimate['deadline_at'] }}</p>
    <p>納入場所：{{ $estimate['location'] }}</p>
    <p>取引方法：{{ $estimate['transaction'] }}</p>
    <p>有効期限：{{ $estimate['effectiveness'] }}</p>
    <u><h2>御見積合計金額　¥{{ number_format($sum_price * 1.1) }}-</h2></u>
  </div>
  <div style="float:right">
    <p>見積日　{{ $estimated_at }}</p>
    <p style="padding-top:25px">〒{{ $user['postal_code'] }}</p>
    <p>{{ $user['address'] }}</p>
    <p>{{ $user['address2'] }}</p>
    <p>{{ $user['company'] }}</p>
    <p>TEL: {{ $user['phone_number']}}  FAX: {{ $user['fax_number'] }}</p>
    <p>担当者：　{{ $user['name'] }}</p>
  </div>
  <p class="box" style="margin-top:375px;margin-left: 547px;"></p>
  <a class="box" style="margin-top:375px;margin-left: 597px;"></a>
  <a class="box" style="margin-top:375px;margin-left: 647px;"></a>
  <div style="margin-top:360px">
    <table border="1" width="100%" cellspacing="0" cellpadding="0"　style="table-layout: auto">
      <tr>
        <th>商品名</th>
        <th>単位</th>
        <th>数量</th>
        <th>単価</th>
        <th>金額</th>
        <th>備考</th>
      </tr>
      @foreach ($items as $item)
        <tr>
          <td>
            {{ $item['name'] }}
          </td>
          <td style="text-align:center">
            {{ $item['unit'] }}
          </td>
          <td style="text-align:right">
            {{ $item['quantity'] }}
          </td>
          <td style="text-align:right">
            {{ number_format($item['unit_price']) }}
          </td>
          <td style="text-align:right">
            {{ number_format($item['quantity'] * $item['unit_price']) }}
          </td>
          <td style="font-size:12px">
            {{ $item['other'] }}
          </td>
        </tr>
      @endforeach
      <tr>
        <td style="text-align:right">＜税抜合計金額＞</td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align:right">{{ number_format($sum_price) }}</td>
        <td></td>
      </tr>
      <tr>
        <td style="text-align:right">＜消費税＞</td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align:right">{{ number_format($sum_price * 0.1) }}</td>
        <td></td>
      </tr>
      <tr>
        <td>毎度ありがとうございます。</td>
        <td></td>
        <td></td>
        <td style="text-align:center">合計</td>
        <td style="text-align:right">{{ number_format($sum_price * 1.1) }}</td>
        <td></td>
      </tr>
    </table>
  </div>
</body>
</html>