(function(){
    'use strict';

    function DashCtrl (DataService, Noty, $timeout, UsersService) {
        var vm              = this;
        vm.Noty             = Noty;
        vm.DataService      = DataService;
        vm.UsersService     = UsersService;
        vm.data             = {};
        vm.activate         = activate;
        vm.getFoo           = getFoo;
        vm.getUsers         = getUsers;
        vm.rest             = vm.DataService.foo();

        activate();

        /**
         * Activate is defined clearly in one place so
         * the developers know when this takes place.
         *
         * In this case it is making our request to the REST API (mocked for this one)
         * @returns {*}
         */
        function activate() {
            return getFoo().then(function(){
                vm.Noty("Getting Foo in 3 seconds", 'info');
                $timeout(function(){
                    vm.Noty(vm.rest.message + " (this will go away in 3 seconds)", "success", false, true, 3000)
                }, 3000);
            });
        }

        /**
         * Using our Service to get a promise we resolve the
         * promise here.
         * @returns {*}
         */
        function getFoo() {
            return vm.DataService.foo().then(function(data){
                vm.rest     = data;
                vm.model    = vm.rest.data;
                vm.message  = vm.rest.message;
            });
        }

        /**
         * This is to show a good example of
         * 1. Pagination
         * 2. PHP Design Pattern Controller -> Service -> Repository
         */
        function getUsers() {
            vm.Noty("Getting Users from Backend", "info");
            return getUsersApi().then(function(){
                vm.Noty(vm.rest.message, "success");
            });
        }

        /**
         * This is the promise for getting users
         */
        function getUsersApi() {
            return vm.UsersService.index().then(function(data){
                vm.rest     = data;
                vm.model    = vm.rest.data;
                vm.message  = vm.rest.message;
            });
        }
    }

    angular
        .module('app')
        .controller('DashCtrl', DashCtrl);
})();