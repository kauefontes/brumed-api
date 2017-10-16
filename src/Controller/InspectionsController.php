<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\NotFoundException;


/**
 * Inspections Controller
 *
 * @property \App\Model\Table\InspectionsTable $Inspections
 *
 * @method \App\Model\Entity\Inspection[] paginate($object = null, array $settings = [])
 */
class InspectionsController extends AppController
{


    public function initialize(){
        parent::initialize();
        //$this->loadComponent('RequestHandler');
        $this->Auth->allow(['index','add','edit','delete','view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies','Occurrences']
        ];
        if($this->request->query('company_id') != null) {
            $this->paginate['conditions']['Inspections.company_id'] = $this->request->query('company_id');
        }
        $inspections = $this->paginate($this->Inspections);

        $this->set(compact('inspections'));
        $this->set('_serialize', ['inspections']);
    }

    /**
     * View method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspection = $this->Inspections->get($id, [
            'contain' => ['Companies', 'Occurrences']
        ]);

        $this->set('inspection', $inspection);
        $this->set('_serialize', ['inspection']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspection = $this->Inspections->newEntity();
        if ($this->request->is('post')) {
            $inspection->created_at = date('Y-m-d H:i:s');
            $inspection = $this->Inspections->patchEntity($inspection, $this->request->getData());
            if (!$this->Inspections->save($inspection)) {
                throw new InternalErrorException();    
            }
            $this->set(compact('inspection'));
            $this->set('_serialize', ['inspection']);
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspection = $this->Inspections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspection = $this->Inspections->patchEntity($inspection, $this->request->getData());
            if (!$this->Inspections->save($inspection)) {
                throw new InternalErrorException();
            }
            $this->set(compact('inspection'));
            $this->set('_serialize', ['inspection']);
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspection = $this->Inspections->get($id);
        if (!$this->Inspections->delete($inspection)) {
            throw new InternalErrorException();
        }
        $this->set(compact('inspection'));
        $this->set('_serialize', ['inspection']);
    }
}
