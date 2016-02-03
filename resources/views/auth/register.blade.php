@extends('layouts.master-login-register')

@section('content')
<div class="card users form">
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}
        <div class="card-header">
            <legend><a href="/" class="material-icons large">replay</a> Inscription</legend>
        </div>
        <div class="card-content">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            <label>Password</label>
            <input type="password" name="password" id="password" required>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div class="card-action">
            <button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Inscription
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>
@endsection