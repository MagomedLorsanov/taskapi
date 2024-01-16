let currentPage = 1;
const recordsPerPage = 10;
let tasks = [];
let filteredTasks = [];

async function getTasks() {
    try {
        const response = await fetch('/api/v1/task');
        if (!response.ok) {
            throw new Error(`HTTP error: ${response.status}`);
        }
        tasks = await response.json();
        changePage(1);
        document.getElementById('pagination').innerHTML = pagination((tasks.length/recordsPerPage), 1);
    } catch (error) {
        console.error(`Could not get tasks: ${error}`);
    }
}

getTasks();