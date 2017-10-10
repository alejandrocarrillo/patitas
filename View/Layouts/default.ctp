<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'Patitas');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
    echo $this->Html->script('jquery-3.2.1.min');
    echo $this->Html->css('semantic2/semantic.min');
    echo $this->Html->script('../css/semantic2/semantic.min');

    echo $this->Html->css('main');

    ?>
</head>
<body>
<div class="ui container">
    <div class="ui two column grid">
        <div class="column centered">
            <?php echo $this->Session->flash(); ?>
        </div>
    </div>

    <div class="ui  stackable grid">
        <div class="ui sixteen wide column">
            <p>
                <?php echo $this->fetch('content'); ?>
            </p>
        </div>
    </div>

</div>
</body>
</html>
