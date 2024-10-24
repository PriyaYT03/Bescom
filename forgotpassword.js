// JavaScript code to handle the form validation and submission
document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form from submitting the traditional way

    // Get the email input value
    const emailInput = document.getElementById("email id");
    const email = emailInput.value.trim();

    // Email validation pattern
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Clear any previous error message
    const errorMessage = document.querySelector(".error");
    if (errorMessage) errorMessage.remove();

    // Check if email is valid
    if (!emailPattern.test(email)) {
        const errorDiv = document.createElement("div");
        errorDiv.classList.add("error");
        errorDiv.textContent = "Please enter a valid email address.";
        emailInput.parentElement.appendChild(errorDiv);
    } else {
        // If valid, display a success message or handle form submission
        alert("Login successful!");
    }
});
