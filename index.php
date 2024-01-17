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
         
        <!-- The Modal -->
         <div id="myModal" class="modal">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h2>Информация о задаче <span></span></h2>
                </div>
                <div class="modal-body">

                </div>
                <button class="close">Закрыть</button>
            </div>

        </div>
    </div>
    <script src="./js/main.js"></script>
    <script src="./js/appendData.js"></script>
    <script src="./js/changePage.js"></script>
    <script src="./js/pagination.js"></script>
    <script src="./js/searchTitle.js"></script>
    <script src="./js/getTaskById.js"></script>
    <script src="./js/showTaskById.js"></script>
    <script src="./js/appendOneTask.js"></script>
    <script src="./js/storeTask.js"></script>



</body>

</html>