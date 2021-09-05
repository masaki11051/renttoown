@extends('R2O.index')
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
        <div class="p-1 mb-2 bg-secondary text-white">Repayment Management</div>
        <div class="d-flex position-relative m-3">
            <img src="/images/schedule.png" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
                <h5 class="mt-0">Repayments delay or paid</h5>
                <p>View all repayments information</p>
                <a href="{{ url('/select_repayments_info') }}" class="stretched-link">Go to</a>
            </div>
        </div>
        <div class="d-flex position-relative m-3">
            <img src="/images/edit_bill.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
                <h5 class="mt-0">Search wrong repayments info</h5>
                <p>View all repayments information</p>
                <a href="{{ url('/search_repayments_info') }}" class="stretched-link">Go to</a>
            </div>
        </div>
    </div>
@endsection
