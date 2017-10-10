<?php echo "<?php \$this->assign('title', __('{$pluralHumanName}')); ?>"; ?>

<div class="ui two column grid stackable">
	<div class="column">
		<div class="ui one column grid">
			<div class="column">
                <h2 class="ui horizontal divider header">
                    <?php echo "<?php echo __('{$pluralHumanName}'); ?>\n"; ?>
					<a class="anchor" id="variations"></a>
                </h2>
            </div>
		</div>
	</div>

	<div class="column">
		<?php echo "<?php echo \$this->Html->link(__('<i class=\"icon add\"></i> Agregar " . $singularHumanName . "'), array('action' => 'add'),array('escape' => false, 'class' => 'ui basic green button')); ?>\n"; ?>
    </div>

</div>

<?php
$done = array();
foreach ($associations as $type => $data) { ?>
    <?php
    foreach ($data as $alias => $details) {
        if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
            echo "<div class=\"row\">\n";
            echo "\t<div class=\"ui small breadcrumb\">\n";
            echo "\t\t<?php echo \$this->Html->link(__('<i class=\"icon list\"></i>" . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'),array('escape' => false, 'class' => 'section')); ?>\n";
            echo "\t\t<span class=\"divider\">/</span>\n";
            echo "\t\t<?php echo \$this->Html->link(__('<i class=\"icon add\"></i>" . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'),array('escape' => false, 'class' => 'section')); ?>\n";
            echo "\t</div>\n";
            echo "</div>\n";
            $done[] = $details['controller'];
        }
    }
    ?>
    <?php } ?>

<div class="ui equal width center aligned padded grid">
	<div class="row">
		<table class="ui compact blue celled padded table striped  collapsing centered">
			<thead>
				<tr>
                    <?php
                    foreach ($fields as $field){
                        echo "\t\t\t\t\t<th class=\"collapsing\"> <?php echo \$this->Paginator->sort('{$field}'); ?> </th>\n";

                    }
                    echo "\t\t\t\t\t<th class=\"actions\"> <?php echo __('Actions'); ?> </th>\n";
                    ?>
				</tr>
			</thead>
		<tbody>
		<?php
		echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
		echo "\t\t\t<tr>\n";
			foreach ($fields as $field) {
				$isKey = false;
				if (!empty($associations['belongsTo'])) {
					foreach ($associations['belongsTo'] as $alias => $details) {
						if ($field === $details['foreignKey']) {
							$isKey = true;
							echo "\t\t\t\t<td class=\"collapsing\"><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
							break;
						}
					}
				}
				if ($isKey !== true) {
					echo "\t\t\t\t<td class=\"collapsing\"><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
				}
			}

			echo "\t\t\t\t<td class=\"actions collapsing\">\n";
			echo "\t\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"search button grey icon\"></i>'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false)); ?>\n";
			echo "\t\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"edit icon\"></i>'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false)); ?>\n";
			echo "\t\t\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"trash red icon\"></i>'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('confirm' => __('Seguro que deseas eliminar # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']), 'escape'=>false)); ?>\n";
			echo "\t\t\t\t</td>\n";
			echo "\t\t\t</tr>\n";

		echo "\t\t<?php endforeach; ?>\n";
		?>
		</tbody>
			<tfoot>
			<tr>
				<td colspan= "<?php echo count($fields) + 1?>">
					<?php echo "<?php echo \$this->element('Semantic/cake-Paginator'); ?>\n";?>
					Total <?php echo "<?php echo number_format(\$this->Paginator->counter('{:count}'),0); ?>\n" ?>
                    <?php echo "<?php echo __('{$pluralHumanName}'); ?>\n"; ?>
				</td>
			</tr>
			</tfoot>
			</tbody>
		</table>
	</div>
</div>





