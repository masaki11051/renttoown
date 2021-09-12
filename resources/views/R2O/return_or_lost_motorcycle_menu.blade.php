@extends('R2O.index')
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
        <div class="p-1 mb-2 bg-secondary text-white">Input New Info</div>
        <div class="d-flex position-relative m-3">
            <img src="/images/return.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
                <h5 class="mt-0">When a motorcycle was returned</h5>
                <p>Update motorcycle information when customer motorcycle returned</p>
                <a href="{{ url('/customer_search_for_returned_motorcycle') }}" class="stretched-link">Go to</a>
            </div>
        </div>
        <div class="d-flex position-relative m-3">
            <img src="/images/lost.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
                <h5 class="mt-0">When a motorcycle was lost</h5>
                <p>No contact to the customer $ No return of the motorcycle</p>
                <a href="{{ url('/customer_search_for_lost_motorcycle') }}" class="stretched-link">Go to</a>
            </div>
        </div>
    </div>
    </div>
@endsection
