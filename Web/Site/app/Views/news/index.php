<h2><?= esc($title) ?></h2>

<?php if ($users_list !== []): ?>

    <?php foreach ($users_list as $users_list): ?>  
        <div class="main">
            <h3><?= esc($users_list['username']) ?></h3>
            <?= esc($users_list['password']) ?>
        </div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Users</h3>

    <p>Unable to find any users for you.</p>

<?php endif ?>