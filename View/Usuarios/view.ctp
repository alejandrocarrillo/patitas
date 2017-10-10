<?php $this->assign('title', __('Usuarios')); ?>
<div class="ui two column grid stackable">

    <div class="column">
        <div class="ui one column grid">
            <div class="column"><h2 class="ui horizontal divider header">
                    <?php echo __('Usuario'); ?>
                    <a class="anchor" id="variations"></a>
                </h2>
            </div>
        </div>
    </div>

    <div class="column">
        <?php echo $this->Html->link(__('<i class="icon add"></i> Agregar mascota'), array('controller'=>'mascotas','action' => 'add'),array('escape' => false, 'class' => 'ui basic green button')); ?>
        <?php echo $this->Html->link(__('<i class="icon edit"></i> Editar usuario'), array('action' => 'edit', $usuario['Usuario']['id']), array('escape' => false, 'class' => 'ui basic blue button')); ?>
        <?php echo $this->Form->postLink(__('<i class="icon erase"></i> Borrar cuenta'), array('action' => 'delete', $usuario['Usuario']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usuario['Usuario']['id']), 'escape' => false, 'class' => 'ui basic red button')); ?>

    </div>
</div>
    
<div class="ui equal width center aligned padded grid">
    <div class="row">
        <table class="ui compact blue celled padded table striped collapsing">
            	<thead>
	<tr>
		<th colspan='4'> Datos <?php echo __('Usuario'); ?> </th>
	</tr>
	</thead>
	<tbody>

		<td class='positive'><?php echo __('Nombre'); ?></td>
		<td><?php echo h($usuario['Usuario']['nombre']); ?>&nbsp;</td>
	</tr>
		<td class='positive'><?php echo __('Email'); ?></td>
		<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
		<td class='positive'><?php echo __('Contrasena'); ?></td>
		<td><?php echo h($usuario['Usuario']['contrasena']); ?>&nbsp;</td>
	</tr>
		<td class='positive'><?php echo __('Telefono'); ?></td>
		<td><?php echo h($usuario['Usuario']['telefono']); ?>&nbsp;</td>
	</tr>

	</tbody>
        </table>
    </div>
</div>

<div class="related">

        	<?php if (!empty($usuario['Mascota'])): ?>
            <div class="ui equal width center aligned padded grid">
                <h3 class="center"><?php echo __('Mascotas'); ?></h3>

                <div class="row">

                    <table class="ui compact blue celled padded table striped collapsing centered">
                        <thead>
                            <tr>
    							<th class="collapsing"><?php echo __('Nombre'); ?></th>
    							<th class="collapsing"><?php echo __('Especie'); ?></th>
    							<th class="actions"><?php echo __('Actions'); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($usuario['Mascota'] as $mascota): ?>
    						<tr>
    							<td><?php echo $mascota['nombre']; ?></td>
    							<td><?php echo $mascota['especie']; ?></td>
    							<td class="actions collapsing">
    								<?php echo $this->Html->link(__('<i class="search button grey icon"></i>'), array('controller' => 'mascotas', 'action' => 'view', $mascota['id']), array('escape'=>false)); ?>
    								<?php echo $this->Html->link(__('<i class="edit icon"></i>'), array('controller' => 'mascotas', 'action' => 'edit', $mascota['id']), array('escape'=>false)); ?>
    								<?php echo $this->Form->postLink(__('<i class="trash red icon"></i>'), array('controller' => 'mascotas', 'action' => 'delete', $mascota['id']), array('confirm' => __('Are you sure you want to delete # %s?', $mascota['id']), 'escape'=>false)); ?>
    							</td>
    						</tr>
    					<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
</div>