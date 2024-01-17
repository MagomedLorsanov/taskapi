let currentPage = 1;
const recordsPerPage = 10;
let tasks = [];
let filteredTasks = [];
let tasksById = [];
// Get the modal
let modal = document.getElementById("myModal");

async function getTasks() {
  try {
    const response = await fetch("/api/v1/task");
    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    tasks = await response.json();
    changePage(1);
    document.getElementById("pagination").innerHTML = pagination(
      tasks.length / recordsPerPage,
      1
    );
  } catch (error) {
    console.error(`Could not get tasks: ${error}`);
  }
}

getTasks();

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.addEventListener("click", function (event) {
  modal.style.display = "none";
});
