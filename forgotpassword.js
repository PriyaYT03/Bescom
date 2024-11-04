function sendOtp(event) {
    event.preventDefault();

    const email = document.getElementById("email").value;

    if (email) {
        alert(`OTP sent to ${email}`);
        document.getElementById("otpSection").style.display = "block";
    } else {
        alert("Please enter a valid email ID.");
    }
}

function verifyOtp(event) {
    event.preventDefault(); 

    const otp = document.getElementById("otp").value;

    if (otp === "123456") { 
        alert("OTP verified successfully. Login successful!");
    } else {
        alert("Invalid OTP. Please try again.");
    }
}
