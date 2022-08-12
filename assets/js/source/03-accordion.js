(function (){
    "use strict";

/**
 * Accordion
 */
    document.addEventListener("DOMContentLoaded", function(){
        if ( document.getElementsByClassName('accordion').length>0 ){
            [].forEach.call(document.querySelectorAll('.accordion__header'), function(item){
                item.addEventListener('click', function(){
                    let currentItem = event.target;

                    if ( !currentItem.classList.contains('accordion__header') ){
                        currentItem = currentItem.closest('.accordion__header');
                    }

                    let currentContent = currentItem.nextElementSibling;

                    currentItem.classList.toggle('is-active');
                    if ( !currentContent.classList.contains('is-active') ){
                        currentContent.classList.add('is-active');
                        currentContent.style.maxHeight = currentContent.scrollHeight + 'px';
                    } else {
                        currentContent.classList.remove('is-active');
                        currentContent.style.maxHeight = null;
                    }
                });
            });
        }
    });

})();