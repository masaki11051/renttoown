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
              <h1><color="red">{{$error}}</h1>
            @endforeach
          </ul>
      @endif
       <div class="p-1 mb-2 bg-secondary text-white">Customer info</div>
        <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
            <th scope="col">age</th>
            <th scope="col">Phone number</th>
            <th scope="col">city</th>
            <th scope="col">mail</th>
          </tr>
        </thead>
          <tbody>
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
        <br>
        <h1>Upload Files</h1>
         <form class="p-2" method="post" action="/upload_supplementalDocs" enctype="multipart/form-data">
        	@csrf
        	<div class="input-group mb-3">
                      <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Application Form</button>
                      <input type="file" name="file[]" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" accept="image/gif,image/jpeg,image/png,application/pdf" multiple>
                    </div>
            <div class="input-group mb-3">
                      <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Customer ID</button>
                      <input type="file" name="file[]" class="form-control" aria-describedby="inputGroupFileAddon03" aria-label="Upload" accept="image/gif,image/jpeg,image/png,application/pdf" multiple>
                    </div>
                    <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
             <button type="submit" value="Upload" class="btn btn-primary">Register</button>
        </form>
        </div>
        @endsection
