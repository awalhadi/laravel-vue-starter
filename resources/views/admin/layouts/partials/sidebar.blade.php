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
                @canany(['User', 'Role'])
                    <li class="{{ isActiveRoute(['roles', 'users']) }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa fa-user-tie"></i>
                            <span>{{ __('Administration') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li class="{{ isActiveRoute('roles') }} ">
                                <a href="{{ route('roles.index') }}">{{ __('Roles') }}</a>
                            </li>
                            <li class="{{ isActiveRoute('users') }}">
                                <a href="{{ route('users.index') }}">{{ __('Users') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcanany
                @can('Student')
                    <li class="{{ isActiveRoute('students') }}">
                        <a href="{{ route('students.index') }}" class="waves-effect">
                            <i class="ti-user"></i>
                            <span>{{ __('Students') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Instructor')
                    <li class="{{ isActiveRoute('instructors') }}">
                        <a href="{{ route('instructors.index') }}" class="waves-effect">
                            <i class="fa fa-user-tie"></i>
                            <span>{{ __('Instructors') }}</span>
                        </a>
                    </li>
                @endcan
                @canany(['Course Category', 'Course'])
                    <li class="{{ isActiveRoute(['course-categories', 'courses']) }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-book"></i>
                            <span>{{ __('Course') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->can('Course Category'))
                                <li class="{{ isActiveRoute('course-categories') }}">
                                    <a href="{{ route('course-categories.index') }}">{{ __('Categories') }}</a>
                                </li>
                            @endif
                            @if (auth()->user()->can('Course'))
                                <li class="{{ isActiveRoute('courses') }}">
                                    <a href="{{ route('courses.index') }}">
                                        {{ __('Courses') }}
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endcanany
                @if (auth()->user()->can('Ged'))
                    <li class="{{ isActiveRoute(['ged-courses']) }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-book"></i>
                            <span>{{ __('GED') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->can('List Ged'))
                                <li class="{{ isActiveRoute('ged-courses') }}">
                                    <a href="{{ route('ged-courses.index') }}">
                                        {{ __('GED Courses') }}
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('List Ged'))
                                <li class="{{ isActiveRoute('ged-exams') }}">
                                    <a href="{{ route('ged-exams.index') }}">
                                        {{ __('Ged Exam') }}
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can('List Ged Exam Result'))
                                <li class="{{ isActiveRoute('ged-exams.results') }}">
                                    <a href="{{ route('ged-exams.results') }}">
                                        {{ __('Ged Exam Results') }}
                                    </a>
                                </li>
                            @endif
                            <li class="{{ isActiveRoute('ged-exams.incompleted') }}">
                                <a href="{{ route('ged-exams.incompleted') }}">
                                    {{ __('Incomplete GED Exams') }}
                                </a>
                            </li>

                            @if (auth()->user()->can(['Ged']))
                                <li class="{{ isActiveRoute('course/settings') }}">
                                    <a href="{{ route('ged.settings') }}">
                                        {{ __('Ged Settings') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->can('Course'))
                    <li class="{{ isActiveRoute(['featured.courses']) }}">
                        <a href="{{ route('featured.courses') }}"
                            class="waves-effect {{ Route::is('featured.courses') ? 'active' : '' }}">
                            <i class="ti-bookmark"></i>
                            <span>{{ __('Featured Course') }}</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('Student Resource'))
                    <li class="{{ isActiveRoute(['featured.courses']) }}">
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ti-bookmark"></i>
                          <span>{{ __('Resource') }}</span>
                      </a>


                      <ul class="sub-menu" aria-expanded="true">
                        @if (auth()->user()->can('List Student Resource'))

                              <li class="{{ isActiveRoute('resource-categories') }}">
                                  <a href="{{ route('resource-categories.index') }}">
                                      {{ __('Resource Category') }}
                                  </a>
                              </li>
                          @endif
                      </ul>
                    </li>
                @endif

                {{-- exam section --}}
                @can('Exam')
                    <li>
                        <a href="{{ route('exam-books.index') }}"
                            class="waves-effect {{ isActiveRoute('exam-books') }}">
                            <i class="ti-shopping-cart"></i>
                            <span>{{ __('Exam') }}</span>
                        </a>
                    </li>
                @endcan


                {{-- blog section --}}
                @if (auth()->user()->can('Blog'))
                  <li class="{{ isActiveRoute('blog-categories') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-rss"></i>
                        <span>{{ __('Blog') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        @if (auth()->user()->can('List Blog Category'))

                            <li class="{{ isActiveRoute('blog-categories') }}">
                                <a href="{{ route('blog-categories.index') }}">
                                    {{ __('Blog Category') }}
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('List Blog'))

                            <li class="{{ isActiveRoute('blog-posts') }}">
                                <a href="{{ route('blog-posts.index') }}">
                                    {{ __('Blog Post') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                  </li>
                @endif

                {{-- @if (auth()->user()->can('Ged Exam'))
                    <li class="{{ isActiveRoute('ged-exams') }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-book"></i>
                            <span>{{ __('GED Exam') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->can('List Ged Exam'))
                                <li class="{{ isActiveRoute('ged-exams') }}">
                                    <a href="{{ route('ged-exams.index') }}">
                                        {{ __('Ged Exam') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif --}}

                @can('Purchase History')
                    <li>
                        <a href="{{ route('purchase.history') }}"
                            class="waves-effect {{ isActiveRoute('purchase.history') }}">
                            <i class="ti-shopping-cart"></i>
                            <span>{{ __('Purchase History') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Faq')
                    <li>
                        <a href="{{ route('faqs.index') }}"
                            class="waves-effect {{ Route::is('faqs.index') ? 'active' : '' }}">
                            <i class="ti-help"></i>
                            <span>{{ __('Faqs') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Course Feedback')
                    <li>
                        <a href="{{ route('course-feedbacks.index') }}"
                            class="waves-effect {{ isActiveRoute('course-feedbacks') }}">
                            <i class="ti-thought"></i>
                            <span>{{ __('Course Feedback') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Review')
                    <li>
                        <a href="{{ route('reviews.index') }}"
                            class="waves-effect {{ isActiveRoute('course-feedbacks') }}">
                            <i class="ti-thought"></i>
                            <span>{{ __('Review') }}</span>
                        </a>
                    </li>
                @endcan
                @canany(['Languages'])
                    {{--                @can('Language List') --}}
                    {{--                <li> --}}
                    {{--                    <a href="{{ route('languages.index') }}" --}}
                    {{--                       class="waves-effect {{ isActiveRoute('languages.index') }}"> --}}
                    {{--                        <i class="fa fa-globe"></i> --}}
                    {{--                        <span>{{ __('Languages') }}</span> --}}
                    {{--                    </a> --}}
                    {{--                </li> --}}
                    {{--                @endcan --}}
                    @can('Translation')
                        <li>
                            <a href="{{ route('languages.translations.index', config('app.locale')) }}"
                                class="waves-effect {{ isActiveRoute('languages.index') }}">
                                <i class="fa fa-language"></i>
                                <span>{{ __('Translations') }}</span>
                            </a>
                        </li>
                    @endcan
                @endcanany
                @can('Settings')
                    <li class="{{ isActiveRoute(['course-categories', 'courses']) }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-book"></i>
                            <span>{{ __('Site Settings') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li class="{{ isActiveRoute('settings') }}">
                                <a href="{{ route('settings.mail') }}">{{ __('Mail Settings') }}</a>
                            </li>
                            <li class="{{ isActiveRoute('pages') }}">
                                <a href="{{ route('pages.index') }}">{{ __('Pages') }}</a>
                            </li>
                            <li class="{{ isActiveRoute('widgets') }}">
                                <a href="{{ route('widgets.index') }}">{{ __('Widgets') }}</a>
                            </li>
                            <li class="{{ isActiveRoute('partners') }}">
                                <a href="{{ route('partners.index') }}">{{ __('Partner') }}</a>
                            </li>
                            <li class="{{ isActiveRoute('sliders') }}">
                                <a href="{{ route('sliders.index') }}">{{ __('Slider') }}</a>
                            </li>
                            @can('Edit Certificate')
                              <li class="{{ isActiveRoute('certificate-settings') }}">
                                  <a href="{{ route('certificate-settings.index') }}">{{ __('Certificate Settings') }}</a>
                              </li>
                            @endcan

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('settings.index') }}"
                            class="waves-effect {{ Route::is('settings.index') ? 'active' : '' }}">
                            <i class="ti-settings"></i>
                            <span>{{ __('Settings') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
