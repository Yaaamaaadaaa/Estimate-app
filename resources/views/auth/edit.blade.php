@extends('layout')

@section('content')
  <div class="container">
    <h2 class="panel-heading" style="padding-top:25px">ユーザー情報編集</h2>
    <form action="{{ route('user.edit')}}" method="post">
      @csrf
      <div class="form-group">
        <label>ユーザー名：　　　　</label>
        <input type="text" name="name" value="{{$auth->name}}">
      </div>
      <div class="form-group">
        <label>郵便番号：　　　　　</label>
        <input type="text" name="postal_code" value="{{$auth->postal_code}}">
      </div>
      <div class="form-group">
        <label>住所：　　　　　　　</label>
        <input type="text" name="address" value="{{$auth->address}}">
      </div>
      <div class="form-group">
        <label>ビル・マンション名：</label>
        <input type="text" name="address2" value="{{$auth->address2}}">
      </div>
      <div class="form-group">
        <label>会社名：　　　　　　</label>
        <input type="text" name="company" value="{{$auth->company}}">
      </div>
      <div class="form-group">
        <label>電話番号：　　　　　</label>
        <input type="text" name="phone_number" value="{{$auth->phone_number}}">
      </div>
      <div class="form-group">
        <label>FAX番号：　　　　　</label>
        <input type="text" name="fax_number" value="{{$auth->fax_number}}">
      </div>
      <button type="submit" class="btn btn-dark">保存</button>
    </form>
  </div>
@endsection