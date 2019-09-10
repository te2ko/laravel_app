@extends ('layouts.app')
@section ('content')

<h2 class="mb-3">ToDo作成</h2>
<!-- formでデータの飛ばし先を指定している　'route' => ルーティング名にしていしている。-->
{!! Form::open(['route' => 'todo.store']) !!}
<!-- text系はlabelと一緒に<div class="form-group">で囲む。 -->
  <div class="form-group">
  <!-- input, select, textarea等はform-controlをつけないといけない。requiredは入力必須 -->
  {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' => 'ToDo内容']) !!}
  </div>
  <!-- 第一引数にはvalueをいれ第二引数には属性を入れる -->
  {!! Form::submit('追加', ['class' => 'btn btn-success float-right']) !!}
{!! Form::close() !!}

@endsection