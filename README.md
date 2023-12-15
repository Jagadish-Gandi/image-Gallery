# image-Gallery Website (PHP & MYSQL)
This image gallery project operates by utilizing PHP, MySQL, HTML, and JavaScript to create an interface for uploading, storing, and displaying images. Here's an overview of how it works:

1. Front-End Interface
HTML: Provides the structure for web pages, including forms and image display sections.
CSS: Defines the styling and layout for a visually appealing presentation.

2. Back-End Functionality
PHP Scripts:
connect.php: Establishes a connection to the MySQL database.
image_form.php: Handles the insertion of image data into the database.
index.php: displaying images.

3. Database Operations
MySQL Database:
practise Table: Likely contains columns like id and image to store image information.
you can refer the practise.sql file attached in main files

4. Image Handling
Uploading Images:
Users utilize the provided form to select and upload images.
PHP scripts validate uploaded images, checking for accepted file types (jpeg, png, gif, webp), and move them to the img/ directory.

5. Displaying Images
Gallery Display:
PHP fetches image details from the database and generates HTML to display images in a grid layout.
Each image is displayed with options for viewing and deleting.
Clicking on an image triggers a JavaScript function to open a modal for a larger view.

6. Deleting Images
Delete Functionality:
Users can delete images by clicking the "Delete" button associated with each image.
PHP processes the delete request, removes the corresponding entry from the database, and potentially deletes the image file from the file system.

7. Modal View
JavaScript:
Provides functionality for opening and closing a modal window to display images in a larger view when clicked.

8. User Interaction
Interactivity:
Users can interact with the gallery by uploading, viewing, and deleting images through the provided interface.

9. File Organization
Project Structure:
Likely organized with folders for CSS, JavaScript, images, and PHP files for better code management and readability.
This workflow combines front-end design, back-end scripting, database operations, and user interaction to create a functional image gallery application. Users can upload images, view them in a gallery format, interact with the images, and manage their presence within the application.







