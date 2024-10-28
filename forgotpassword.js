function sendOtp(event) {
    event.preventDefault(); // Prevent form submission

    const email = document.getElementById("email").value;

    if (email) {
        // Simulate sending OTP
        alert(`OTP sent to ${email}`); // Replace this with an actual backend call to send OTP
        
        // Display the OTP input section
        document.getElementById("otpSection").style.display = "block";
    } else {
        alert("Please enter a valid email ID.");
    }
}

function verifyOtp(event) {
    event.preventDefault(); // Prevent form submission

    const otp = document.getElementById("otp").value;

    if (otp === "123456") { // Replace "123456" with the actual OTP for verification
        alert("OTP verified successfully. Login successful!");
    } else {
        alert("Invalid OTP. Please try again.");
    }
}
