export default class AdMaterialCreate {
    constructor() {
        this.initSelect();
    }

    initSelect() {
        let inputs = {
            IMG : $('input[name=source]'),
            HTML  : $('textarea[name=source]')
        };

        $('.js-form-tab-link').on('click', function() {
            let type = $(this).data('linked-value');

            for(let input in inputs) {
                inputs[input].prop("disabled", true);
            }

            inputs[type].prop("disabled", false);
        });
    }
}
