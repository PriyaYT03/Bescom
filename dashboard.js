const activityData = [
    { fileNumber: "F001", description: "File Description 1", department: "Dept A", status: "In Progress", lastUpdate: "2 hrs ago" },
    { fileNumber: "F002", description: "File Description 2", department: "Dept B", status: "Pending", lastUpdate: "1 day ago" },
    { fileNumber: "F003", description: "File Description 3", department: "Dept C", status: "Completed", lastUpdate: "3 days ago" },
    { fileNumber: "F004", description: "File Description 4", department: "Dept D", status: "In Progress", lastUpdate: "5 hrs ago" }
];

const activityTable = document.getElementById("activityTable");

activityData.forEach(activity => {
    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${activity.fileNumber}</td>
        <td>${activity.description}</td>
        <td>${activity.department}</td>
        <td>${activity.status}</td>
        <td>${activity.lastUpdate}</td>
    `;
    activityTable.appendChild(row);
});
