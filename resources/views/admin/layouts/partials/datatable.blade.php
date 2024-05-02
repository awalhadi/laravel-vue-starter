<div class="card">
  <div class="card-body">
      <div class="ic-datatable">
          {!! $dataTable->table(['class' => 'nowrap']) !!}
      </div>
  </div>
</div>


@push('style')
    @include('admin.layouts.partials.datatableCss')
@endpush
@push('script')
    @include('admin.layouts.partials.dataTablejs')
@endpush