<?php $title = 'List of Posts' ?>

<?php ob_start() ?>
    <div class="container">
        <div class="row main">
            <form action="" method="post">
                <p><label for="">email</label> <input type="email" name="email" value=""/>
                    <br/>
                </p>
                <?php echo _token(); ?>
                <p><label for="">password</label><input type="password" name="password"/>
                    <br/></p>
                <p><input type="submit" name="ok" value="ok"/></p>
            </form>
        </div>
    </div>
<?php $content = ob_get_clean() ?>

<?php include __DIR__ . '/../layouts/master.php' ?>