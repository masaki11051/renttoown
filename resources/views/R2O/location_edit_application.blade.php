@extends('R2O.index')
<style>

</style>
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
      @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
              <h1><font color="red">{{$error}}</font></h1>
            @endforeach
          </ul>
      @endif
        <div class="p-1 mb-2 bg-secondary text-white">Motorcycle info</div>
         <table class="table table-hover">
             <thead>
               <tr>
                 <th scope="col">ID</th>
                 <th scope="col">brand</th>
                 <th scope="col">motorcycle_type</th>
                 <th scope="col">unit_id</th>
                 <th scope="col">motorcycle_certificate</th>
                 <th scope="col">motorcycle_registration_number</th>
               </tr>
             </thead>
               <tbody>
               <tr>
                 <td>
                 {{$data->id}}
               </td>
               <td>
                 {{$data->brand}}
               </td>
               <td>
                 {{$data->motorcycle_type}}
               </td>
               <td>
                 {{$data->unit_id}}
               </td>
               <td>
                 {{$data->motorcycle_certificate}}
               </td>
               <td>
                 {{$data->motorcycle_registration_number}}
               </td>
               </tr>
         </table>
         <div class="col-md-6">
                   <label for="location_update" class="form-label" >Location Update</label>
                   <select class="form-select" id="location_id" name="location_id">
                     <option selected>Choose "customer_renting"</option>
                     @foreach ($locations as $location)
                     <option value="{{$location->id}}">{{$location->location_name}}</option>
                     @endforeach
                   </select>
                 </div><br>
      <script>
      </script>
      @endsection
