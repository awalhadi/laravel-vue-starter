<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">{{ getPageMeta('title') }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ getPageMeta('title') }}</li>
            </ol>
        </div>
        @php($backButtonURl = backButtonURl())
        @if($backButtonURl)
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <a href="{{ $backButtonURl }}" class="btn btn-sm btn-dark"> <i class="ti-arrow-left"></i> {{ __('Back') }} </a>
            </div>
        </div>
        @endif
    </div>
</div>
