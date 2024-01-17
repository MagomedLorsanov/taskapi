function storeTask(task) {
    tasksById[task.id] = task;
    localStorage.setItem(task.id, JSON.stringify(task));
}
