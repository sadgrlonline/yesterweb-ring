<?php
include_once "dashboard.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Yesterweb Ring Dashboard</title>
    <link rel="stylesheet" href="../css/style.css" media="all">
</head>

<body>
<?php include "../templates/nav.php";?>
    <div class="dashboard-container">
        <div id="div_login">
            <h1>Yesterweb Ring Dashboard</h1>
            <div class="wrapper">
                There are currently <strong><?php echo $siteCount; ?></strong> websites in the ring.<br><br>
                There are currently <strong><?php echo $pendingCount; ?></strong> websites pending approval.<br><br>
            </div>
        </div>
        <style>
        .wrapper {
            padding: 20px !important;

        }
        </style>
        <script>
        var encodeidArray = <?php echo json_encode($idarray); ?>;
        var encodeurlArray = <?php echo json_encode($urlarray); ?>;
        console.log(encodeidArray);
        console.log("line break");
        console.log(encodeurlArray);
        console.log(encodeidArray[1]);
        </script>