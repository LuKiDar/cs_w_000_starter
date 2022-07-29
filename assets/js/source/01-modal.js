(function (){
    "use strict";

/*
 * Modal
 */
    // Open modal
    function openModal(modalID){
        if ( document.getElementById(modalID) ){
            document.body.classList.add('modal-active');
            document.getElementById(modalID).classList.add('modal-container--active');
        }
    }

    // Close modal
    function closeModal(modalID, removeModal=false){
        [].forEach.call(document.querySelectorAll('#'+ modalID +' .modal__close-button'), function(item){
            item.addEventListener('click', function(event){
                document.body.classList.remove('modal-active');
                document.getElementById(modalID).classList.remove('modal-container--active');

                if ( removeModal ){
                    setTimeout(function(){
                        let modalElem = document.getElementById(modalID);
                        modalElem.parentNode.removeChild(modalElem);
                    }, 100);
                }
            });
        });

        document.getElementById(modalID).addEventListener('click', function(event){
            if ( event.target.id===modalID){
                document.body.classList.remove('modal-active');
                document.getElementById(modalID).classList.remove('modal-container--active');
                
                if ( removeModal ){
                    setTimeout(function(){
                        let modalElem = document.getElementById(modalID);
                        modalElem.parentNode.removeChild(modalElem);
                    }, 100);
                }
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function(){
        if ( document.querySelectorAll('[data-modal*="modal-"]').length>0 ){
            [].forEach.call(document.querySelectorAll('[data-modal*="modal-"]'), function(item){
                item.addEventListener('click', function(event){
                    event.preventDefault();

                    openModal(item.dataset.modal);
                    closeModal(item.dataset.modal);
                });
            });
        }
    });

})();