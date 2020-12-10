@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <h2 class="panel-heading" style="padding-top:25px">ログイン</h2>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-dark">送信</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center" style="padding-top:25px">
          <a href="{{ route('login.guest') }}"><button class="btn btn-dark">ゲストユーザーとしてログイン</button></a>
        </div>
        <div class="text-center" style="padding-top:25px">
          <a href="{{ route('password.request') }}"><button class="btn btn-dark">パスワードの変更はこちらから</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection