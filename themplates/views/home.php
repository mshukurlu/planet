Salam, <?= $user['email'] ?>

<form action="/logout" method="POST">
        <button>Log out</button>
    <?= csrf_field() ?>
</form>
