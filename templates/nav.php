<div class="navbar">
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
    <div class="item"><a href="https://ring-status.yesterweb.org/">Status</a></div>
    <?php endif?>
    <?php if (!isset($_SESSION['username'])): ?>
    <?php else: ?>
    <div class="item"><a href="/logout.php">Logout</a></div>
    <?php endif?>
</div>