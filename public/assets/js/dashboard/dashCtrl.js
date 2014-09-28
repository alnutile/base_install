(function(){
    'use strict';
    /**
     *
     * @param vm
     * @param $modalInstance
     * @param item <--this is what I send to it via the Controller that owns the page. I can send numerous objects
     * @constructor
     */
    function UserModalCtrl($modalInstance, item) {
        var vm = this;
        console.log(item);
        vm.item     = item;
        vm.ok       = ok;
        vm.cancel   = cancel;

        /////
        function ok() {
            $modalInstance.close(vm.item);
        }

        function cancel() {
            $modalInstance.dismiss('cancel');
        }
    }

    function DashCtrl (DataService, Noty, $timeout, UsersService, $modal) {
        var vm              = this;
        vm.Noty             = Noty;
        vm.$modal           = $modal;
        vm.DataService      = DataService;
        vm.UsersService     = UsersService;
        vm.data             = {};
        vm.activate         = activate;
        vm.getFoo           = getFoo;
        vm.getUsersApi      = getUsersApi;
        vm.getUsers         = getUsers;
        vm.seeModal         = seeModal;

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
                vm.Noty("Getting Foo in 2 seconds", 'info');
                $timeout(function(){
                    vm.Noty(vm.rest.message + " (this will go away in 2 seconds)", "success", false, true, 2000)
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
            vm.Noty("Getting Users from Backend", "info", false, true, 3000);
            return getUsersApi().then(function(){
                vm.Noty(vm.rest2.message, "success", false, true, 3000);
            });
        }

        /**
         * This is the promise for getting users
         */
        function getUsersApi() {
            return vm.UsersService.index().then(function(data){
                vm.rest2     = data;
                vm.users    = vm.rest2.data;
                vm.message  = vm.rest2.message;
            });
        }

        /**
         * Example of calling to a modal
         * See http://angular-ui.github.io/bootstrap/ Modal for more info
         */
        function seeModal(item_to_show_in_modal) {
            var modalInstance = vm.$modal.open({
                templateUrl: '/assets/js/dashboard/templates/_modal_window.html',
                controller: 'UserModalCtrl',
                controllerAs: 'vm',
                size: 'lg',
                resolve: {
                    item: function()
                    {
                        return item_to_show_in_modal; //could send to it scope and more here
                    }
                }
            });

            modalInstance.result.then(function(item){
               vm.Noty("Modal closed now the updatedItem happens to be updated here in scope of this controller!", "success", false, true, 3000);
               vm.updatedItem = item;
            }, function(){
                vm.Noty("You canceled the modal :(", "success", false, true, 3000);
            });
        }
    }

    angular
        .module('app')
        .controller('DashCtrl', DashCtrl)
        .controller('UserModalCtrl', UserModalCtrl);
})();