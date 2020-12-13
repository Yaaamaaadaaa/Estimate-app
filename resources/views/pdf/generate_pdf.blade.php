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
    </style>
</head>
<body>
  <h1 style="text-align:center;">御見積書</h1>
    <table border="1" width="100%" cellspacing="0" cellpadding="0"　style="table-layout: fixed">
      <tr>
        <th style="width: 100px">商品名</th>
        <th style="width: 15px">単位</th>
        <th style="width: 10px">数量</th>
        <th style="width: 25px">単価</th>
        <th style="width: 25px">金額</th>
        <th style="width: 25px">備考</th>
      </tr>
      @foreach ($items as $item)
        <tr>
          <td style="width: 100px">
            {{ $item['name'] }}
          </td>
          <td style="width: 15px">
            {{ $item['unit'] }}
          </td>
          <td style="width: 10px">
            {{ $item['quantity'] }}
          </td>
          <td style="width: 25px">
            {{ $item['unit_price'] }}
          </td>
          <td style="width: 25px">
            {{ $item['quantity'] * $item['unit_price'] }}
          </td>
          <td style="width: 25px">
            {{ $item['other'] }}
          </td>
        </tr>
      @endforeach
    </table>
  <script src="{{ asset('js/generate_pdf.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
</body>
</html>