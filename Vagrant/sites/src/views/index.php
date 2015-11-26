<?php $title = 'Home page'; ?>
<?php ob_start() ?>
    <section class="content">
        <?php foreach ($users as $user): ?>
            <h1><a href="<?php echo url('single', $user->id); ?>">
                    <?php echo $user->name ?>
                </a></h1>

            <p class="excerpt"><?php echo $user->biography ?></p>
            <p class="date">
                <small>date de publication:
                   </small>
            </p>
            <p class="tags">
                <small>number tags(s) </small>
            </p>
        <?php endforeach; ?>
    </section>
<?php $content = ob_get_clean() ?>
<?php include __DIR__ . '/layout.php' ?>