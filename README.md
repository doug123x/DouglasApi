# Document Management API 

## Documents

### Function `index`

This function returns a list of all valid documents in JSON format.

**HTTP Method:** GET  
**Endpoint:** `/api/documents`

**Success Response:**

`{
    "message": "Listing all valid documents",
    "data": [
        {
            "id": 1,
            "title": "Document Title 1",
            "doctype_id": 1,
            "created_at": "2023-08-17T12:34:56Z",
            "updated_at": "2023-08-17T12:34:56Z"
            // ... other document properties
        },
        // ... more documents
    ]
}` 

### Function `store`

This function creates a new document with the provided details.

**HTTP Method:** POST  
**Endpoint:** `/api/documents`

**Request Body:**

`{
    "title": "New Document Title",
    "doctype_id": 2,
    "fields": [
        {
            "column_id": 1,
            "text": "Text for Column 1"
        },
        // ... more fields
    ]
}` 

**Success Response:**

`{
    "message": "New Document created.",
    "data": {
        "id": 2,
        "title": "New Document Title",
        "doctype_id": 2,
        "created_at": "2023-08-17T12:34:56Z",
        "updated_at": "2023-08-17T12:34:56Z"
        // ... other document properties
    }
}` 

### Function `update`

This function updates an existing document with the provided details.

**HTTP Method:** PUT  
**Endpoint:** `/api/documents/{id}`

**Request Body:**

`{
    "title": "Updated Document Title",
    "doctype_id": 3,
    "fields": [
        {
            "column_id": 1,
            "text": "Updated Text for Column 1"
        },
        // ... more fields
    ]
}` 

**Success Response:**

`{
    "message": "Document updated.",
    "data": {
        "id": 3,
        "title": "Updated Document Title",
        "doctype_id": 3,
        "created_at": "2023-08-17T12:34:56Z",
        "updated_at": "2023-08-17T12:34:56Z"
        // ... other document properties
    }
}` 

### Function `destroy`

This function deletes an existing document.

**HTTP Method:** DELETE  
**Endpoint:** `/api/documents/{id}`

**Success Response:**

`{
    "message": "Document deleted.",
    "data": {
        "id": 4,
        "title": "Deleted Document Title",
        "doctype_id": 4,
        "created_at": "2023-08-17T12:34:56Z",
        "updated_at": "2023-08-17T12:34:56Z"
        // ... other document properties
    }
}` 

### Function `show`

This function returns details of a specific document.

**HTTP Method:** GET  
**Endpoint:** `/api/documents/{id}`

**Success Response:**

`{
    "message": "Showing document data.",
    "data": {
        "id": 5,
        "title": "Document Title 5",
        "doctype_id": 5,
        "created_at": "2023-08-17T12:34:56Z",
        "updated_at": "2023-08-17T12:34:56Z"
        // ... other document properties
    }
}` 

### Function `download`

This function generates and downloads a PDF based on the document's view template.

**HTTP Method:** GET  
**Endpoint:** `/api/documents/{id}/download`

**Success Response:** The PDF is generated and downloaded through the user's browser.

