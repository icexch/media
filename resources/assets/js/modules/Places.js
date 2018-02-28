export default class Places {
    constructor() {
        this.initShowAreaScriptButton();
    }

    initShowAreaScriptButton() {
        let scriptVal = $('.area-js-text').val();

        $('.popup-link').on('click', function () {
            let placeId = $(this).data('place-id');
            let text = `<ins class='area-ad' data-area-ad-client=${placeId}></ins>`;

            $('.area-js-text').text(text+scriptVal);
        });
    }
}
