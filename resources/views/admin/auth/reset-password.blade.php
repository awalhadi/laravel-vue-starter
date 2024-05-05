<x-admin.guest-layout>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card overflow-hidden">
                <x-admin.auth.header title="Forgot Password" />

                <div class="p-3">
                    <div class="card-body p-2">

                        <x-form class="mt-4" method="POST" action="{{ route('password.store') }}">

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-4 text-sm fw-light">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                    autofocus autocomplete="username" placeholder="{{ __('Enter email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" type="password" name="password" required
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="d-flex align-items-center justify-content-end mt-4">
                                <x-primary-button>
                                    {{ __('Reset Password') }}
                                </x-primary-button>
                            </div>

                            <div class="mt-2 mb-0 row">
                                <div class="col-12 mt-4">
                                    <a href="{{ route('login') }}"><i class="mdi mdi-lock"></i>
                                        {{ __('Back to login') }}</a>
                                </div>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
            <x-admin.auth.login_footer />
        </div>
    </div>
</x-admin.guest-layout>
