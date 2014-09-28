(function(){
    'use strict';
    /**
     * https://github.com/johnpapa/angularjs-styleguide#data-services
     * @param Restangular
     * @constructor
     */
    function DataService (Restangular) {
        return {
            foo: foo
        };

        function foo() {
            return Restangular.one('api/v1/foo').get().then(
                success,
                fail
            );
        };

        function success(response) {
            return response;
        };

        function fail(response) {
            return response;
        }
    }

    angular
        .module('app')
        .factory('DataService', DataService);
})();