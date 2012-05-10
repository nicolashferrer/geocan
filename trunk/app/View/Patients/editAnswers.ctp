<div class="patients form">
<?php echo $this->Form->create('Patient');?>
	<fieldset>
		<legend><?php echo __('Editar Preguntas'); ?></legend>

		<?php
			$i = 0;
			foreach ($questions as $question):
			
				$opciones=array('1'=>'Si','0'=>'No',''=>'No Contesta');
				$atributos=array('legend'=>false,'value'=>'','separator'=>'');
				echo "<div class=input>";
				echo $this->Form->label($question['Question']['descripcion']);
				echo $this->Form->hidden('Answer.'.$i.'.question_id', array('value' => $question['Question']['id']));
				//echo $this->Form->hidden('Answer.'.$i.'patient_id', array('value' => ''));
				echo $this->Form->radio('Answer.'.$i.'.valor',$opciones,$atributos);
				echo "</div>";
				//echo '<br>';
				$i++;
			
			endforeach;	
		?>
	
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
