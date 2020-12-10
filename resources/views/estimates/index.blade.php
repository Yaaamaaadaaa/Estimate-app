@extends('layout')

@section('content')
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <p class="text-center">見積一覧</p>
        <table class="table table-bordered table-hover" style="table-layout:fixed;">
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
                  <a href="{{ route('estimates.edit', ['estimate' => $estimate->id]) }}" class="stretched-link">
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
<footer class="fixed-bottom bg-dark">
  <nav class="my-navbar">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ route('estimates.create') }}">
            <button>新規作成</button>
          </a>
        </div>
        <div class="col-md-3 offset-md-6">
          <a href="#">
            <button>ログアウト</button>
          </a>
        </div>
      </div>
    </div>
  </nav>
</footer>
@endsection