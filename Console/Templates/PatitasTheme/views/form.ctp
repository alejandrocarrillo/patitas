<?php echo "<?php \$this->assign('title', __('{$pluralHumanName}')); ?>"; ?>

<div class="ui two column grid stackable">

    <div class="column">
        <div class="ui one column grid">
            <div class="column">
                <h2 class="ui horizontal divider header">
                    <?php
                    if(strpos($action, 'add') === false){
                        echo "<?php echo __('Editar {$singularHumanName}'); ?>\n";
                    }else{
                        echo "<?php echo __('Agregar {$singularHumanName}'); ?>\n";
                    }
                    ?>
                    <a class="anchor" id="variations"></a>
                </h2>
            </div>
        </div>
    </div>

    <div class="column">
        <?php echo "<?php echo \$this->Html->link(__('<i class=\"icon list\"></i> Lista'), array('action' => 'index'),array('escape' => false, 'class' => 'ui basic button')); ?>\n";?>
        <?php if (strpos($action, 'add') === false): ?>
            <?php echo "<?php echo \$this->Form->postLink(__('<i class=\"icon erase\"></i> Eliminar'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('confirm' => __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}')),'escape' => false, 'class' => 'ui basic red button')); ?>"; ?>
        <?php endif; ?>
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
                        echo "\t</div>\n";
                        echo "</div>\n";
                        $done[] = $details['controller'];
                    }
                }
                ?>
    <?php } ?>

<div class="<?php echo $pluralVar; ?> form">
    <div class="ui equal width centered aligned padded grid">

    <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('novalidate' => 'novalidate', 'class' => 'ui form', 'inputDefaults' => array('label' => false,  'div' => false, 'class' => '', 'error' => array('attributes' => array('wrap' => 'small', 'class' => 'ui red pointing prompt label transition visible'))))); ?>\n"; ?>
        <div class="ui equal width form"> <br>
            <?php
            $var_name = "field";
            foreach ($fields as $field) {
                if (strpos($action, 'add') !== false && $field === $primaryKey) {
                    continue;
                } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                    echo "\t<?php $$var_name = '{$field}'; ?>\n";
                    echo "\t<div class='required field'>\n";
                    echo "\t\t <?php if(\$this->Form->isFieldError($$var_name)){ ?>\n";
                    echo "\t\t <div class=\"ui form error\">\n";
                    echo "\t\t\t <div class=\"ui error message\">\n";
                    echo "\t\t\t\t <?php } ?>\n";
                    echo "\t\t\t\t <?php echo \$this->Form->input($$var_name, array('placeholder' =>$$var_name));?>\n";
                    echo "\t\t\t\t <?php if(\$this->Form->isFieldError($$var_name)){ ?>\n";
                    echo "\t\t\t\t <div class=\"header\">Error</div>\n";
                    echo "\t\t\t </div>\n";
                    echo "\t\t </div>\n";
                    echo "\t <?php } ?>\n";
                    echo "\t</div>\n";

                    //echo "\t\t echo \$this->Form->input('{$field}');\n";
                }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {

                    echo "<?php $$var_name = '{$assocName}'; ?>\n";
                    echo "<div class='required field'>\n";
                    echo "\t <?php if(\$this->Form->isFieldError($$var_name)){ ?>\n";
                    echo "\t\t <div class=\"ui form error\">\n";
                    echo "\t\t\t <div class=\"ui error message\">\n";
                    echo "\t\t\t\t <?php } ?>\n";
                    echo "\t\t\t\t <?php echo \$this->Form->input($$var_name, array('placeholder' =>$$var_name));?>\n";
                    echo "\t\t\t\t <?php if(\$this->Form->isFieldError($$var_name)){ ?>\n";
                    echo "\t\t\t\t <div class=\"header\">Error</div>\n";
                    echo "\t\t\t </div>\n";
                    echo "\t\t </div>\n";
                    echo "\t <?php } ?>\n";
                    echo "</div>\n";

                    //echo "\t\techo \$this->Form->input('{$assocName}');\n";
                }
            }
            ?>
            <div class='field'>
                <?php echo "<?php echo \$this->Form->button('Guardar', array('type' => 'submit', 'class' => 'ui green big button')); ?>\n"; ?>
            </div>
        </div>
        <?php echo "<?php echo \$this->Form->end(); ?>\n";?>
    </div>
</div>