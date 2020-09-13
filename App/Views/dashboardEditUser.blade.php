<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php


?>
<form method="post" action="" enctype="multipart/form-data">
    <input placeholder="name" name="name" value="<?= $user->name ?>"/>
    <input placeholder="email" name="email" value="<?= $user->email ?>"/>
    <input placeholder="mobile" name="mobile" value="<?= $user->mobile ?>" disabled/>
    <label for="serviceG">service girandeh</label>
    <input type="radio" name="service" value="0" id="serviceG"/>
    <label for="serviceD">service dahandeh</label>
    <input type="radio" name="service" value="1" checked id="serviceD"/>
    <input type="file" placeholder="avatar" name="avatar" value="<?= $user->avatar ?>"/>
    <input placeholder="education" name="education" value="<?= $user->education ?>">
    <input placeholder="bio" name="bio" value="<?= $user->bio ?>"/>
    <input type="checkbox" placeholder="notification_receiver" name="notification_receiver"
           value="1" <?= $user->notification_receiver ? 'checked' : '' ?> />
    <button type="submit" value="send">send</button>
</form>
</body>
</html>