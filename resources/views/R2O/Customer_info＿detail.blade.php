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
@section('title', 'Customer info Details')

@section('main_content')
<table>
  <tr>
    <th>ID</th>
    <th>name</th>
    <th>age</th>
    <th>phone_number</th>
    <th>city</th>
    <th>mail</th>
  </tr>
@foreach ($items as $item)
  <tr>
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->name}}
    </td>
    <td>
      {{$item->age}}
    </td>
    <td>
      {{$item->phone_number}}
    </td>
    <td>
      {{$item->city}}
    </td>
    <td>
      {{$item->mail}}
    </td>
  </tr>
  @endforeach
</table>
@endsection
