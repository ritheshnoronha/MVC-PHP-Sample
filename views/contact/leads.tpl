<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
	
		<?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
		
        <h1>New leads</h1>
        <table cellpadding="2" cellspacing="2" border="1">
		<?php 
            if ($leads):
            foreach ($leads as $a): ?>
            <tr>
            <td>
			 <a href="details/<?php echo $a['id']; ?>"><?php echo $a['first_name']; ?>&nbsp;<?php echo $a['last_name']; ?></a>
		      </td>
              <td><a href="edit/<?php echo $a['id']; ?>">Edit</a></td>
              <td><a href="delete/<?php echo $a['id']; ?>">Delete</a></td>
            </tr>
		<?php 
            endforeach;
            else: ?>

        <h1>Welcome!</h1>
        <p>We currently do not have any leads.</p>

        <?php endif; ?>
        </table>
		
    </body>
</html>