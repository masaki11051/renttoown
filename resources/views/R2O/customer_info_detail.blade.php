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
 <div class="p-4">
    <nav class="navbar navbar-dark bg-primary">
             <div class="container-fluid">
               <a class="navbar-brand" href="{{ url('/') }}">Top page</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
             </div>
           </nav>
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
</div>
@endsection
