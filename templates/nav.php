<div class="navbar">
    <?php
    if ($_SERVER["REMOTE_ADDR"] !== "127.0.0.1") {
    ?>
        <?php if (!isset($_SESSION['username'])): ?>
        <div class="item"><a href="/">Home</a></div>
        <?php else: ?>
        <div class="item"><a href="/dashboard/">Home</a></div>
        <?php endif?>
        <?php if (!isset($_SESSION['username'])): ?>
        <?php else: ?>
        <div class="item"><a href="/dashboard/approve/">Approve</a></div>
        <?php endif?>
        <?php if (!isset($_SESSION['username'])): ?>
        <?php else: ?>
        <div class="item"><a href="/dashboard/view/">View</a></div>
        <?php endif?>
        <?php if (!isset($_SESSION['username'])): ?>
        <?php else: ?>
        <div class="item"><a href="/submit/">Submit</a></div>
        <?php endif?>
        <?php if (!isset($_SESSION['username'])): ?>
        <?php else: ?>
        <div class="item"><a href="/status/">Status</a></div>
        <?php endif?>
        <?php if (!isset($_SESSION['username'])): ?>
        <?php else: ?>
        <div class="item"><a href="/logout.php">Logout</a></div>
        <?php endif?>
        <?php } else { // for accessing local version ?>
        <div class="item"><a href="/webring.yesterweb.org/dashboard/">Dashboard</a></div>
        <div class="item"><a href="/webring.yesterweb.org/dashboard/approve/">Approve</a></div>
        <div class="item"><a href="/webring.yesterweb.org/dashboard/view/">View</a></div>
        <div class="item"><a href="/webring.yesterweb.org/submit/">Submit</a></div>
        <div class="item"><a href="/webring.yesterweb.org/status/">Status</a></div>
        <div class="item"><a href="/webring.yesterweb.org/logout.php">Logout</a></div>
        <?php } ?>
</div>