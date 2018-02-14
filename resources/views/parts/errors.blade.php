@if (!empty($errors->all()))
    <div class="guest-form__line">
        <div class="guest-form__line-title-wrap"></div>
        <div class="guest-form__input-holder" style="border-radius:4px; color:red; padding:5px; background: rgba(255,255,255,0.2); line-height: 23px">
            @foreach($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    </div>
@endif