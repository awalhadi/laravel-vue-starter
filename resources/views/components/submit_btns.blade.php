@props([
    'submit_btn_txt' => 'Submit',
    'cancel_btn_txt' => 'Cancel',
    'cancel_url' => route('dashboard'),
])
<div class="form-group">
    <div>
        <button class="btn btn-primary waves-effect waves-lightml-2 ic_mr-2" type="submit">
            <i class="fa fa-save"></i> {{ __($submit_btn_txt) }}
        </button>
        <a class="btn btn-danger waves-effect" href="{{ $cancel_url }}">
            <i class="fa fa-times"></i> {{ __('Cancel') }}
        </a>
    </div>
</div>
