<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>File Upload</h1>
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <label for="image">Image Upload</label>
        <input type="file" id="image" name="image"><br><br>

        <!-- <label for="image2">Another File</label>
        <input type="file" id="image2" name="image2"><br><br> -->

        <input type="submit" value="Upload">
    </form>
</body>
</html>