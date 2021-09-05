@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }
</style>
@section('title', 'Repayment Information')

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
      <th>payment result</th>
  </tr>
@foreach ($repayment_items as $repayment_item)
  <tr>
      <form action="/edit_repayment_info" method="POST" >
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
      </form>
          <td>
              <form action="/update_repayment_info_for_delay" method="POST">
                  @csrf
                  <input type="hidden" id="id" name="id" value=" {{$repayment_item->id}}">
                  <input type="hidden" id="application_id" name="application_id" value=" {{$repayment_item->application_id}}">
                  <input type="hidden" id="customer_id" name="customer_id" value=" {{$repayment_item->customer_id}}">
                  <input type="hidden" id="number_of_repayment" name="number_of_repayment" value=" {{$repayment_item->number_of_repayment}}">
                  <input type="hidden" id="payment_date" name="payment_dat" value=" {{$repayment_item->payment_date}}">
                  <input type="hidden" id="payment_amount" name="payment_amount" value=" {{$repayment_item->payment_amount}}">
                  <button type="submit" class="btn btn-warning">Delay</button>
              </form>
              <form action="/update_repayment_info_for_paid" method="POST">
                  @csrf
                  <input type="hidden" id="id" name="id" value=" {{$repayment_item->id}}">
                  <input type="hidden" id="application_id" name="application_id" value=" {{$repayment_item->application_id}}">
                  <input type="hidden" id="customer_id" name="customer_id" value=" {{$repayment_item->customer_id}}">
                  <input type="hidden" id="number_of_repayment" name="number_of_repayment" value=" {{$repayment_item->number_of_repayment}}">
                  <input type="hidden" id="payment_date" name="payment_dat" value=" {{$repayment_item->payment_date}}">
                  <input type="hidden" id="payment_amount" name="payment_amount" value=" {{$repayment_item->payment_amount}}">
                  <button type="submit" class="btn btn-danger">Paid</button>
              </form>
          </td>
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

