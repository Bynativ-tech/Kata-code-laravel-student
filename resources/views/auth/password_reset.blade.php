@extends('layouts')

@section('body')
<body class="auth-body-bg">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form class="form" method="POST" action="{{ route('password.email') }}">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" value="" id="email">
                </div>
                <div class="text-end">
                    <button class="btn btn-primary" type="submit">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

