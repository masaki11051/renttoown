@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }
</style>
@section('title', 'All Companies Information')

@section('main_content')
<div class="p-4">
 <nav class="navbar navbar-dark bg-primary">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Top page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </nav><br>
<div class="mb-3">
  <label>Search Box</label>
  <input onkeyup='searchTable()' type='text' class="form-control"  id='myInput' placeholder="input 'ANY' you want to search ">
</div>
<table id="myTable" class="table table-hover table table-bordered">
  <tr>
      <th>ID</th>
      <th>Company_Name</th>
      <th>Phone_Number</th>
      <th>Address</th>
      <th>Edit Button</th>
  </tr>
@foreach ($company_items as $company_item)
  <tr>
      <form action="/edit_company_info" method="POST" class="row g-3 needs-validation">
          @csrf
          <td>
              {{$company_item->id}}
          </td>
          <td>
              {{$company_item->name}}
          </td>
          <td>
              {{$company_item->phone_number}}
          </td>
          <td>
              {{$company_item->address}}
          </td>
          <td>
          <input type="hidden" id="id" name="id" value="{{$company_item->id}}">
          <button type="submit" class="btn btn-primary">Select</button>
          </td>
      </form>
  </tr>
  @endforeach
</table>
</div>
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[0].style.display = "";
            tr[i].style.display = "";
            found = false;
        } else {
            tr[0].style.display = "";
            tr[i].style.display = "none";
        }
    }
}
</script>
@endsection

