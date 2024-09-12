'use strict';

const wrapper = document.querySelector(".wrapper"),
    toast = wrapper.querySelector(".toast"),
    title = toast.querySelector("span"),
    subTitle = toast.querySelector("p"),
    wifiIcon = toast.querySelector(".icon"),
    closeIcon = toast.querySelector(".close-icon");

// get form elements
const userName = document.getElementById("name");
const userEmail = document.getElementById("email");

// button submit ID
const submitID = document.getElementById("submit-btn");

// get form element before submitting
const payment = document.getElementById("paymentForm");

// Add event listener for the submit button
submitID.addEventListener('click', e => {
    //e.preventDefault();
	e.disabled = true;
    
    // Check if form input fields are not empty
    if (userName.value === "" || userEmail.value === "") {
        alert("Please fill in all required fields.");
    } else {
        // Check if network is connected
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "https://httpstat.us/200", true);
        xhr.onload = () => {
            if (xhr.status === 200 && xhr.status < 300) {
                // Network is connected, proceed to submit the form
                //payment.submit();
                submitID.disabled = false;
            } else {
                // Network is not connected, show offline message
                networkRequestOffline();
            }
        };
        xhr.onerror = () => {
            // Network error, show offline message
            networkRequestOffline();
        };
        xhr.send(); // Sending GET request to check connection
    }
});

// When the window loads, check if the network is online
window.onload = () => {
    networkRequestOnline();
};

// Function to check if online
function networkRequestOnline() {
    let xhr = new XMLHttpRequest(); // Creating new XML object
    xhr.open("GET", "https://httpstat.us/200", true); // Sending GET request on this URL
    xhr.onload = () => { // Once AJAX loaded
        // If the status is 200 or less than 300, the user is online
        if (xhr.status == 200 && xhr.status < 300) {
            // Enable the submit button if online
            submitID.disabled = false;
            toast.classList.remove("offline");
            title.innerText = "You're online now";
            subTitle.innerText = "Hurray! Internet is connected.";
            wifiIcon.innerHTML = '<i class="uil uil-wifi"></i>';
            closeIcon.onclick = () => { // Hide toast notification on close icon click
                wrapper.classList.add("hide");
            };
            setTimeout(() => { // Hide the toast notification automatically after 5 seconds
                wrapper.classList.add("hide");
            }, 5000);
        } else {
            networkRequestOffline(); // Calling offline function if the status is not 200
        }
    };
    xhr.onerror = () => {
        networkRequestOffline(); // Calling offline function in case of any errors
    };
    xhr.send(); // Sending GET request
}

// Function to handle offline status
function networkRequestOffline() {
    // Disable the submit button if offline
    submitID.disabled = true;
    wrapper.classList.remove("hide");
    toast.classList.add("offline");
    title.innerText = "You're offline now";
    subTitle.innerText = "Oops! Internet is disconnected.";
    wifiIcon.innerHTML = '<i class="uil uil-wifi-slash"></i>';
}

// Set an interval to check the network connection every 10 seconds
setInterval(() => {
    try {
        networkRequestOnline();
    } catch (error) {
        console.log("An error occurred:", error); // Log the error for debugging purposes
    }
}, 10000);