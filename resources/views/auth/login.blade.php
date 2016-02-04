@extends('layouts.master-login-register')

@section('content')
<div id="admin-bloc-connection" class="col l3 m6 s9 login_form">
    <div class="card users form">
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="card-header">
                <legend><a href="/" class="material-icons large">replay</a> Connexion</legend>
            </div>
            <div class="card-content">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Password</label>
                <input type="password" name="password" id="password" required>
                <div class="switch amber-text">
                    Remember Me :
                    <label>
                    Off
                    <input type="checkbox" name="remember">
                    <span class="lever"></span>
                    On
                    </label>
                </div>
            </div>
            <div class="card-action">
                <button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Connexion
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection