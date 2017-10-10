<?php echo "<?php \$this->assign('title', __('{$pluralHumanName}')); ?>"; ?>

<div class="ui two column grid stackable">

    <div class="column">
        <div class="ui one column grid">
            <div class="column"><h2 class="ui horizontal divider header">
                    <?php echo "<?php echo __('{$singularHumanName}'); ?>\n"; ?>
                    <a class="anchor" id="variations"></a>
                </h2>
            </div>
        </div>
    </div>

    <div class="column">
        <?php echo "<?php echo \$this->Html->link(__('<i class=\"icon add\"></i> Agregar'), array('action' => 'add'),array('escape' => false, 'class' => 'ui basic green button')); ?>\n"; ?>
        <?php echo "<?php echo \$this->Html->link(__('<i class=\"icon edit\"></i> Editar'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'ui basic blue button')); ?>\n" ?>
        <?php echo "<?php echo \$this->Form->postLink(__('<i class=\"icon erase\"></i> Eliminar'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('confirm' => __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']), 'escape' => false, 'class' => 'ui basic red button')); ?>\n";?>
        <?php echo "<?php echo \$this->Html->link(__('<i class=\"icon list\"></i> Lista'), array('action' => 'index'),array('escape' => false, 'class' => 'ui basic button')); ?>\n";?>

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
                echo "\t\t<?php echo \$this->Html->link(__('<i class=\"icon list\"></i> " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'),array('escape' => false, 'class' => 'section')); ?>\n";
                echo "\t\t<span class=\"divider\">/</span>\n";
                echo "\t\t<?php echo \$this->Html->link(__('<i class=\"icon add\"></i> " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'),array('escape' => false, 'class' => 'section')); ?>\n";
                echo "\t</div>\n";
                echo "</div>\n";
                $done[] = $details['controller'];
            }
        }
        ?>
    <?php } ?>

<div class="ui equal width center aligned padded grid">
    <div class="row">
        <table class="ui compact blue celled padded table striped collapsing">
            <?php
            echo "\t<thead>\n";
            echo "\t<tr>\n";
            echo "\t\t<th colspan='4'> Datos <?php echo __('{$singularHumanName}'); ?> </th>\n";
            echo "\t</tr>\n";
            echo "\t</thead>\n";

            echo "\t<tbody>\n";

            $i = 0;
            foreach ($fields as $field) {

                if($i & 1) {
                    echo "\t<tr>\n";
                }

                $isKey = false;

                if (!empty($associations['belongsTo'])) {

                    foreach ($associations['belongsTo'] as $alias => $details) {
                        if ($field === $details['foreignKey']) {
                            $isKey = true;
                            echo "\t\t<td class='positive'><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></td>\n";
                            echo "\t\t<td> <?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>&nbsp;</td>\n";
                            break;
                        }
                    }
                }

                if ($isKey !== true) {
                    echo "\t\t<td class='positive'><?php echo __('" . Inflector::humanize($field) . "'); ?></td>\n";
                    echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                }

                if($i & 2) {
                    echo "\t</tr>\n";
                }
                $i++;
                $i++;

            }
            echo "\t</tbody>\n";
            ?>
        </table>
    </div>
</div>


<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details):
        ?>
<div class="related">
    <h3><?php echo "<?php echo __('" . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
    <?php echo "\t<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>

        <table class="ui compact blue celled padded table striped  collapsing">
                <?php
                echo "\t\t\t\t<thead>\n";
                echo "\t\t\t\t<tr>\n";
                echo "\t\t\t\t\t<th> Datos <?php echo __('".Inflector::humanize($details['controller'])."'); ?> </th>\n";
                echo "\t\t\t\t</tr>\n";
                echo "\t\t\t\t</thead>\n";

                echo "\t\t\t\t<tbody>\n";

                $i = 0;
                foreach ($details['fields'] as $field) {
                    if($i & 1) {
                        echo "\t\t\t\t<tr>";
                    }

                    echo "\t\t\t\t\t<td><?php echo __('" . Inflector::humanize($field) . "'); ?></td>\n";
                    echo "\t\t\t\t\t<td><?php echo \${$singularVar}['{$alias}']['{$field}']; ?>&nbsp;</td>\n";

                    if($i & 2) {
                        echo "\t\t\t\t</tr>";
                    }
                    $i++;
                    $i++;

                }

                echo "</tbody>";

                ?>
        </table>
            <?php echo "\t<?php endif; ?>\n"; ?>
<div class="column">
    <div class="ui mini breadcrumb">
                    <?php echo "\t\t\t<?php echo \$this->Html->link(__(' <i class=\"icon edit\"></i> Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']),array('escape' => false, 'class' => 'section'));?>\n"; ?>
    </div>
</div>

	</div>
        <?php
    endforeach;
endif;

    if (empty($associations['hasMany'])) {
        $associations['hasMany'] = array();
    }
    if (empty($associations['hasAndBelongsToMany'])) {
        $associations['hasAndBelongsToMany'] = array();
    }
    $relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
    foreach ($relations as $alias => $details):
        $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    ?>

<div class="related">
    <h3><?php echo "<?php echo __('" . $otherPluralHumanName . "'); ?>"; ?></h3>
    <div class="column">
        <div class="ui mini breadcrumb">
            <?php echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"icon add\"></i> " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('escape' => false, 'class' => 'section')); ?>\n"; ?>
        </div>
    </div>

    <?php echo "\t<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
        <div class="ui equal width center aligned padded grid">
            <div class="row">
                <table class="ui compact blue celled padded table striped collapsing centered">
                    <thead>
                        <tr>
                            <?php
                            foreach ($details['fields'] as $field){
                                echo "\t\t\t\t\t\t\t<th class=\"collapsing\"><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";

                            }
                            echo "\t\t\t\t\t\t\t<th class=\"actions\"><?php echo __('Actions'); ?></th>\n";
                            ?>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        echo "\t\t\t\t\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
                        echo "\t\t\t\t\t\t<tr>\n";
                        foreach ($details['fields'] as $field) {
                            echo "\t\t\t\t\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
                        }
                        echo "\t\t\t\t\t\t\t<td class=\"actions collapsing\">\n";
                        echo "\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"search button grey icon\"></i>'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape'=>false)); ?>\n";
                        echo "\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"edit icon\"></i>'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape'=>false)); ?>\n";
                        echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"trash red icon\"></i>'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('confirm' => __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}']), 'escape'=>false)); ?>\n";
                        echo "\t\t\t\t\t\t\t</td>\n";
                        echo "\t\t\t\t\t\t</tr>\n";
                        echo "\t\t\t\t\t<?php endforeach; ?>\n";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php echo "\t\t<?php endif; ?>\n\n"; ?>
</div>
    <?php endforeach; ?>
