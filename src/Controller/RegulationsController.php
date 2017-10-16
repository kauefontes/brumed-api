<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Regulations Controller
 *
 * @property \App\Model\Table\RegulationsTable $Regulations
 *
 * @method \App\Model\Entity\Regulation[] paginate($object = null, array $settings = [])
 */
class RegulationsController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->Auth->allow(['index','add','edit','delete','view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {
        $regulations = $this->paginate($this->Regulations);
        $this->set(compact('regulations'));
        $this->set('_serialize', ['regulations']);
    }
}
