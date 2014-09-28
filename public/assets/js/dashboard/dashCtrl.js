'use strict';
(function(){

    function DashCtrl (DataService) {
        var vm = this;
        vm.DataService = DataService;
        vm.data = vm.DataService.foo();
        console.log(vm.datad);
    }

    angular
        .module('app')
        .controller('DashCtrl', DashCtrl);
})();