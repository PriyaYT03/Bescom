function trackFile() {
    const fileNumber = document.getElementById("fileNumber").value;
    const trackingInfoDiv = document.getElementById("trackingInfo");

    if (!fileNumber) {
        alert("Please enter a file number.");
        return;
    }

    // Simulated departmental workflow
    const workflow = [
        { status: "Manager", department: "File reviewed by Manager" },
        { status: "AGM", department: "Sent to AGM for approval" },
        { status: "DGM", department: "Forwarded to DGM for further processing" },
        { status: "GM", department: "Final review by GM" }
    ];

    // Display tracking information
    trackingInfoDiv.innerHTML = <h2>Tracking Information for File: ${fileNumber}</h2>;
    workflow.forEach(step => {
        const stepInfo = document.createElement("p");
        stepInfo.innerHTML = <strong>Status:</strong> ${step.status} - <strong>Details:</strong> ${step.department};
        trackingInfoDiv.appendChild(stepInfo);
    });
}