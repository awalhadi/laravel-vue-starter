<x-admin.guest-layout>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card overflow-hidden">
                <x-admin.auth.header title="Login" />

                <div class="card-body p-2">
                    <div class="p-3">
                        <x-form class="mt-4" method="POST" action="{{ route('login') }}">

                            <!-- First name -->
                            <div>
                                <x-input-label for="first_name" :value="__('First name')" />
                                <x-text-input id="first_name" type="first_name" name="first_name" :value="old('first_name')"
                                    required autofocus autocomplete="first_name"
                                    placeholder="{{ __('Enter first name') }}" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <!-- Last name -->
                            <div class="mt-4">
                                <x-input-label for="last_name" :value="__('Last name')" />
                                <x-text-input id="last_name" type="last_name" name="last_name" :value="old('last_name')"
                                    required autofocus autocomplete="last_name"
                                    placeholder="{{ __('Enter last name') }}" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
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



                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="mt-4 row">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6 text-end">
                                    <x-primary-button>
                                      {{ __('Register') }}
                                    </x-primary-button>
                                </div>
                            </div>

                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="{{ route('login') }}"><i class="mdi mdi-lock"></i>  {{ __('Already registered?') }}</a>
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
