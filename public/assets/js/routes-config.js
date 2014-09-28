'use strict';
(function(){


    function config ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: '/assets/js/dashboard/templates/dash.html',
                controller: 'DashCtrl',
                controllerAs: 'vm',
                resolve: {
                    // resolve here
                }
            });
    }

    function run($httpBackend) {

        //Mocked data
        var foo = [
            { name: "Foo", email: "foo@bar" },
            { name: "Bar", email: "bar@foo" }
        ];

        $httpBackend.whenGET('/api/v1/foo').respond(
            200, { message: "You foo data", data: foo }
        );
        $httpBackend.whenGET(/^\/assets\//).passThrough();
    }

    angular
        .module('app')
        .run(run)
        .config(config);
})();