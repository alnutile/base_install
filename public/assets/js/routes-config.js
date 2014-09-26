'use strict';
(function(){

    function config ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: '/assets/js/dashboard/templates/dash.html',
                controller: 'DashCtrl',
                resolve: {
                    // resolve here
                }
            });
    }

    angular
        .module('app')
        .config(config);
})();