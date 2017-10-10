<div class="ui two column grid">
    <div class="column centered">
        <?php echo $this->Form->create('Usuario',array('url' => array('controller' => 'login', 'action' => 'index'), 'id' => 'login', 'class' => 'ui form', 'data-abide', 'inputDefaults' => array('div' => false, 'class' => '', 'error' => array('attributes' => array('wrap' => 'small', 'class' => 'error'))))); ?>
            <div class="ui segment">
                <h2 class="ui teal centered header">
                    <div class=" content">
                        <?php echo $this->Html->image('patitas.png', array('width'=>'20px'));?> Patitas
                    </div>
                </h2>

                <?php $field = 'email'; ?>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <?php if($this->Form->isFieldError($field)){ ?>
                        <div class="ui form error">
                            <div class="ui error message">
                                <?php } ?>
                                <?php echo $this->Form->input($field, array('label'=>'','empty'=>'Usuario','placeholder' => $field,'class' => '','required'=>'required'));?>
                                <?php if($this->Form->isFieldError($field)){ ?>
                                <div class="header">Error</div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>

                <?php $field = 'contrasena'; ?>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <?php if($this->Form->isFieldError($field)){ ?>
                        <div class="ui form error">
                            <div class="ui error message">
                                <?php } ?>
                                <?php echo $this->Form->input($field, array('label'=>'','empty'=>true,'placeholder' => 'Contraseña','type' => 'password'));					?>
                                <?php if($this->Form->isFieldError($field)){ ?>
                                <div class="header">Error</div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <?php echo $this->Form->submit('INGRESAR', array('class' => 'ui fluid large teal  submit button', 'escape' => false)); ?>
            </div>
        <?php echo $this->Form->end();?>
    </div>
</div>
<div class="background-image"></div>
