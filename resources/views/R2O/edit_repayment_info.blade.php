@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }
</style>
@section('title', 'Update repayments Info')

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
        <form action="/update_repayment_info" method="POST" class="needs-validation" >
            @csrf
        <table id="myTable" class="table table-hover table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>application_id</th>
                        <th>customer_id</th>
                        <th>number of repayment</th>
                        <th>payment_date</th>
                        <th>payment amount</th>
                        <th>payment status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                                <select class="form-select" id="payment_status" name="payment_status" required>
                                    <option selected></option>
                                    <option id="payment_status" name="payment_status" value="1">Not yet paid</option>
                                    <option id="payment_status" name="payment_status" value="2">Paid</option>
                                    <option id="payment_status" name="payment_status" value="3">Delay</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="m-2 col-12">
                    <input type="hidden" id="id" name="id" value=" {{$repayment_item->id}}">
                    <input type="hidden" id="application_id" name="application_id" value=" {{$repayment_item->application_id}}">
                    <input type="hidden" id="customer_id" name="customer_id" value=" {{$repayment_item->customer_id}}">
                    <input type="hidden" id="number_of_repayment" name="number_of_repayment" value=" {{$repayment_item->number_of_repayment}}">
                    <input type="hidden" id="payment_date" name="payment_dat" value=" {{$repayment_item->payment_date}}">
                    <input type="hidden" id="payment_amount" name="payment_amount" value=" {{$repayment_item->payment_amount}}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    <script>
    </script>
@endsection
