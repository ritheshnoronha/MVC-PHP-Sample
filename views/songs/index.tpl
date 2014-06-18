<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
	
		<?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
		
        <h1>News songs</h1>

		<?php 
            if ($songs):
            foreach ($songs as $a): ?>

			<article>
				<header>
					<h1><a href="/mvc-site/songs/details/<?php echo $a['id']; ?>"><?php echo $a['artist']; ?></a></h1>
				</header>
				<p><?php echo $a['track']; ?></p>
				<hr/>
			</article>
		<?php 
            endforeach;
            else: ?>

        <h1>Welcome!</h1>
        <p>We currently do not have any songs.</p>

        <?php endif; ?>
        
    </body>
</html>