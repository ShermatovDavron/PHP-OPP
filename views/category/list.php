<h1>Bu category list</h1>
<table>
    <?php
    print_r($list);
    foreach ($list as $item) {
        echo "<td>";
        echo"<tr>".$item['id']."</tr>";
        echo"<tr>".$item['name']."</tr>";
        echo "</td>";
    } ?>
</table>
