import './bootstrap';
//jQuery
import jQuery from 'jquery';
window.$ = jQuery;

const hamburger = document.querySelector('#toggle-btn');

hamburger.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("expand")
});


