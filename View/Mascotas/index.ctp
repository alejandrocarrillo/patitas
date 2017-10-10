<?php $this->assign('title', __('Mascotas')); ?>
<div class="ui two column grid stackable">
	<div class="column">
		<div class="ui one column grid">
			<div class="column">
                <h2 class="ui horizontal divider header">
                    <?php echo __('Mascotas'); ?>
					<a class="anchor" id="variations"></a>
                </h2>
            </div>
		</div>
	</div>

	<div class="column">
		<?php echo $this->Html->link(__('<i class="icon add"></i> Agregar Mascota'), array('action' => 'add'),array('escape' => false, 'class' => 'ui basic green button')); ?>
    </div>

</div>

    <div class="row">
	<div class="ui small breadcrumb">
		<?php echo $this->Html->link(__('<i class="icon list"></i>Usuarios'), array('controller' => 'usuarios', 'action' => 'index'),array('escape' => false, 'class' => 'section')); ?>
		<span class="divider">/</span>
		<?php echo $this->Html->link(__('<i class="icon add"></i>Usuario'), array('controller' => 'usuarios', 'action' => 'add'),array('escape' => false, 'class' => 'section')); ?>
	</div>
</div>
    
<div class="ui equal width center aligned padded grid">
	<div class="row">
		<table class="ui compact blue celled padded table striped  collapsing centered">
			<thead>
				<tr>
                    					<th class="collapsing"> <?php echo $this->Paginator->sort('id'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('nombre'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('especie'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('raza'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('genero'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('edad'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('color'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('descripcion'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('usuario_id'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('created'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('modified'); ?> </th>
					<th class="actions"> <?php echo __('Actions'); ?> </th>
				</tr>
			</thead>
		<tbody>
		<?php foreach ($mascotas as $mascota): ?>
			<tr>
				<td class="collapsing"><?php echo h($mascota['Mascota']['id']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['nombre']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['especie']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['raza']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['genero']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['edad']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['color']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['descripcion']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo $this->Html->link($mascota['Usuario']['nombre'], array('controller' => 'usuarios', 'action' => 'view', $mascota['Usuario']['id'])); ?></td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['created']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($mascota['Mascota']['modified']); ?>&nbsp;</td>
				<td class="actions collapsing">
					<?php echo $this->Html->link(__('<i class="search button grey icon"></i>'), array('action' => 'view', $mascota['Mascota']['id']),array('escape'=>false)); ?>
					<?php echo $this->Html->link(__('<i class="edit icon"></i>'), array('action' => 'edit', $mascota['Mascota']['id']),array('escape'=>false)); ?>
					<?php echo $this->Form->postLink(__('<i class="trash red icon"></i>'), array('action' => 'delete', $mascota['Mascota']['id']), array('confirm' => __('Seguro que deseas eliminar # %s?', $mascota['Mascota']['id']), 'escape'=>false)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
			<tfoot>
			<tr>
				<td colspan= "12">
					<?php echo $this->element('Semantic/cake-Paginator'); ?>
					Total <?php echo number_format($this->Paginator->counter('{:count}'),0); ?>
                    <?php echo __('Mascotas'); ?>
				</td>
			</tr>
			</tfoot>
			</tbody>
		</table>
	</div>
</div>





