'use strict';
(function(){

    function Noty() {
        return function(text, type, dismiss, killer, timeout) {
            var dismiss = dismiss || false;
            var killer  = killer  || true;
            var timeout = timeout || false;
            noty({text: text, type: type, dismissQueue: dismiss, killer: killer, timeout: timeout,
                animation: {
                    open: {height: 'toggle'},
                    close: {height: 'toggle'},
                    easing: 'swing',
                    speed: 500
                }
            });
        }
    };

    angular
        .module('app')
        .factory('Noty', Noty);
})();