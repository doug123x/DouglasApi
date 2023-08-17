# Document Management API 

Document Type
Function index
This function returns a list of all valid document types in JSON format.

HTTP Method: GET
Endpoint: /api/doctypes

Success Response:

{ "data": [ { "id": 1, "name": "Document Type 1", "template": "default_template", "created_at": "2023-08-17T12:34:56Z", "updated_at": "2023-08-17T12:34:56Z" // ... other document type properties }, // ... more document types ], "message": "Listing all valid types for documents" }

Function store
This function creates a new document type with the provided details.

HTTP Method: POST
Endpoint: /api/doctypes

Request Body:

{ "name": "New Document Type", "template": "custom_template" }

Success Response:

{ "data": { "id": 2, "name": "New Document Type", "template": "custom_template", "created_at": "2023-08-17T12:34:56Z", "updated_at": "2023-08-17T12:34:56Z" // ... other document type properties }, "message": "New type of document created." }

Function update
This function updates an existing document type with the provided details.

HTTP Method: PUT
Endpoint: /api/doctypes/{id}

Request Body:

{ "name": "Updated Document Type", "template": "updated_template" }

Success Response:

{ "data": { "id": 3, "name": "Updated Document Type", "template": "updated_template", "created_at": "2023-08-17T12:34:56Z", "updated_at": "2023-08-17T12:34:56Z" // ... other document type properties }, "message": "Doc type updated." }

Function show
This function returns details of a specific document type.

HTTP Method: GET
Endpoint: /api/doctypes/{id}

Success Response:

{ "message": "Showing type data", "data": { "id": 4, "name": "Document Type 4", "template": "custom_template", "created_at": "2023-08-17T12:34:56Z", "updated_at": "2023-08-17T12:34:56Z" // ... other document type properties } }

Function destroy
This function deletes an existing document type.

HTTP Method: DELETE
Endpoint: /api/doctypes/{id}

Success Response:

{ "message": "Type deleted", "data": { "id": 5, "name": "Deleted Document Type", "template": "default_template", "created_at": "2023-08-17T12:34:56Z", "updated_at": "2023-08-17T12:34:56Z" // ... other document type properties } }

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

