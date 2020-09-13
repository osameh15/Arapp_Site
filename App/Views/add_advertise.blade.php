<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>add advertise</h1>

<?php
var_dump($errors);
?>
<form action="" method="post" enctype="multipart/form-data">

    <input type="text" name="title" placeholder="title">
    <br>
    <input type="text" name="dis" placeholder="dis">
    <br>

    <br>

    <select name="category">
        <?php

        foreach ($categories as $category)
        {
        ?>
        <option value="<?= $category->id ?>"><?= $category->title ?></option>
        <?php
        }
        ?>
    </select>
    <input type="file" name="advertise_img">
    <button  name="add_advertise" type="submit">add advertise</button>


</form>

</body>
</html>