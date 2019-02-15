@extends('layouts.app')

@section('content')
<b-container class="py-4">
    <b-row class="justify-content-center">
        <b-col cols="8">
            <b-card title="{{ __('Login') }}">
                <p class="card-text">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <b-alert show variant="danger">
                                {{ $error }}
                            </b-alert>                            
                        @endforeach
                    @endif
                    
                    <b-form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        <b-form-group
                            label="Correo electrónico"
                            label-for="email"
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
                        >
                            <b-form-input 
                            id="password" 
                            type="password"
                            name="password"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            value="{{ old('password') }}" required
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group>
                            <b-form-checkbox
                            id="remember"
                            name="remember"
                            {{ old('remember') ? 'checked="true"' : '' }}>
                                {{ __('Recordarme') }}
                            </b-form-checkbox>
                        </b-form-group>

                        <b-button
                        type="submit"
                        variant="primary">
                            Ingresar
                        </b-button>
                        @if (Route::has('password.request'))
                            <b-button
                            variant="link" 
                            href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </b-button>
                        @endif
                    </b-form>
                </p>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
