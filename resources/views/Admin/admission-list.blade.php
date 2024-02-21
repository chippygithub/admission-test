@extends('layouts.app')

@section('title', 'Admission List')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Admission List
        </div>
     
    </div>
    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="example"
                                class="table-custom table align-top table gy-5 gs-3 border rounded data-table">
                                <!--begin::Table head-->
                                <thead class="bg-light">
                                    <tr class="fw-bolder">
                                        <th class="min-w-50px">Sl#</th>
                                        <th class="min-w-250px">Name</th>
                                        <th class="min-w-200px">Email</th>
                                        <th class="min-w-50px">Status</th>
                                        <th class="min-w-100px">Created At</th>
                                        <th class="min-w-100px" data-priority="1">Actions</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
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
<script src="{{ asset('admin-assets/admission-list.js') }}"></script>
    <script>
        const ADMISSION_LIST_URL = "{{ route('student.list') }}";
        const ADMISSION_DETAIL_URL = "{{ route('student.detail',  ':id') }}";

    </script>
@endpush