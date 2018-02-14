<script src="{{ mix('/js/main.min.js') }}"></script>
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{--@if (!empty($errors->all()))
    @foreach($errors->all() as $error)
        {!! Toastr::warning('test') !!}
    @endforeach
@endif--}}
{!! Toastr::warning('test') !!}
{!! Toastr::render() !!}
