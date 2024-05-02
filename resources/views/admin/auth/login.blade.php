<x-admin.guest-layout>
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card overflow-hidden">
            <x-admin.auth.header title="Hadi"/>

            <div class="card-body p-4">
                <div class="p-3">
                  <x-form class="mt-4" method="POST" action="{{ route('login') }}">
                    <test-component></test-component>
                  </x-form>
                    <form class="mt-4" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="email">{{ __('Email')}}</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" placeholder="{{__('Enter email')}}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="userpassword">{{ __('Password')}}</label>
                            <input type="password" name="password" required class="form-control" id="userpassword" placeholder="{{__('Enter password')}}">
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="customControlInline">
                                    <label class="form-check-label" for="customControlInline">{{__('Remember me')}}</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-end">
                              <x-primary-button >
                                {{ __('Log in') }}
                            </x-primary-button>
                            </div>
                        </div>

                        @if(Route::has('password.request'))
                            <div class="mt-2 mb-0 row">
                                <div class="col-12 mt-4">
                                    <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        @endif

                    </form>

                </div>
            </div>

        </div>

        <x-admin.auth.login_footer />


    </div>
</div>
</x-admin.guest-layout>
