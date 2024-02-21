@extends('layouts.app')

@section('title', 'Admission Form')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Admission Form

            <a href="{{ route('check.admission.status') }}" class="btn btn-primary" style="float: right">Admission Status</a>

        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('message'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
   
@endif


            <form method="POST" action="{{ route('admission.form.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="male">Select</option>    
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tc_mark_sheet"> Mark Sheet</label>
                    <input type="file" id="mark_sheet" name="mark_sheet" class="form-control-file" accept="application/pdf,image/*" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="terms_and_conditions" name="terms_and_conditions" required>
                    <label class="form-check-label" for="terms_and_conditions">I agree to the terms and conditions</label>
                </div>
                <div class="form-group">
                    <input type="hidden" id="latitude" name="latitude" class="form-control" >
                </div>
                <div class="form-group">
                    <input type="hidden" id="longitude" name="longitude" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.onload = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;
    }
    
</script>
<script>
        // Auto-fade the success alert after 5 seconds
        setTimeout(function() {
            $('#success-alert').fadeOut('slow');
        }, 5000);
        setTimeout(function() {
            $('.alert-danger').fadeOut('slow');
        }, 5000);
    </script>
@endpush