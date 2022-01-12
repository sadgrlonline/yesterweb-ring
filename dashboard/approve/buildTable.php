<tr id="<?php echo $row['id']; ?>">
    <td class="name">
        <?php echo $row['name']; ?>
    </td>
    <td>
        <a id='url' class="url" href="<?php echo $row['url']; ?>">
            <?php echo $row['url']; ?>
        </a>
    </td>
    <td class="owner">
        <?php echo $row['owner']; ?>
    </td>
    </td>
    <td class="desc">
        <?php echo $row['description']; ?>
    </td>
        <td data-id="<?php echo $row['contact']; ?>" class="contact">
        <?php echo $row['contact']; ?>
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
        <a data-id="<?php echo $row['id']; ?>" class="approve" name="approve" href="#">
            &#x2713;
        </a>
    </td>
        <td>
        <a data-id="<?php echo $row['id']; ?>" class="deny" name="delete" href="#">
            x
        </a>
    </td>
</tr>