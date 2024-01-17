function showTask(task) {
    modal.style.display = "block";
    const modalHeader = document.querySelector(".modal-header>h2>span");
    const modalBody = document.querySelector(".modal-body");
    modalBody.innerHTML = '';
    modalHeader.innerHTML = '';

    modalHeader.textContent = `№ ${task.id}`;
    modalBody.innerHTML = '';

    let title  = appendTask('Заголовок', task.title);
    let date   = appendTask('Дата выполнения', task.date);
    let author = appendTask('Автор', task.author);
    let status = appendTask('Статус', task.status);
    let descr  = appendTask('Описание', task.description);

    modalBody.append(title, date, author, status, descr);
}