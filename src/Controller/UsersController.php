<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if (!$user) {
                throw new InternalErrorException(__("Verifique os campos corretamente e tente novamente."));
            }
            $this->Auth->setUser($user);
            $this->response->type('json');
            $this->response->body(json_encode($user));
            return $this->response;
        }
    }

    public function logout(){

    }
}
