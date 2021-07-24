@extends('layouts.app')
@section('content')
<div class="row container">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('materials/update') }}" method="POST">

        <!-- item_name -->
        <div class="form-group">
           <label for="item_name">品名ｘ</label>
           <input type="text" name="item_name" class="form-control" value="{{$materials->item_name}}">
        </div>
        <!--/ item_name -->
        
        <!-- item_number -->
        <div class="form-group">
           <label for="item_lot">Lot</label>
        <input type="text" name="item_lot" class="form-control" value="{{$materials->item_lot}}">
        </div>
        <!--/ item_number -->

        <!-- item_amount -->
        <div class="form-group">
           <label for="amount">在庫数</label>
        <input type="text" name="amount" class="form-control" value="{{$materials->amount}}">
        </div>
        <!--/ item_amount -->
        
        <!-- published -->
        <div class="form-group">
           <label for="exp">有効期限</label>
            <input type="datetime" name="exp" class="form-control" value="{{$materials->exp}}"/>
        </div>
        <!--/ published -->
        
        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
         
         <!-- id値を送信 -->
         <input type="hidden" name="id" value="{{$material->id}}">
         <!--/ id値を送信 -->
         
         <!-- CSRF -->
         @csrf
         <!--/ CSRF -->
         
    </form>
    </div>
</div>
@endsection