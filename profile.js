// Open Modal
function openModal() {
    document.getElementById("profileModal").style.display = "flex";
}

// Close Modal
function closeModal() {
    document.getElementById("profileModal").style.display = "none";
}

// Preview Selected Profile Image
function previewImage(event) {
    const preview = document.getElementById("preview");
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function() {
        preview.src = reader.result;
    };
    if (file) {
        reader.readAsDataURL(file);
    }
}

// Save Profile (Add functionality as needed)
function saveProfile() {
    // This would typically involve sending form data to a server
    alert("Profile updated successfully!");
    closeModal();
}
