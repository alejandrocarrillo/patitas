<?php
App::uses('AppController', 'Controller');

class LoginController extends AppController {
    public $name = "Login";

    public $uses = array('Usuario');


    public function salir() {
        $this->Session->destroy();
        $this->redirect('/');
    }

    public function index($from = null, $redirect = false) {

        if($this->Session->check('usuario')) {
            $this->set('logged', true);
        }

        if (!empty($this->data)) {

            $this->Usuario->set($this->data);

            unset($this->Usuario->validate['email']);
            unset($this->Usuario->validate['contrasena']);

            $_u = $this->data['Usuario']['email'];
            $_p = $this->data['Usuario']['contrasena'];

            if ($this->Usuario->validates() && $usuario = $this->Usuario->check_login($_u, $_p)) {
                $this->Session->write('usuario_id',$usuario['Usuario']['id']);
                $this->redirect(array('controller' => 'usuarios','action' => 'view', $usuario['Usuario']['id']));

            }
            else {
                $this->Session->setFlash(__('Login incorrecto, verifique los datos e intentelo de nuevo.'),'Semantic/cake-flash-alert');
                $this->set('error_messages', $this->Usuario->get_error_messages());
            }
        }
    }
}
?>