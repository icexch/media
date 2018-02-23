<div class="popup-box">
    <div class="popup-box__wrap box-modal" id="exampleModal">
        <a href="#" class="popup-box__close box-modal_close arcticmodal-close">
            <span class="popup-box__close-line"></span>
            <span class="popup-box__close-line"></span>
        </a>
        <h3 class="popup-box__title">Code for embded</h3>
        <p class="popup-box__text">
            Some text, as described how to do it. Some text, as described how to do it.
            Some text, as described how to do it. Some text, as described how to do it.
            Some text, as described how to do it.
        </p>
        <div class="form__input-container form__input-container_pop-up-block">
            <div class="form__input-holder">
                <textarea readonly cols="30" rows="10" class="form__textarea form__textarea_black area-js-text">
{{ "<script async defer src=" . env('APP_URL') . "/js/area.js". "></script>" }}
                </textarea>
            </div>
        </div>
        <div class="popup-box__button">
            <button class="btn btn_block" id="close-pop-up">ok</button>
        </div>
    </div>
</div>