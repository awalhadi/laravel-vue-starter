<!-- External Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js')}}"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js" type="application/javascript"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script defer src="assets/js/select2.full.min.js"></script>
<script defer src="assets/sweetalert/sweetalert.min.js"></script>


<!-- Inline Scripts -->
<script>
  // Document ready function and initialization of toastr
  $(document).ready(function() {
      $('#loadingState').hide();
      toastr.options = {
          "closeButton": true,
          "progressBar": true
      };
  });

  // Display toastr messages for various sessions and errors
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

<!-- Vite Integration -->
@vite('resources/js/app.js')

<!-- Custom Scripts -->
<script defer src="{{ asset('assets/js/app.js') }}"></script>
<script defer src="{{ asset('assets/js/custom-dev.js') }}"></script>

<!-- Stack Scripts -->
@stack('topscript')
@stack('script')

<!-- Include Toggle Status Update -->
@include('common.toggle-status-update')
