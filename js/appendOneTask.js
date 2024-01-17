function appendTask(key, value) {
  let taskDiv = document.createElement("div");
  let taskHeading = document.createElement("h4");
  taskHeading.textContent = key;
  let taskInput = document.createElement("input");
  taskInput.type = "text";
  taskInput.value = value;
  taskDiv.appendChild(taskHeading);
  taskDiv.appendChild(taskInput);
  
  return taskDiv;
}
