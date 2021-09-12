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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <br>
        <div class="mb-3">
            <label>Search Box</label>
            <input onkeyup='searchTable()' type='text' class="form-control" id='myInput'
                   placeholder="input 'ANY' you want to search ">
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
                        <div class="d-grid gap-2 d-md-block">
                            <div class="btn-group" role="group" aria-label="First group">
                                <form action="/update_repayment_info_for_delay" method="POST" class="btn-group">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value=" {{$repayment_item->id}}">
                                    <input type="hidden" id="application_id" name="application_id"
                                           value=" {{$repayment_item->application_id}}">
                                    <input type="hidden" id="customer_id" name="customer_id"
                                           value=" {{$repayment_item->customer_id}}">
                                    <input type="hidden" id="number_of_repayment" name="number_of_repayment"
                                           value=" {{$repayment_item->number_of_repayment}}">
                                    <input type="hidden" id="payment_date" name="payment_dat"
                                           value=" {{$repayment_item->payment_date}}">
                                    <input type="hidden" id="payment_amount" name="payment_amount"
                                           value=" {{$repayment_item->payment_amount}}">
                                    <button type="submit" class="btn btn-warning">Delay</button>
                                </form>
                            </div>
                            <div class="btn-group" role="group" aria-label="Second group">
                                <form action="/update_repayment_info_for_paid" method="POST">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value=" {{$repayment_item->id}}">
                                    <input type="hidden" id="application_id" name="application_id"
                                           value=" {{$repayment_item->application_id}}">
                                    <input type="hidden" id="customer_id" name="customer_id"
                                           value=" {{$repayment_item->customer_id}}">
                                    <input type="hidden" id="number_of_repayment" name="number_of_repayment"
                                           value=" {{$repayment_item->number_of_repayment}}">
                                    <input type="hidden" id="payment_date" name="payment_dat"
                                           value=" {{$repayment_item->payment_date}}">
                                    <input type="hidden" id="payment_amount" name="payment_amount"
                                           value=" {{$repayment_item->payment_amount}}">
                                    <button type="submit" class="btn btn-danger">Paid</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <script src="{{ asset('/js/filter_function.js') }}">
    </script>
@endsection

