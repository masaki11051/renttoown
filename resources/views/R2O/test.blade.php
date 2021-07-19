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
@section('title', 'person.index.blade.php')


@section('main_content')
<table>
  <tr>
    <th>company</th>
    <th>application</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->getData()}}
    </td>
    <td>
      @if ($item->applications != null)
      <table width="100%">
        @foreach ($item->applications as $obj)
          <tr>
            <td>{{ $obj->getData() }}</td>
          </tr>
        @endforeach
      </table>
      @endif
    </td>
  </tr>
  @endforeach
</table>
@endsection