@extends('layouts.app')

@section('content')
<div class="card text-center forget-card" style="width: 300px;">
    <div class="card-header h5 text-white bg-primary">Password Reset</div>
    <div class="card-body px-5">
        <p class="card-text py-2">
            Enter your email address and we'll send you an email with instructions to reset your password.
        </p>
        <form action="{{url('/forgetpassword')}}" method="post" >
            @csrf
            <div data-mdb-input-init class="form-outline">
                <input type="email" id="typeEmail" class="form-control my-3"  name="email"/>
                <label class="form-label" for="typeEmail">Email input</label>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 row">
                <input type="submit" class="btn btn-primary" value="ResetPassword">
            </div>
    </div>
    </form>
</div>
@endsection