@extends('R2O.index')
<style>


</style>
@section('title', 'Customer Infomation')

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
  <br>
  @foreach($uploads as $upload)
        <div style="width: 18rem; float:left; margin: 16px;">
          <form class="p-2" method="post" action="/delete_files">
              @csrf
                  <img src="{{Storage::url($upload->file_path)}}" style="width:100%;" alt=""/>
                  <p>{{$upload->file_name}}</p>
                  <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
                  <input type="hidden" id="id" name="id" value="{{$upload->id}}">
                  <button type="submit" class="btn btn-outline-danger">Delete file</button>
          </form>
        </div>
  @endforeach
  <br>
<script src="{{ asset('/js/customer_info.js') }}">
</script>
@endsection







