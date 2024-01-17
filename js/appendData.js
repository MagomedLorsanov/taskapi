function appendTable(data) {
    const tableBody = document.getElementById('dataTable').querySelector('tbody');
    tableBody.innerHTML = '';

    data.forEach((task) => {
        const row = document.createElement('tr');
        const taskNumberCell = document.createElement('td');
        taskNumberCell.textContent = task.id;
        row.appendChild(taskNumberCell);

        const titleCell = document.createElement('td');
        titleCell.textContent = task.title;
        row.appendChild(titleCell);

        const descriptionCell = document.createElement('td');
        descriptionCell.textContent = task.date;
        row.appendChild(descriptionCell);

        row.addEventListener('click', function(event) {
            fetchTaskById(task.id); // Call the function which fetches and opens the modal
          });
        tableBody.appendChild(row);
    });
}