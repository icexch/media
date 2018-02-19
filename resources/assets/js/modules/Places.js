export default class Places {
    constructor() {
        this.initShowAreaScriptButton();
    }

    initShowAreaScriptButton() {
        $('.areaScript-button').on('click', function () {
            alert($(this).children('div').text().trim());
        });
    }
}
