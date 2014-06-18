<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
	
		<?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
		
        <h1>New leads</h1>

		<?php 
            if ($leads):
            foreach ($leads as $a): ?>

			<article>
				<header>
					<h1>Name:<a href="news/details/<?php echo $a['id']; ?>"><?php echo $a['first_name'].$a['last_name']; ?></a></h1>
				</header>
				<p><?php echo $a['message']; ?></p>
				<hr/>
			</article>
		<?php 
            endforeach;
            else: ?>

        <h1>Welcome!</h1>
        <p>We currently do not have any leads.</p>

        <?php endif; ?>
        
		
    </body>
</html>