

<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
 <div class="main_wrapper">
    <!-- 登録フォーム -->
        <form action="{{ url('materials') }}" method="POST" class="form-horizontal">
            @csrf

            <div class="form-group">
                <div class="col-sm-6">
                  <label for="item_name">品名</label>
                    <input type="text" name="item_name" class="form-control" id="item_name" required>
                    <label for="item_lot">製造番号</label>
                    <input type="text" name="item_lot" class="form-control" id="item_lot" required>
                    <label for="exp">有効期限</label>
                    <input type="date" name="exp" class="form-control" id="exp" required>
                    <label for="amount">数量</label>
                    <input type="text" name="amount" class="form-control" id="amount" required>
                </div>
            </div>

            <!--登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        入庫する
                    </button>
                </div>
            </div>
        </form>


    <div class="main_head">
      <h1>5F 倉庫 現在庫</h1>
      <div>
        <a href="" class="btn btn_blue">工程物品準備</a>
      </div>
    </div>
    <div>

      <table>
        <tbody>
          <tr>
            <th>品名</th>
            <th>製造番号</th>
            <th>有効期限</th>
            <th>在庫数</th>
             <th>出庫ボタン</th>
            <th>削除ボタン</th>
          </tr>
        @foreach($materials as $material)
        <tr>
          <td>{{$material->item_name}}</td>
          <td>{{$material->item_lot}}</td>
          <td>{{$material->exp->format('Y.m.d')}}</td>
          <td>{{$material->amount}}</td>
          <td>
                                    <form action="{{ url('materialsedit/'.$material->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn btn_mini">
                                            出庫
                                        </button>
                                    </form>
                                </td>
            <td>
            <form action="{{ url('material/'.$material->id) }}" method="POST">
        @csrf               <!-- CSRFからの保護 -->
        @method('DELETE')   <!-- 擬似フォームメソッド -->
        
        <button type="submit" class="btn btn_red btn_mini">
            削除
        </button>
     </form>
            </td>
              
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>



       
  </div>
@endsection
