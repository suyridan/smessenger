@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-center">
        <b-col cols="8">
            <b-card title="{{ __('Login') }}">
                <p class="card-text">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf


                        <b-form-group
                            label="Correo electrónico"
                            label-for="email"
                            description="ingresa tu correo"
                        >
                            <b-form-input 
                            id="email" 
                            name="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            value="{{ old('email') }}" required autofocus
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="{{ __('Contraseña') }}"
                            label-for="password"
                            description="Msinimo 6 caracteres"
                        >
                            <b-form-input 
                            id="password" 
                            type="password"
                            name="password"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            value="{{ old('password') }}" required
                            ></b-form-input>
                        </b-form-group>

                        <b-form-checkbox
                        name="remember"
                        {{ old('remember') ? 'checked="true"' : '' }}>
                            {{ __('Recordarme') }}
                        </b-form-checkbox>



                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </p>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
