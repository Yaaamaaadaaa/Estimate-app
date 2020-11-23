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
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <p class="text-center">
          見積一覧
        </p>
        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th class="col">タイトル</th>
              <th class="col">見積もり期日</th>
              <th class="col">場所</th>
              <th class="col">宛先</th>
            </tr>
          </thead>
          <tbody>
            @foreach($estimates as $estimate)
              <tr>
                <td class="position-relative">
                  <a href="{{ route('estimates.index', ['id' => $estimate->id]) }}" class="stretched-link">
                    {{ $estimate->title }}
                  </a>
                </td>
                <td>{{ $estimate->estimated_at }}</td>
                <td>{{ $estimate->location }}</td>
                <td>{{ $estimate->customer }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<footer class="fixed-bottom">
  <nav class="my-navbar">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#">新規作成</a>
        </div>
        <div class="col-md-3 offset-md-6">
          <a href="#">ログアウト</a>
        </div>
      </div>
    </div>
  </nav>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>