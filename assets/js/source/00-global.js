(function (){
    "use strict";

/*
 * Header
 */
    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById('toggle').addEventListener('click', function(){
            document.body.classList.toggle('menu-active');
        });
    });

/**
 *  Slide to section on anchor
 */
    document.addEventListener("DOMContentLoaded", function(){

        if ( document.querySelectorAll('a[href^="#slide-"]').length>0 ){
            [].forEach.call(document.querySelectorAll('a[href^="#slide-"]'), function(item){
                item.addEventListener('click', function(){
                    event.preventDefault();

                    if ( document.getElementById( item.getAttribute('href').replace('#', '') ) ){
                        let targetId = item.getAttribute('href').replace('#', '');
                        let targetOffsetTop = document.getElementById(targetId).getBoundingClientRect().top - document.getElementById('header').offsetHeight;

                        if ( document.querySelectorAll('#wpadminbar').length>0 ){
                            targetOffsetTop -= document.getElementById('wpadminbar').offsetHeight;
                        }

                        window.scroll({
                            top: targetOffsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        }
    });

})();