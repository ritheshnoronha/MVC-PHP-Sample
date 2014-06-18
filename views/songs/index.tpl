<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
	
		<?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
		
        <h1>News songs</h1>
        <table cellspacing="2" cellpadding="2">
        
		<?php 
            if ($songs):
            foreach ($songs as $a): ?>
            <tr>
            <td><a href="/mvc-site/songs/details/<?php echo $a['id']; ?>"><?php echo $a['track']; ?></a></td>
            <td><?php echo $a['artist']; ?></td>
            </tr>
			
		<?php 
            endforeach;
            else: ?>
        
        <h1>Welcome!</h1>
        <p>We currently do not have any songs.</p>

        <?php endif; ?>
        </table>
    </body>
</html>