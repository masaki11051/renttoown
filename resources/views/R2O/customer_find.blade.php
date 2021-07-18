@extends('R2O.index')
<style>
   th {
      background-color: black;
      color: white;
      padding: 5px 30px;
    }
    td {
      border: 1px solid black;
      padding: 5px 30px;
      text-align: center;
    }

</style>
@section('title', 'Customer Search')

@section('main_content')
  <form action="/find" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="col-md-4">
          <label for="inputname" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputname" name="input_name"　value="{{$input}}">
        </div>
        <div class="col-md-4">
          <label for="inputage" class="form-label">age</label>
          <input type="number" class="form-control" id="inputage" min="21" max="60" name="input_age" value="{{$input}}">
          <div class="invalid-feedback">Please confirm customer's age </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
  </form>
  <table>
    <tr>
      <th>ID</th>
      <th>name</th>
      <th>age</th>
      <th>phone_number</th>
      <th>city</th>
      <th>mail</th>
    </tr>
    @if (isset($data))
    <tr>
      <td>
      {{$data->id}}
    </td>
    <td>
      {{$data->name}}
    </td>
    <td>
      {{$data->age}}
    </td>
    <td>
      {{$data->phone_number}}
    </td>
    <td>
      {{$data->city}}
    </td>
    <td>
      {{$data->mail}}
    </td>
    </tr>
  </table>
  @endif
  @endsection