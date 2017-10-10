<?php $this->assign('title', __('Usuarios')); ?>
<div class="ui two column grid stackable">
	<div class="column">
		<div class="ui one column grid">
			<div class="column">
                <h2 class="ui horizontal divider header">
                    <?php echo __('Usuarios'); ?>
					<a class="anchor" id="variations"></a>
                </h2>
            </div>
		</div>
	</div>

	<div class="column">
		<?php echo $this->Html->link(__('<i class="icon add"></i> Agregar Usuario'), array('action' => 'add'),array('escape' => false, 'class' => 'ui basic green button')); ?>
    </div>

</div>


<div class="ui equal width center aligned padded grid">
	<div class="row">
		<table class="ui compact blue celled padded table striped  collapsing centered">
			<thead>
				<tr>
                    					<th class="collapsing"> <?php echo $this->Paginator->sort('id'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('nombre'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('email'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('contrasena'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('telefono'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('created'); ?> </th>
					<th class="collapsing"> <?php echo $this->Paginator->sort('modified'); ?> </th>
					<th class="actions"> <?php echo __('Actions'); ?> </th>
				</tr>
			</thead>
		<tbody>
		<?php foreach ($usuarios as $usuario): ?>
			<tr>
				<td class="collapsing"><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($usuario['Usuario']['nombre']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($usuario['Usuario']['contrasena']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($usuario['Usuario']['telefono']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($usuario['Usuario']['created']); ?>&nbsp;</td>
				<td class="collapsing"><?php echo h($usuario['Usuario']['modified']); ?>&nbsp;</td>
				<td class="actions collapsing">
					<?php echo $this->Html->link(__('<i class="search button grey icon"></i>'), array('action' => 'view', $usuario['Usuario']['id']),array('escape'=>false)); ?>
					<?php echo $this->Html->link(__('<i class="edit icon"></i>'), array('action' => 'edit', $usuario['Usuario']['id']),array('escape'=>false)); ?>
					<?php echo $this->Form->postLink(__('<i class="trash red icon"></i>'), array('action' => 'delete', $usuario['Usuario']['id']), array('confirm' => __('Seguro que deseas eliminar # %s?', $usuario['Usuario']['id']), 'escape'=>false)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
			<tfoot>
			<tr>
				<td colspan= "8">
					<?php echo $this->element('Semantic/cake-Paginator'); ?>
					Total <?php echo number_format($this->Paginator->counter('{:count}'),0); ?>
                    <?php echo __('Usuarios'); ?>
				</td>
			</tr>
			</tfoot>
			</tbody>
		</table>
	</div>
</div>





