<?php $this->assign('title', __('Usuarios')); ?>
<div class="ui two column grid stackable">

    <div class="column">
        <div class="ui one column grid">
            <div class="column">
                <h2 class="ui horizontal divider header">
                    <?php echo __('Editar Usuario'); ?>
                    <a class="anchor" id="variations"></a>
                </h2>
            </div>
        </div>
    </div>

    <div class="column">
        <?php echo $this->Html->link(__('<i class="icon user outline"></i> Dueño'), array('action' => 'view', $this->Form->value('Usuario.id')),array('escape' => false, 'class' => 'ui basic button')); ?>
        <?php echo $this->Form->postLink(__('<i class="icon erase"></i> Eliminar'), array('action' => 'delete', $this->Form->value('Usuario.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Usuario.id')),'escape' => false, 'class' => 'ui basic red button')); ?>            </div>
</div>

    
<div class="usuarios form">
    <div class="ui equal width centered aligned padded grid">

    <?php echo $this->Form->create('Usuario', array('novalidate' => 'novalidate', 'class' => 'ui form', 'inputDefaults' => array('label' => false,  'div' => false, 'class' => '', 'error' => array('attributes' => array('wrap' => 'small', 'class' => 'ui red pointing prompt label transition visible'))))); ?>
        <div class="ui equal width form"> <br>
            	<?php $field = 'id'; ?>
	<div class='required field'>
		 <?php if($this->Form->isFieldError($field)){ ?>
		 <div class="ui form error">
			 <div class="ui error message">
				 <?php } ?>
				 <?php echo $this->Form->input($field, array('placeholder' =>$field));?>
				 <?php if($this->Form->isFieldError($field)){ ?>
				 <div class="header">Error</div>
			 </div>
		 </div>
	 <?php } ?>
	</div>
	<?php $field = 'nombre'; ?>
	<div class='required field'>
		 <?php if($this->Form->isFieldError($field)){ ?>
		 <div class="ui form error">
			 <div class="ui error message">
				 <?php } ?>
				 <?php echo $this->Form->input($field, array('placeholder' =>$field));?>
				 <?php if($this->Form->isFieldError($field)){ ?>
				 <div class="header">Error</div>
			 </div>
		 </div>
	 <?php } ?>
	</div>
	<?php $field = 'email'; ?>
	<div class='required field'>
		 <?php if($this->Form->isFieldError($field)){ ?>
		 <div class="ui form error">
			 <div class="ui error message">
				 <?php } ?>
				 <?php echo $this->Form->input($field, array('placeholder' =>$field));?>
				 <?php if($this->Form->isFieldError($field)){ ?>
				 <div class="header">Error</div>
			 </div>
		 </div>
	 <?php } ?>
	</div>
	<?php $field = 'contrasena'; ?>
	<div class='required field'>
		 <?php if($this->Form->isFieldError($field)){ ?>
		 <div class="ui form error">
			 <div class="ui error message">
				 <?php } ?>
				 <?php echo $this->Form->input($field, array('placeholder' =>$field));?>
				 <?php if($this->Form->isFieldError($field)){ ?>
				 <div class="header">Error</div>
			 </div>
		 </div>
	 <?php } ?>
	</div>
	<?php $field = 'telefono'; ?>
	<div class='required field'>
		 <?php if($this->Form->isFieldError($field)){ ?>
		 <div class="ui form error">
			 <div class="ui error message">
				 <?php } ?>
				 <?php echo $this->Form->input($field, array('placeholder' =>$field));?>
				 <?php if($this->Form->isFieldError($field)){ ?>
				 <div class="header">Error</div>
			 </div>
		 </div>
	 <?php } ?>
	</div>
            <div class='field'>
                <?php echo $this->Form->button('Guardar', array('type' => 'submit', 'class' => 'ui green big button')); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>