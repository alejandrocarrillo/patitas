<?php $this->assign('title', __('Mascotas')); ?>
<div class="ui two column grid stackable">

    <div class="column">
        <div class="ui one column grid">
            <div class="column"><h2 class="ui horizontal divider header">
                    <?php echo __('Mascota'); ?>
                    <a class="anchor" id="variations"></a>
                </h2>
            </div>
        </div>
    </div>

    <div class="column">
        <?php echo $this->Html->link(__('<i class="icon edit"></i> Editar'), array('action' => 'edit', $mascota['Mascota']['id']), array('escape' => false, 'class' => 'ui basic blue button')); ?>
        <?php echo $this->Form->postLink(__('<i class="icon erase"></i> Eliminar'), array('action' => 'delete', $mascota['Mascota']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $mascota['Mascota']['id']), 'escape' => false, 'class' => 'ui basic red button')); ?>
        <?php echo $this->Html->link(__('<i class="icon user outline"></i> Dueño'), array('controller'=>'usuarios','action' => 'view', $mascota['Mascota']['usuario_id'] ),array('escape' => false, 'class' => 'ui basic button')); ?>

    </div>
</div>
    
<div class="ui equal width center aligned padded grid">
    <div class="row">
        <table class="ui compact blue celled padded table striped collapsing">
            <thead>
	<tr>
		<th colspan='4'> Datos <?php echo __('Mascota'); ?> </th>
	</tr>
	</thead>
	<tbody>
		<td class='positive'><?php echo __('Nombre'); ?></td>
		<td><?php echo h($mascota['Mascota']['nombre']); ?>&nbsp;</td>
	</tr>
		<td class='positive'><?php echo __('Especie'); ?></td>
		<td><?php echo h($mascota['Mascota']['especie']); ?>&nbsp;</td>
		<td class='positive'><?php echo __('Raza'); ?></td>
		<td><?php echo h($mascota['Mascota']['raza']); ?>&nbsp;</td>
	</tr>
		<td class='positive'><?php echo __('Genero'); ?></td>
		<td><?php echo h($mascota['Mascota']['genero']); ?>&nbsp;</td>
		<td class='positive'><?php echo __('Edad'); ?></td>
		<td><?php echo h($mascota['Mascota']['edad']); ?>&nbsp;</td>
	</tr>
		<td class='positive'><?php echo __('Color'); ?></td>
		<td><?php echo h($mascota['Mascota']['color']); ?>&nbsp;</td>
		<td class='positive'><?php echo __('Descripcion'); ?></td>
		<td><?php echo h($mascota['Mascota']['descripcion']); ?>&nbsp;</td>
	</tr>
		<td class='positive'><?php echo __('Usuario'); ?></td>
		<td> <?php echo $this->Html->link($mascota['Usuario']['nombre'], array('controller' => 'usuarios', 'action' => 'view', $mascota['Usuario']['id'])); ?>&nbsp;</td>
	</tr>

	</tbody>
        </table>
    </div>
</div>


