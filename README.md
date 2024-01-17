# Task API
Get all tasks
-------------

-   URL: `/api/v1/task`
-   Method: `GET`
-   Description: Returns all tasks from the database.

Get task by ID
--------------

-   URL: `/api/v1/task/{task_id}`
-   Method: `GET`
-   Description: Returns a task with the specified ID from the database.

Load generated data into the database
-------------------------------------

-   URL: `/api/v1/gdata`
-   Method: `POST`
-   Description: Loads generated data into the database.

### Response Format

-   All responses are in JSON format.

### Error Handling

-   If a requested resource is not found, the API will return a 404 Not Found error.

### Example

-   Get all tasks:

    -   Request: `GET /api/v1/task`
    -   Response:

    jsonCopy code

    `[
        {
            "id": 1,
            "title": "Task 1",
            "description": "Description 1",
            "status": "pending"
        },
        {
            "id": 2,
            "title": "Task 2",
            "description": "Description 2",
            "status": "completed"
        }
    ]`

-   Get task by ID:

    -   Request: `GET /api/v1/task/1`
    -   Response:

    jsonCopy code

    `{
        "id": 1,
        "title": "Task 1",
        "description": "Description 1",
        "status": "pending"
    }`

-   Load generated data into the database:

    -   Request: `POST /api/v1/gdata`
    -   Response:

    jsonCopy code

    `{
        "message": "Generated data loaded successfully"
    }`

### Note

-   Replace `{task_id}` with the actual ID of the task when making a request to get a task by ID.

-   The response may vary based on the actual data in the database.