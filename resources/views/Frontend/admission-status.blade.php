@extends('layouts.app')

@section('title', 'Admission Status')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Check Your Admission Status
            <a href="{{ route('admission.form') }}" class="btn btn-primary" style="float: right">Admission Form</a>

        </div>
        <div class="card-body">

            @if(session()->has('message'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            @endif


            <form method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <button type="submit" id="js-status-check-btn" class="btn btn-primary">Submit</button>
            </form>

            <div>
                <p id="js-error-msg" style="color:red"></p>
            </div>
            <div class="card-body" id="js-data-block" style="display: none;">
                <h5 class="card-title">Student Information</h5>
                <p class="card-text">
                    <strong>Name:<span id="js-name"></span></strong> <br>
                    <strong>Email:<span id="js-email"></span></strong> <br>
                   
                    <strong>Address:<span id="js-address"></span></strong> <br>
                    <strong>Admission Status: <span id="js-admission-status"></strong><br>
                    <strong>Eligible for free bus fair: <span id="js-bus-fair"></strong>
                   
                    <br>
                    <br>

                    
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    // Auto-fade the success alert after 5 seconds
    setTimeout(function() {
        $('#success-alert').fadeOut('slow');
    }, 5000);
    setTimeout(function() {
        $('.alert-danger').fadeOut('slow');
    }, 5000);
    const STATUS_CHECK_URL = "{{ route('admission.status') }}";

  
    
</script>
<script src="{{ asset('frontend-assets/admission-detail.js') }}"></script>

@endpush