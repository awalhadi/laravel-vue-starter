<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{--                <li class="menu-title">{{ __('Dashboard') }}</li> --}}
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="ti-dashboard"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>

                {{--                <li class="menu-title">{{ __('Main') }}</li> --}}
                {{-- @canany(['User', 'Role']) --}}
                <li class="{{ isActiveRoute(['roles', 'users']) }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-user-tie"></i>
                        <span>{{ __('Administration') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class="{{ isActiveRoute('roles') }} ">
                            <a href="#">{{ __('Roles') }}</a>
                        </li>
                        <li class="{{ isActiveRoute('users') }}">
                            <a href="#">{{ __('Users') }}</a>
                        </li>
                    </ul>
                </li>
                {{-- @endcanany --}}
                <li class="{{ isActiveRoute('students') }}">
                    <a href="#" class="waves-effect">
                        <i class="ti-user"></i>
                        <span>{{ __('Students') }}</span>
                    </a>
                </li>
                <li class="{{ isActiveRoute('instructors') }}">
                    <a href="#" class="waves-effect">
                        <i class="fa fa-user-tie"></i>
                        <span>{{ __('Instructors') }}</span>
                    </a>
                </li>
                <li class="{{ isActiveRoute(['course-categories', 'courses']) }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-book"></i>
                        <span>{{ __('Course') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class="{{ isActiveRoute('course-categories') }}">
                            <a href="#">{{ __('Categories') }}</a>
                        </li>
                        <li class="{{ isActiveRoute('courses') }}">
                            <a href="#">
                                {{ __('Courses') }}
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="{{ isActiveRoute(['ged-courses']) }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-book"></i>
                        <span>{{ __('GED') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class="{{ isActiveRoute('ged-courses') }}">
                            <a href="#">
                                {{ __('GED Courses') }}
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('ged-exams') }}">
                            <a href="#">
                                {{ __('Ged Exam') }}
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('ged-exams.results') }}">
                            <a href="#">
                                {{ __('Ged Exam Results') }}
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('ged-exams.incompleted') }}">
                            <a href="#">
                                {{ __('Incomplete GED Exams') }}
                            </a>
                        </li>

                        <li class="{{ isActiveRoute('course/settings') }}">
                            <a href="#">
                                {{ __('Ged Settings') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ isActiveRoute(['featured.courses']) }}">
                    <a href="#" class="waves-effect {{ Route::is('featured.courses') ? 'active' : '' }}">
                        <i class="ti-bookmark"></i>
                        <span>{{ __('Featured Course') }}</span>
                    </a>
                </li>
                <li class="{{ isActiveRoute(['featured.courses']) }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-bookmark"></i>
                        <span>{{ __('Resource') }}</span>
                    </a>


                    <ul class="sub-menu" aria-expanded="true">

                        <li class="{{ isActiveRoute('resource-categories') }}">
                            <a href="#">
                                {{ __('Resource Category') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="waves-effect {{ isActiveRoute('exam-books') }}">
                        <i class="ti-shopping-cart"></i>
                        <span>{{ __('Exam') }}</span>
                    </a>
                </li>


                <li class="{{ isActiveRoute('blog-categories') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-rss"></i>
                        <span>{{ __('Blog') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li class="{{ isActiveRoute('blog-categories') }}">
                            <a href="#">
                                {{ __('Blog Category') }}
                            </a>
                        </li>

                        <li class="{{ isActiveRoute('blog-posts') }}">
                            <a href="#">
                                {{ __('Blog Post') }}
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="" class="waves-effect {{ isActiveRoute('purchase.history') }}">
                        <i class="ti-shopping-cart"></i>
                        <span>{{ __('Purchase History') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect {{ Route::is('faqs.index') ? 'active' : '' }}">
                        <i class="ti-help"></i>
                        <span>{{ __('Faqs') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect {{ isActiveRoute('course-feedbacks') }}">
                        <i class="ti-thought"></i>
                        <span>{{ __('Course Feedback') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect {{ isActiveRoute('course-feedbacks') }}">
                        <i class="ti-thought"></i>
                        <span>{{ __('Review') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect {{ isActiveRoute('languages.index') }}">
                        <i class="fa fa-language"></i>
                        <span>{{ __('Translations') }}</span>
                    </a>
                </li>
                <li class="{{ isActiveRoute(['course-categories', 'courses']) }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-book"></i>
                        <span>{{ __('Site Settings') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class="{{ isActiveRoute('settings') }}">
                            <a href="#">{{ __('Mail Settings') }}</a>
                        </li>
                        <li class="{{ isActiveRoute('pages') }}">
                            <a href="#">{{ __('Pages') }}</a>
                        </li>
                        <li class="{{ isActiveRoute('widgets') }}">
                            <a href="#">{{ __('Widgets') }}</a>
                        </li>
                        <li class="{{ isActiveRoute('partners') }}">
                            <a href="#">{{ __('Partner') }}</a>
                        </li>
                        <li class="{{ isActiveRoute('sliders') }}">
                            <a href="#">{{ __('Slider') }}</a>
                        </li>
                        <li class="{{ isActiveRoute('certificate-settings') }}">
                            <a href="#">{{ __('Certificate Settings') }}</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect {{ Route::is('settings.index') ? 'active' : '' }}">
                        <i class="ti-settings"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
