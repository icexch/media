export default class AdMaterialCreate {
    constructor() {
        this.initSelect();
    }

    initSelect() {
        let types = {
            html: $(`.js-input-html`),
            img: $(`.js-input-img`)
        };

        $('.js-select-type').on('change', function () {
            let type = _.lowerCase($(this).val()),
                $container = types[type],
                $previousContainer = type === 'html' ? types.img : types.html;

            console.log($container.children('.js-source'));

            $container.removeClass('hidden');
            $container.find('.js-source').attr('name', 'source');

            $previousContainer.addClass('hidden');
            $previousContainer.find('.js-source').removeAttr('name');
        });
    }
}
