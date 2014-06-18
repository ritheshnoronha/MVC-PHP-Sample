<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf8" />
        <title><?php echo $firstname; ?> - Details</title>
    </head>
    <body>
	
		<?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
		
		<?php if (!isset($noLeads)): ?>
		
			<article>
				<header>
				    <h1>Lead Details</h1>
                    <p><?php echo $firstname; ?>&nbsp; <?php echo $lastname; ?></p>
                    <p><?php echo $message; ?></p>
				</header>
			
			</article>
		
		<?php else: ?>
		
			<h1>There is no Lead with the ID you specified.</h1>
		
		<?php endif; ?>
		
		<a href="/mvc-site/contact/leads">Back to Leads list</a>
		
    </body>
</html>