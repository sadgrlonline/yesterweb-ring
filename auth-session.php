<?php
if (!isset($_SESSION["username"])) {
    header("Location: /yesterweb-ring/login/");
    exit();
}