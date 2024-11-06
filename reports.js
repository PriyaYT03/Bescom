// Sample data (replace this with actual data fetching in a real setup)
const fileData = [
  { fileNumber: "12345", department: "HR", status: "Pending", dateCreated: "2024-10-01", lastUpdated: "2024-10-20" },
  { fileNumber: "67890", department: "IT", status: "Completed", dateCreated: "2024-09-15", lastUpdated: "2024-10-10" },
  { fileNumber: "54321", department: "Finance", status: "In Progress", dateCreated: "2024-08-25", lastUpdated: "2024-10-21" },
];

document.addEventListener("DOMContentLoaded", function() {
  loadTableData(fileData);
});

function loadTableData(data) {
  const tableBody = document.getElementById("tableBody");
  tableBody.innerHTML = ""; // Clear any existing data

  data.forEach(item => {
    const row = document.createElement("tr");

    row.innerHTML = `
      <td>${item.fileNumber}</td>
      <td>${item.department}</td>
      <td>${item.status}</td>
      <td>${item.dateCreated}</td>
      <td>${item.lastUpdated}</td>
    `;

    tableBody.appendChild(row);
  });
}

function filterTable() {
  const searchInput = document.getElementById("searchInput").value.toLowerCase();
  const statusFilter = document.getElementById("statusFilter").value;

  const filteredData = fileData.filter(item => {
    const matchesSearch = item.fileNumber.toLowerCase().includes(searchInput);
    const matchesStatus = statusFilter ? item.status === statusFilter : true;
    return matchesSearch && matchesStatus;
  });

  loadTableData(filteredData);
}
