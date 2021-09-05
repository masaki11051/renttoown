@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }
</style>
@section('title', 'Bills Information')

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
      <th>application_id</th>
      <th>customer_id</th>
      <th>number of repayment</th>
      <th>payment_date</th>
      <th>payment amount</th>
      <th>payment status</th>
  </tr>
@foreach ($repayment_items as $repayment_item)
  <tr>
          @csrf
          <td>
              {{$repayment_item->id}}
          </td>
          <td>
              {{$repayment_item->application_id}}
          </td>
          <td>
              {{$repayment_item->getcustomername()}}
          </td>
          <td>
              {{$repayment_item->number_of_repayment}}
          </td>
          <td>
              {{$repayment_item->payment_date}}
          </td>
          <td>
              {{$repayment_item->payment_amount}}
          </td>
          <td>
              {{$repayment_item->payment_status}}
          </td>
  </tr>
  @endforeach
</table>
</div>
<script>
    const table = document.getElementById('myTable');
    const tr = table.getElementsByTagName("tr");
    for (var i = 0; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName("td");
        for (var j = 6; j < td.length; j++) {
            if (parseInt(td[j].innerText) === 1) {
                td[j].innerHTML = 'Not yet paid'
            } else if (parseInt(td[j].innerText) === 2){
                td[j].innerHTML = 'Already paid'
                tr[i].style.backgroundColor = "gray"
            }else{
                td[j].innerHTML = 'Returned the motorcycle'
                tr[i].style.backgroundColor = "black"
                tr[i].style.color = "white"
            }
        }
    }

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

