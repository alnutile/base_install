(function(){
    'use strict';
    function config ($routeProvider, RestangularProvider) {
        /**
         * ControllerAs is key
         */
        $routeProvider
            .when('/', {
                templateUrl: '/assets/js/dashboard/templates/dash.html',
                controller: 'DashCtrl',
                controllerAs: 'vm',
                resolve: {
                    // resolve here
                }
            });

        /**
         * Restangular needs to know where the data is stored at on the
         * returning Response object
         */
        RestangularProvider.addResponseInterceptor(
            function(data, operation, what, url, response, deferred) {
                var extractedData;
                extractedData = data;
                console.log(data);
                return extractedData;
            }
        );
    }

    function run($httpBackend, GeneratedJson) {
        var vm = this;
        console.log(GeneratedJson);
        //Mocked data

        $httpBackend.whenGET('/api/v1/foo').respond(
            200, { message: "Your foo data", data: GeneratedJson.foo() }
        );

        /**
         * This is how you can pass through real requests and routes
         * In this case the first one is the request made to the template
         * files. But any GET, POST etc request can be passThrough to the
         * the real backend.
         */
        $httpBackend.whenGET(/^\/assets\//).passThrough();

    }

    angular
        .module('app')
        .run(run)
        .config(config);
})();