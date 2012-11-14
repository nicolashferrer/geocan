<div class="patients form">
<?php echo $this->Form->create('Patient');?>
	<fieldset>
		<legend><?php echo __('Editar Preguntas'); ?></legend>

		<?php
			echo $this->Form->input('id');
		
			$i = 0;
			
			foreach ($questions as $question):
				echo $this->Form->hidden('Answer.'.$i.'.id', array('value' => $question['answers']['id']));
				$opciones=array('1'=>'Si','0'=>'No',''=>'No Contesta');
		
				if ($question['answers']['valor'] == true)
					$atributos=array('legend'=>false,'value'=>'1' ,'separator'=>'');
			    elseif ($question['answers']['id'] == null)
					$atributos=array('legend'=>false,'value'=>'' ,'separator'=>''); 
				else 	
					$atributos=array('legend'=>false,'value'=>'0' ,'separator'=>'');
				
				echo "<div>";
				echo "<label class='label_radio'>".$question['questions']['descripcion']."</label>";
				echo $this->Form->hidden('Answer.'.$i.'.question_id', array('value' => $question['questions']['id']));
				echo $this->Form->radio('Answer.'.$i.'.valor',$opciones,$atributos);
				echo "</div>";
				//echo '<br>';
				$i++;
			
			endforeach;	
		?>
	
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
