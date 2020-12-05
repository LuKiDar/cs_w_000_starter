(function (){
    "use strict";

/*
 * Header
 */
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('toggle').addEventListener('click', function(){
            document.body.classList.toggle('menu-active');
        });
    });

})();