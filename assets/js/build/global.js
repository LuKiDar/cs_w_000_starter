!function(){"use strict";function e(){10<window.scrollY?document.body.classList.add("is-scrolled"):document.body.classList.remove("is-scrolled")}document.addEventListener("DOMContentLoaded",function(){document.getElementById("toggle").addEventListener("click",function(){document.body.classList.toggle("menu-active")})}),document.addEventListener("DOMContentLoaded",e),window.addEventListener("scroll",e),document.addEventListener("DOMContentLoaded",function(){0<document.querySelectorAll('a[href^="#slide-"]').length&&[].forEach.call(document.querySelectorAll('a[href^="#slide-"]'),function(n){n.addEventListener("click",function(){if(event.preventDefault(),document.getElementById(n.getAttribute("href").replace("#",""))){var t=n.getAttribute("href").replace("#","");let e=document.getElementById(t).getBoundingClientRect().top+window.scrollY-document.getElementById("header").offsetHeight;0<document.querySelectorAll("#wpadminbar").length&&(e-=document.getElementById("wpadminbar").offsetHeight),window.scroll({top:e,behavior:"smooth"})}})})})}(),function(){"use strict";document.addEventListener("DOMContentLoaded",function(){0<document.querySelectorAll('[data-modal*="modal-"]').length&&[].forEach.call(document.querySelectorAll('[data-modal*="modal-"]'),function(l){l.addEventListener("click",function(e){var t,n;e.preventDefault(),e=l.dataset.modal,document.getElementById(e)&&(document.body.classList.add("modal-active"),document.getElementById(e).classList.add("modal-container--active")),t=l.dataset.modal,n=!1,[].forEach.call(document.querySelectorAll("#"+t+" .modal__close-button"),function(e){e.addEventListener("click",function(e){document.body.classList.remove("modal-active"),document.getElementById(t).classList.remove("modal-container--active"),n&&setTimeout(function(){let e=document.getElementById(t);e.parentNode.removeChild(e)},100)})}),document.getElementById(t).addEventListener("click",function(e){e.target.id===t&&(document.body.classList.remove("modal-active"),document.getElementById(t).classList.remove("modal-container--active"),n&&setTimeout(function(){let e=document.getElementById(t);e.parentNode.removeChild(e)},100))})})})})}(),function(){"use strict";document.addEventListener("DOMContentLoaded",function(){0<document.querySelectorAll(".tabs").length&&[].forEach.call(document.querySelectorAll(".tabs__title"),function(n){n.addEventListener("click",function(e){e.preventDefault();var t=n.dataset.tab,e=n.classList.contains("tabs__title--active");[].forEach.call(document.querySelectorAll(".tabs__title--active"),function(e){e.classList.remove("tabs__title--active")}),[].forEach.call(document.querySelectorAll(".tabs__content--active"),function(e){e.classList.remove("tabs__content--active")}),!1===e&&([].forEach.call(document.querySelectorAll('.tabs__title[data-tab="'+t+'"]'),function(e){e.classList.add("tabs__title--active")}),document.querySelector("#"+t).classList.add("tabs__content--active"))})})})}(),function(){"use strict";document.addEventListener("DOMContentLoaded",function(){0<document.getElementsByClassName("form__file").length&&[].forEach.call(document.querySelectorAll(".form__file"),function(e){let t=document.createElement("label");t.htmlFor=e.id,t.classList.add("form__file-wrap"),e.parentNode.insertBefore(t,e),t.appendChild(e);let n=document.createElement("span");n.type="text",n.classList.add("form__file-input"),n.classList.add("input"),n.classList.add("placeholder"),n.innerHTML="MAX 6MB";let l=n.innerHTML;t.appendChild(n);let o=document.createElement("span");o.classList.add("form__file-button"),o.classList.add("button"),o.classList.add("button--file"),o.innerHTML="Choose a file",t.appendChild(o),e.addEventListener("change",function(e){let t="";t=this.files&&1<this.files.length?(this.getAttribute("data-multiple-caption")||"").replace("{count}",this.files.length):e.target.value.split("\\").pop(),t?(n.classList.remove("placeholder"),n.innerHTML=t):(n.classList.add("placeholder"),n.innerHTML=l)})})})}();