'use strict';
const menuBtn = document.getElementById('menu-btn');
const asideBar = document.getElementById('sidebar');
const closeSide = document.getElementById('close-sidebar');
const sumButton = document.getElementById("submitBtn");


// Get the button
var scrollToTopBtn = document.getElementById("scrollToTopBtn");


// disable submit button
sumButton.addEventListener("click", (e) => {
    e.preventDefault();
    alert("page still in development")
})

// open sidebar
menuBtn.addEventListener('click', () =>{
    asideBar.classList.add('active');
})
// close sidebar
closeSide.addEventListener('click', () => {
    asideBar.classList.remove('active');
})

document.addEventListener('mouseover', () => {
    asideBar.classList.remove('active');
})



// When the user scrolls down 100px from the top of the document, show the button
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopBtn.classList.remove("hidden");
    } else {
        scrollToTopBtn.classList.add("hidden");
    }
};

// When the user clicks on the button, scroll to the top of the document
scrollToTopBtn.onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

