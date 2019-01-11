<?php
ob_start("ob_gzhandler");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>player</title>
        <meta name="robots" content="noindex">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta charset="UTF-8">
    </head>

    <body style="margin:0;">
        <div id="player"></div>
        <script>


<?php if (isset($_GET['id'])) { ?>
                var id = '<?php echo (trim($_GET['id'])); ?>'.trim();
                document.getElementById('player').innerHTML = '<iframe src="https://www.youtube.com/embed/' + id.toString() + '?rel=0&amp;showinfo=0&amp;autoplay=1" width="100%" height="315" scrolling="no" allow="autoplay;encrypted-media" style="border:none;"></iframe>';
<?php } else { ?>
                document.getElementById('player').innerHTML = 'No valid video id.';
<?php } ?>
        </script>
    </body>

</html>
<?php
ob_end_flush();
?>