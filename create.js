document.getElementById("fileForm").addEventListener("submit", async function(event) {
    event.preventDefault();

    const fileNumber = document.getElementById("fileNumber").value;
    const fileTitle = document.getElementById("fileTitle").value;
    const description = document.getElementById("description").value;
    const department = document.getElementById("department").value;

    const data = { fileNumber, fileTitle, description, department };

    try {
        const response = await fetch("/create-file", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        const messageElement = document.getElementById("message");

        if (result.success) {
            messageElement.style.color = "green";
            messageElement.textContent = result.message;
            document.getElementById("fileForm").reset();
        } else {
            messageElement.style.color = "red";
            messageElement.textContent = result.message;
        }
    } catch (error) {
        console.error("Error:", error);
    }
});
