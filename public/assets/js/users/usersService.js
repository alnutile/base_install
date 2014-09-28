(function(){

    'use strict';
    /**
     *
     * Note the methods match the controller method I am calling
     *
     * https://github.com/johnpapa/angularjs-styleguide#data-services
     * @param Restangular
     * @constructor
     */
    function UsersService (Restangular) {
        return {
            index: index
        };

        function index() {
            return Restangular.one('api/v1/users').get().then(
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
        .factory('UsersService', UsersService);
})();