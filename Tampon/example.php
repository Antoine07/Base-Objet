<?php
// view composite
ob_start();

$tags = ['php', 'mysql', 'mongoDB'];

echo '<div class="tags">';

foreach ($tags as $tag) {
    echo $tag;
}

echo '</div>';

$content = ob_get_clean();
?>
<html>
<head>
    <title>Layout</title>
</head>
<body>
<?php echo $content; ?>
</body>
</html>