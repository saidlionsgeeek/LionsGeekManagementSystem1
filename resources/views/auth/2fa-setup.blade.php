@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Setup Two-Factor Authentication</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('2fa.setup') }}">
                        @csrf

                        <!-- Display instructions and send code via email to the user -->
                        <p class="text-center">To enable two-factor authentication, we'll send you a code via email.</p>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Code
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
