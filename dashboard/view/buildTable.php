<tr id="<?php echo $row['id']; ?>">
    <td>
        <a id="name"><?php echo $row['name']; ?></a>
    <td>
        <a id='url' href="<?php echo $row['url']; ?>">
            <?php echo $row['url']; ?>
        </a>
    </td>
    <td>
        <?php echo $row['owner']; ?>
    </td>
    <td data-id="<?php echo $row['id']; ?>" class="flagged">
        <?php 
        if ($row['flagged'] === "1") {
        echo "<a href='#' title='" . $row['flaggedReason'] . "'>⚠️</a>";
        }
        ?>
    </td>
    <td>
        <a data-id="<?php echo $row['id']; ?>" class="flag" href="#">
            🚩</a>
    </td>
    <td>

        <a data-id="<?php echo $row['id']; ?>" class="del" href="#">
            x
        </a>
    </td>
</tr>