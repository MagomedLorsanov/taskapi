<!DOCTYPE html>
<html>

<head>
    <title>@MoSalahDev</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <div class="table-container">
        <h1>Task by https://t.me/MoSalahDev</h1>
        <input type="text" id="searchInput" placeholder="Поиск по заголовку">
        <table id="dataTable">
            <thead>
                <tr>
                    <th>Номер задачи</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="pagination"></div>
    </div>
    <script src="./js/main.js"></script>
    <script src="./js/appendData.js"></script>
    <script src="./js/changePage.js"></script>
    <script src="./js/pagination.js"></script>
    <script src="./js/searchTitle.js"></script>
</body>

</html>