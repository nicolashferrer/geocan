<?php
App::uses('AppController', 'Controller');

class AuditsController extends AppController {
 
	var $components = array('Filter.Filter');

		var $filters = array
		(
            'index' => array  
            (  
                'Audit' => array  
                (  
                    'Audit.event'  => array  
                    (  
                        'type' => 'select',  
                        'label' => 'Acción',                     
                        'selector' => 'getAcciones'  
                    ),
                    'Audit.model' => array  
                    (  
                        'type' => 'select',  
                        'label' => 'Modelos',                     
                        'selector' => 'getModelos'  
                    )    
                )  
            )  
        ); 
		
/**
 * index method
 *
 * @return void
 */
	public function index() {
			
		$condiciones = null;
		if (!empty($this->request->data)) {
			
			$accion = $this->request->data['Audit']['event'];
			$modelo = $this->request->data['Audit']['model'];
			
			if ($accion!='') {
				$condiciones[] = array('Audit.event' => $accion);
			}
			
			if ($modelo!='') {
				$condiciones[] = array('Audit.model' => $modelo);
			}
		}
					
		$this->Audit->recursive = 0;
		$this->set('audits', $this->paginate('Audit',$condiciones));

	}

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array(
		'index', 'view');
    }

}
