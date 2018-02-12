class App {
    constructor() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        this.initModules();
    }

    initModules() {
        let modules = $('[data-module]');

        modules.each(function (key, element) {
            try {
                let moduleName = _.upperFirst(_.camelCase($(element).data().module));

                let module = require(`./modules/${moduleName}.js`);

                new module.default();
            } catch (e) {
                console.log(e);
            }
        });
    }
}

$(() => {
    new App();
});