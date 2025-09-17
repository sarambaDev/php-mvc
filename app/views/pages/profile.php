<div class="content-wrapper p-3">
    <h1>Profile</h1>
    <p>Username: <?= htmlspecialchars($_SESSION['user']['username']) ?></p>
    <p>User ID: <?= htmlspecialchars($_SESSION['user']['id']) ?></p>
</div>