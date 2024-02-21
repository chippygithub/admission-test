@extends('layouts.app')

@section('title', 'Admission Detail')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Admission Detail

            <a href="{{ route('student.list') }}" class="btn btn-primary" style="float: right">Student List</a>

        </div>
        <div class="card-body">
            <h5 class="card-title">Student Information</h5>
            <p class="card-text">
                <strong>Name:</strong> {{$data->name}}<br>
                <strong>Email:</strong> {{$data->email}}<br>
                <strong>Gender:</strong>
                @if($data->gender == config('yourconfigfile.gender.male'))
                Male
                @elseif($data->gender == config('yourconfigfile.gender.female'))
                Female
                @elseif($data->gender == config('yourconfigfile.gender.other'))
                Other
                @endif
                <br>
                <strong>Age:</strong> {{$data->age}}<br>
                <strong>Address:</strong> {{$data->address}}<br>
                <strong>Mark Sheet:</strong> <a href="{{ asset('storage/'.$data->mark_sheet) }}" download>Download</a> Or <a href="{{ asset('storage/'.$data->mark_sheet) }}">View</a><br>
                <strong>Eligible for free bus fair:</strong>
                @if($data->is_free_bus_fair == config('admission.free_bus_fair_status.active'))
                YES
                @elseif($data->is_free_bus_fair == config('admission.free_bus_fair_status.inactive'))
                NO
                @else
                NA
                @endif
                <br>
                <br>

                @if($data->status == 0)
                <a href="javascript:void(0)" id="js-btn-admit" data-id="{{$data->id}}" class="btn btn-primary btn-admit">Admit</a>
                @else
                <a href="#" class="btn btn-primary">Admitted</a>
                @endif
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
</script>
<script src="{{ asset('admin-assets/admission-detail.js') }}"></script>
<script>
    const ADMISSION_LIST_URL = "{{ route('student.list') }}";
    const ADMIT_URL = "{{ route('student.admit',':id') }}";

</script>
@endpush