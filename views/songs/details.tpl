<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf8" />
        <title><?php echo $title; ?> | Song Details</title>
    </head>
    <body>
	
		<?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
		
		<?php if (!isset($noSongs)): ?>
		
			<article>
				<header>
					<p><h1><?php echo $title; ?></h1> by:<?php echo $artist; ?></p>
                    <p><?php echo $link; ?></p>
				</header>
			
			</article>
		
		<?php else: ?>
		
			<h1>There is no songs with the ID you specified.</h1>
		
		<?php endif; ?>
		
		<a href="/mvc-site/songs/">Back to songs list</a>
		
    </body>
</html>