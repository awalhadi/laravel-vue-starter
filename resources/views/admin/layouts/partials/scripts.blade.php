<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script defer src="https://unpkg.com/metismenu@3.0.7/dist/metisMenu.min.js"></script>
<script defer src="libs/simplebar/simplebar.min.js"></script>
@stack('topscript')

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js" type="application/javascript"></script>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script defer src="assets/js/select2.full.min.js"></script>
<script defer src="assets/sweetalert/sweetalert.min.js"></script>


<script defer defer src="{{ asset('assets/js/app.js') }}"></script>
<script defer src="{{ asset('assets/js/custom-dev.js') }}"></script>
@vite('resources/js/app.js')
@stack('script')

<script>
    $(document).ready(function() {
        $('#loadingState').hide()
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
    });

    @if (Session::has('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

@include('common.toggle-status-update')
