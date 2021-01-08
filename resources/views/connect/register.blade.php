@extends('connect.master')

@section('title', 'Register')

@section('content')
<div class="box box_register shadow">
    <div class="header">
        <a href="{{ url('/') }}">
            <img src="{{ url('/static/images/logo.png') }}" alt="">
        </a>
    </div>
    <div class="inside">
        {!! Form::open(['url' => '/register', 'autocomplete' => 'off']) !!}
        <label for="name">Name:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="far fa-user"></i>
            </span>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <label for="lastName" class="mtop16">Last Name:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-user-tag"></i>
            </span>
            {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
        </div>
        <label for="email" class="mtop16">Email:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="far fa-envelope-open"></i>
            </span>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <label for="password" class="mtop16">Password:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <label for="cPassword" class="mtop16">Confirm Password:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>
            {!! Form::password('cPassword', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Sign in', ['class' => 'btn btn-success mtop16']) !!}
        {!! Form::close() !!}

        @if(Session::has('message'))
            <div class="container">
                <div class="mtop16 alert alert-{{ Session::get('typeAlert') }}" style="display:none">
                    {{ Session::get('message') }}
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <script>
                        $('.alert').slideDown();
                        setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                    </script>
                </div>
            </div>
        @endif

        <div class="footer mtop16">
            <a href="{{ url('/login') }}">Sign In</a>
        </div>
    </div>
</div>
@stop
