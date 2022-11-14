<?php

include "Item.php";
include "DB.php";

$db = new DB();

?>
<html>
<head>

</head>
<body>
<div class="items-container">
    <?php foreach ($db->getAllItems() as $item) { ?>
        <div class="item">
            <?php echo $item->title ?>
        </div>
    <?php } ?>

</div>

</body>
</html>

