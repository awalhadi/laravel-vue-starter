<x-admin.guest-layout>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card overflow-hidden">
                <x-admin.auth.header title="Confirm Password" />

                <div class="p-3">
                    <div class="card-body p-2">

                        <x-form class="mt-4" method="POST" action="{{ route('password.confirm') }}">


                            <div class="mb-4 text-sm fw-light">
                                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                            </div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Password -->
                            <div>
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" type="password" name="password" required
                                    autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <x-primary-button>
                                    {{ __('Confirm') }}
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
