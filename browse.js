async function searchFile() {
    const fileId = document.getElementById("fileIdInput").value;
    const resultDiv = document.getElementById("result");
    resultDiv.innerHTML = ""; // Clear previous results

    if (!fileId) {
        resultDiv.innerHTML = "<p style='color:red;'>Please enter a File ID.</p>";
        return;
    }

    try {
        const response = await fetch(`/search-file?fileId=${fileId}`);
        const data = await response.json();

        if (!data.success) {
            resultDiv.innerHTML = `<p style='color:red;'>${data.message}</p>`;
            return;
        }

        // Display file information
        const file = data.file;
        resultDiv.innerHTML = `
            <h3>File Details</h3>
            <p><strong>File ID:</strong> ${file.id}</p>
            <p><strong>Title:</strong> ${file.file_title}</p>
            <p><strong>Description:</strong> ${file.description}</p>
            <p><strong>Department:</strong> ${file.department}</p>
        `;
    } catch (error) {
        console.error("Error fetching file:", error);
        resultDiv.innerHTML = "<p style='color:red;'>Error searching file. Please try again.</p>";
    }
}

