(function (){
    "use strict";

/**
 * Accordion
 */
    document.addEventListener("DOMContentLoaded", function() {
        if ( document.getElementsByClassName('accordion').length>0 ){
            [].forEach.call(document.querySelectorAll('.accordion__header'), function(item){
                item.addEventListener('click', function(){
                    let currentItem = event.target;

                    if ( !currentItem.classList.contains('accordion__header') ){
                        currentItem = currentItem.closest('.accordion__header');
                    }

                    let currentContent = currentItem.nextElementSibling;

                    currentItem.classList.toggle('accordion__header--active');
                    if ( !currentContent.classList.contains('accordion__content--active') ){
                        currentContent.classList.add('accordion__content--active');
                        currentContent.style.maxHeight = currentContent.scrollHeight + 'px';
                    } else {
                        currentContent.classList.remove('accordion__content--active');
                        currentContent.style.maxHeight = null;
                    }
                });
            });
        }
    });

})();