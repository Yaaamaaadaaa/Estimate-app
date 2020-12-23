@extends('layout')

@section('content')
  <div class="container">
    <h2 class="panel-heading" style="padding-top:25px">ユーザー情報編集</h2>
    <form action="{{ route('user.edit')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-2">ユーザー名</div>
        <div class="col-sm-10" style="padding: 3px;">
          <input type="text" name="name" value="{{$auth->name}}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">郵便番号</div>
        <div class="col-sm-10" style="padding: 3px;">
          <input type="text" name="postal_code" value="{{$auth->postal_code}}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">住所</div>
        <div class="col-sm-10" style="padding: 3px;">
          <textarea name="address" value="{{$auth->address}}">{{$auth->address}}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">ビル・マンション名</div>
        <div class="col-sm-10" style="padding: 3px;">
          <textarea name="address2">{{$auth->address2}}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">会社名</div>
        <div class="col-sm-10" style="padding: 3px;">
          <textarea name="company">{{$auth->company}}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">電話番号</div>
        <div class="col-sm-10" style="padding: 3px;">
          <input type="text" name="phone_number" value="{{$auth->phone_number}}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">FAX番号</div>
        <div class="col-sm-10" style="padding: 3px;">
          <input type="text" name="fax_number" value="{{$auth->fax_number}}">
        </div>
      </div>
      <div style="padding-top:25px;">
        <button type="submit" class="btn btn-dark">保存</button>
      </div>
    </form>
  </div>
@endsection