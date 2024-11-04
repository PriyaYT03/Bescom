function openModal() {
    document.getElementById("profileModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("profileModal").style.display = "none";
}

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

function saveProfile() {
    alert("Profile updated successfully!");
    closeModal();
}
