@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-4">
<div class="row justify-content-center">
        <div class="col-md-6">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Login
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

            @if(session()->has('error'))
            <div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif


            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
        </div>
</div>
</div>
@endsection

@push('scripts')

<script>
    setTimeout(function() {
        $('#success-alert').fadeOut('slow');
    }, 5000);
    setTimeout(function() {
        $('.alert-danger').fadeOut('slow');
    }, 5000);
</script>
@endpush