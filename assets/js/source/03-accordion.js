(function (){
    "use strict";

/**
 * Accordion
 */
    function accordionToggle(event){
        let currentItem = event.target;

        if ( currentItem!==document ){
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
        }
    }

    document.addEventListener("DOMContentLoaded", function(){
        if ( document.getElementsByClassName('accordion').length>0 ){
            [].forEach.call(document.querySelectorAll('.accordion__header'), function(item){
                // Open on click
                item.addEventListener('click', function(event){
                    accordionToggle(event);
                });

                // Open on pressing enter or space (for accessibility)
                item.addEventListener('keydown', function(event){
                    if ( event.keyCode===13 || event.keyCode===32 ){
                        accordionToggle(event);
                    }
                });
            });
        }
    });

})();