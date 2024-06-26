<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ getStorageImage(config('settings.site_logo'),false,'logo') }}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{ getStorageImage(config('settings.wide_site_logo'),false,'wide_logo') }}" alt="" height="17">
                                </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ getStorageImage(config('settings.site_logo'),false,'logo') }}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{ getStorageImage(config('settings.wide_site_logo'),false,'wide_logo') }}" class="w-100" alt="" height="60">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">
   

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{ __('Search ...') }}"
                                       aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-lg-inline-block">
                <button type="button" id="clearbtn" class="btn btn-outline-secondary border-danger border-3 header-item noti-icon waves-effect" data-bs-toggle="Cache Clear">
                    <i class="mdi mdi-refresh text-danger"></i>
                </button>
            </div>

            <div class="dropdown d-none d-md-block ms-2">
                <button type="button" class="btn header-item waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="me-2" src="{{ config('app.locale') == 'en' ? asset('images/flags/us_flag.jpg') : asset('images/flags/bd_flag.jpg') }}" alt="Header Language" height="16"> {{ config('app.locale') == 'en' ? __('English') : __('Bangla') }} <span class="mdi mdi-chevron-down"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <img src="{{ asset('images/flags/us_flag.jpg')}}" alt="flag-image" class="me-1" height="12"> <span class="align-middle"> {{ __('English')}} </span>
                    </a>

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <img src="{{ asset('images/flags/bd_flag.jpg') }}" alt="flag-image" class="me-1" height="12"> <span class="align-middle"> {{__('Bangla')}} </span>
                    </a>

                </div>
            </div>

            <div class="dropdown d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ auth()?->user()?->avatar_url }}"
                         alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> {{ __('Profile')}}</a>
                    <div class="dropdown-divider"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a onclick="event.preventDefault();
                                        this.closest('form').submit();"
                           class="dropdown-item text-danger"
                           href="javascript:void(0)">
                            <i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i>
                            {{ __('Logout')}}
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
@push('script')
    <script type="text/javascript">
        //on doc ready
        $(document).ready(function () {
            //on click of the button
            $('#clearbtn').click(function () {
                //clear the input
                window.location.href = "{{ url('ic-terminall/cache-clear') }}";
            });
        });

    </script>
@endpush
