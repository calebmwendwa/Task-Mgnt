@extends('layouts.auth')
@section('title', __('lang_v1.login'))

@section('content')
    <h3 class="auth-text-heading">Login to your account</h3>
     <div class="login-layout">


         <form method="POST" action="{{ route('login') }}">
             @csrf

             <div class="input-wrapper">
                 <label for="email" >{{ __('Email Address') }}</label>


                     <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                     @error('email')
                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror

             </div>

             <div class="input-wrapper">
                 <label for="password">{{ __('Password') }}</label>
                 <input id="password" type="password"  name="password" required autocomplete="current-password">
                    @error('password')
                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror

             </div>


{{--                     @if (Route::has('password.request'))--}}
{{--                         <a class="btn btn-link forget-password" href="{{ route('password.request') }}">--}}
{{--                             {{ __('Forgot Your Password?') }}--}}
{{--                         </a>--}}
{{--                     @endif--}}


             <div class="button-wrapper">

                     <button type="submit" class="btn btn-primary">
                         {{ __('Login') }}
                     </button>



             </div>
         </form>

     </div>
    <div class="form-footer">
    </div>




@stop
@section('javascript')
    <script type="text/javascript">

        const show_pw_btn = document.querySelector('#show-password');
        const show_pw_icon = show_pw_btn.querySelector('img');
        const pw_input = document.querySelector('#password')

        show_pw_btn.addEventListener('click', () =>{
            pw_input.type = pw_input.type === 'password'
                ? 'text'
                : 'password'

            show_pw_icon.src = show_pw_icon.src.includes('open')
                ? 'img/icons/eye.png'
                : 'img/icons/eye_close.png'
        })
    </script>
@endsection
