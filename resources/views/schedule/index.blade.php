@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">  
      <input class="form-control" id="myInput" type="text" placeholder="Фильтр..">
      <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Название</th>
            <th>Начало</th>
            <th>Конец</th>
            <th>Цена</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($items as $item)
          <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->start_at }}</td>
            <td>{{ $item->end_at }}</td>
            <td>{{ $item->price }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
