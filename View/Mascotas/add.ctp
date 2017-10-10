<?php $this->assign('title', __('Mascotas')); ?>
<div class="ui two column grid stackable">

    <div class="column">
        <div class="ui one column grid">
            <div class="column">
                <h2 class="ui horizontal divider header">
                    <?php echo __('Agregar Mascota'); ?>
                    <a class="anchor" id="variations"></a>
                </h2>
            </div>
        </div>
    </div>

    <div class="column">
        <?php echo $this->Html->link(__('<i class="icon user outline"></i> Dueño'), array('controller'=>'usuarios','action' => 'view',  $this->Session->read('usuario_id') ),array('escape' => false, 'class' => 'ui basic button')); ?>
            </div>
</div>
<div class="mascotas form">
    <div class="ui equal width centered aligned padded grid">

    <?php echo $this->Form->create('Mascota', array('novalidate' => 'novalidate', 'class' => 'ui form', 'inputDefaults' => array('label' => false,  'div' => false, 'class' => '', 'error' => array('attributes' => array('wrap' => 'small', 'class' => 'ui red pointing prompt label transition visible'))))); ?>
        <div class="ui equal width form"> <br>
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
	<?php $field = 'especie'; ?>
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
	<?php $field = 'raza'; ?>
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
	<?php $field = 'genero'; ?>
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
	<?php $field = 'edad'; ?>
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
	<?php $field = 'color'; ?>
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
	<?php $field = 'descripcion'; ?>
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


				 <?php echo $this->Form->input('usuario_id', array('type'=>'hidden', 'placeholder' =>'usuario_id', 'value'=> $this->Session->read('usuario_id')));?>

            <div class='field'>
                <?php echo $this->Form->button('Guardar', array('type' => 'submit', 'class' => 'ui green big button')); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>