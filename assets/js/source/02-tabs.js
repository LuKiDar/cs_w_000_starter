(function (){
    "use strict";

/*
 * Tabs
 */
    document.addEventListener("DOMContentLoaded", function(){
        if ( document.querySelectorAll('.tabs').length>0 ){
            [].forEach.call(document.querySelectorAll('.tabs__title'), function(item){
                item.addEventListener('click', function(event){
                    event.preventDefault();

                    const targetId = item.dataset.tab;
                    const isActiveCurrentTitle = item.classList.contains('tabs__title--active');
                    
                    // Remove active state
                    [].forEach.call(document.querySelectorAll('.tabs__title--active'), function(title){
                        title.classList.remove('tabs__title--active');
                    });
                    [].forEach.call(document.querySelectorAll('.tabs__content--active'), function(content){
                        content.classList.remove('tabs__content--active');
                    });

                    if ( isActiveCurrentTitle===false ){
                        // Add active state
                        [].forEach.call(document.querySelectorAll('.tabs__title[data-tab="'+ targetId +'"]'), function(title){
                            title.classList.add('tabs__title--active');
                        });
                        document.querySelector('#'+ targetId).classList.add('tabs__content--active');
                    }
                });
            });
        }
    });

})();