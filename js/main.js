const apiUrl = '../api/v1/task'; 

const tableBody = document.getElementById('table-body');
const pagination = document.getElementById('pagination');
let currentPage = 1;

function fetchData(page = 1, searchTerm = '') {

  const tableBodyLoading = tableBody.cloneNode(false);
  const loadingRow = document.createElement('tr');
  const loadingCell = document.createElement('td');
  loadingCell.setAttribute('colspan', '3');
  loadingCell.textContent = 'Загрузка...';
  loadingRow.appendChild(loadingCell);
  tableBodyLoading.appendChild(loadingRow);
  tableBody.replaceWith(tableBodyLoading);

  fetch(apiUrl, {
    method: 'GET',
  })
  .then(response => response.json())
  .then(data => {
    tableBodyLoading.replaceWith(tableBody);

    tableBody.innerHTML = '';

    data.items.forEach(item => {
      const row = document.createElement('tr');
      const idCell = document.createElement('td');
      const titleCell = document.createElement('td');
      const descriptionCell = document.createElement('td');

      idCell.textContent = item.id;
      titleCell.textContent = item.title;
      descriptionCell.textContent = item.description;

      row.appendChild(idCell);
      row.appendChild(titleCell);
      row.appendChild(descriptionCell);

      tableBody.appendChild(row);
    });

    pagination.innerHTML = '';

    const totalPages = Math.ceil(data.total / data.per_page);

    for (let i = 1; i <= totalPages; i++) {
      const pageLink = document.createElement('a');
      pageLink.href = '#';
      pageLink.textContent = i;

      if (i === currentPage) {
        pageLink.classList.add('active');
      }

      pageLink.addEventListener('click', () => {
        currentPage = i;
        fetchData(currentPage, searchTerm);
      });

      pagination.appendChild(pageLink);
    }
  })
  .catch(error => {
    console.error('Ошибка:', error);
    tableBodyLoading.replaceWith(tableBody);
    tableBody.innerHTML = '<tr><td colspan="3">Произошла ошибка при загрузке данных.</td></tr>';
  });
}

// Инициализация страницы с данными
fetchData();

// Обработка события поиска при вводе текста в поле
const searchInput = document.getElementById('search-input');
searchInput.addEventListener('input', () => {
  const searchTerm = searchInput.value.trim();
  currentPage = 1; // Сбрасываем текущую страницу при поиске
  fetchData(currentPage, searchTerm);
});