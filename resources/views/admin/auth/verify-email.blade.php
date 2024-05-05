<x-admin.guest-layout>
  <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card overflow-hidden">
              <x-admin.auth.header title="Forgot Password" />

                  <div class="p-3">
                    <div class="card-body p-2">
                      
                      <x-form class="mt-4" method="POST" action="{{ route('verification.send') }}">

                        <div class="mb-4 text-sm text-gray-600">
                          {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                      </div>
                  
                      @if (session('status') == 'verification-link-sent')
                          <div class="mb-4 font-medium text-sm text-green-600">
                              {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                          </div>
                      @endif
                  
                      <!-- Session Status -->
                      {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                          <!-- Email Address -->
                          <div>
                              <x-input-label for="email" :value="__('Email')" />
                              <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                  autofocus autocomplete="username" placeholder="{{ __('Enter email') }}" />
                              <x-input-error :messages="$errors->get('email')" class="mt-2" />
                          </div>

                          <div class="d-flex align-items-center justify-content-end mt-4">
                            <x-primary-button>
                              {{ __('Resend Verification Email') }}
                            </x-primary-button>
                        </div>

                              <div class="mt-2 mb-0 row">
                                  <div class="col-12 mt-4">
                                      <a href="{{ route('login') }}"><i class="mdi mdi-lock"></i> {{ __('Back to login') }}</a>
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
