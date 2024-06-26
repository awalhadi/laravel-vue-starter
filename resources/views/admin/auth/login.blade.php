<x-admin.guest-layout>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card overflow-hidden">
                <x-admin.auth.header title="Login" />

                <div class="card-body p-2">
                    <div class="p-3">
                        <x-form class="mt-4" method="POST" action="{{ route('login') }}">

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                    autofocus autocomplete="username" placeholder="{{ __('Enter email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="userpassword" :value="__('Password')" />

                                <x-text-input id="userpassword" type="password" name="password"
                                    placeholder="{{ __('Enter password') }}" required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="mt-4 row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input"
                                            id="customControlInline">
                                        <label class="form-check-label"
                                            for="customControlInline">{{ __('Remember me') }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <x-primary-button>
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> Forgot
                                            your password?</a>
                                    </div>
                                </div>
                            @endif
                        </x-form>
                    </div>
                </div>
            </div>
            <x-admin.auth.login_footer />
        </div>
    </div>
</x-admin.guest-layout>
