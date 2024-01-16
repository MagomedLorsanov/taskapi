document.getElementById('searchInput').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    filteredTasks = tasks.filter(task => {
      return task.title.toLowerCase().includes(searchValue);
    });
    pagination(Math.ceil(filteredTasks.length/recordsPerPage), 1, filteredTasks);
  });