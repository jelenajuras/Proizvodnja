@extends('layouts.index')

@section('title', 'Login')

<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}"/>


@section('content')
<div class="pos row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading" id="input2">
                <h3 class="panel-title">Prijavi se</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('auth.login.attempt') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
                        {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="true" {{ old('remember') == 'true' ? 'checked' : ''}}> Zapamti me
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="butt btn btn-lg btn-default btn-block" type="submit" value="Prijava">
                    <!--<p style="margin-top:5px; margin-bottom:0"><a href="{{ route('auth.password.request.form') }}" type="submit">Forgot your password?</a></p>-->
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
