<?php if (count($errors) > 0) : ?>
<?php foreach ($errors as $error) : ?>
<?php echo "<script type='text/javascript'>alert('$error');</script>"; ?>
<?php endforeach ?>
<?php endif ?>