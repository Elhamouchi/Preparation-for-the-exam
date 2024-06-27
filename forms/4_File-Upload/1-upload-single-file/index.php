<!-- 
To allow certain file types to be uploaded, you use the accept attribute. The value of the accept attribute is a unique file type specifier, which can be:

A valid case-insensitive file name extension e.g., .jpg, .pdf, .txt
A valid MIME type string
Or a string like image/* (any image file), video/* (any video file), audio/* (any audio file).
If you use multiple file type specifiers, you need to separate them using a comma (,). For example, the following setting allows you to upload only .png and .jpeg images:

<input type="file" accept="image/png, image/jpeg" name="file">


The <form> element that contains the file input element must have the enctype attribute with the value multipart/form-data:

<form enctype="multipart/form-data" action="index.php" method="post">
</form>
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PHP File Upload</title>
</head>
<body>
<form enctype="multipart/form-data" action="upload.php" method="post">
    <div>
        <label for="file">Select a file:</label>
        <input type="file" id="file" name="file"/>
    </div>
    <div>
      <button type="submit">Upload</button>
    </div>
</form>
</body>
</html>