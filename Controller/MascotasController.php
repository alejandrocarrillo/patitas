<?php
App::uses('AppController', 'Controller');
/**
 * Mascotas Controller
 *
 * @property Mascota $Mascota
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class MascotasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mascota->recursive = 0;
		$this->set('mascotas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mascota->exists($id)) {
			throw new NotFoundException(__('Invalid mascota'));
		}
		$options = array('conditions' => array('Mascota.' . $this->Mascota->primaryKey => $id));
		$this->set('mascota', $this->Mascota->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mascota->create();
			if ($this->Mascota->save($this->request->data)) {
				$this->Flash->success(__('The mascota has been saved.'));
				return $this->redirect(array('controller'=>'usuarios','action' => 'view', $this->request->data['Mascota']['usuario_id']));
			} else {
				$this->Flash->error(__('The mascota could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Mascota->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mascota->exists($id)) {
			throw new NotFoundException(__('Invalid mascota'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mascota->save($this->request->data)) {
				$this->Flash->success(__('The mascota has been saved.'));
				return $this->redirect(array('action' => 'view', $this->request->data['Mascota']['id'] ));
			} else {
				$this->Flash->error(__('The mascota could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mascota.' . $this->Mascota->primaryKey => $id));
			$this->request->data = $this->Mascota->find('first', $options);
		}
		$usuarios = $this->Mascota->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mascota->id = $id;
		if (!$this->Mascota->exists()) {
			throw new NotFoundException(__('Invalid mascota'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mascota->delete()) {
			$this->Flash->success(__('The mascota has been deleted.'));
		} else {
			$this->Flash->error(__('The mascota could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
