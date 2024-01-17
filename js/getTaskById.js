function fetchTaskById(taskId) {
  let storedTask = JSON.parse(localStorage.getItem(taskId));
  console.log()
  if (storedTask) {
    showTask(storedTask);
  } else {
    fetch("/api/v1/task/" + taskId)
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          showTask(data);
          storeTask(data);
        } else {
          console.error("Ошибка при получении данных задачи");
        }
      })
      .catch((error) => {
        console.error("Ошибка запроса: ", error);
      });
  }
}
