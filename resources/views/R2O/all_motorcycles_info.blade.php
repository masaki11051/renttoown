@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }
</style>
@section('title', 'All Motorcycles Information')

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
      <th>Location</th>
      <th>Unit_id</th>
      <th>Price</th>
      <th>Certificate</th>
      <th>Registration No.</th>
      <th>Registered date</th>
      <th>Edit Button</th>
  </tr>
@foreach ($motorcycle_items as $motorcycle_item)
  <tb>
      <form action="/edit_motorcycle_info" method="POST" class="row g-3 needs-validation">
          @csrf
      <td>
          {{$motorcycle_item->id}}
      </td>
      <td>
          {{$motorcycle_item->getlocationname()}}
      </td>
      <td>
          {{$motorcycle_item->unit_id}}
      </td>
      <td>
          {{$motorcycle_item->price}}
      </td>
      <td>
          {{$motorcycle_item->motorcycle_certificate}}
      </td>
      <td>
          {{$motorcycle_item->motorcycle_registration_number}}
      </td>
      <td>
          {{$motorcycle_item->created_at}}
      </td>
      <td>
          <input type="hidden" id="id" name="id" value="{{$motorcycle_item->id}}">
          <button type="submit" class="btn btn-primary">Select</button>
      </td>
      </form>
  </tb>
  </tr>
  @endforeach
</table>
</div>
 <script src="{{ asset('/js/filter_function.js') }}">
</script>
@endsection

