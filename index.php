<!DOCTYPE html>
<html>

<head>
    <title>Таблица с пагинацией и поиском</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <h1>Таблица с пагинацией и поиском</h1>
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

    <script src="./js/main.js"></script>
</body>

</html>