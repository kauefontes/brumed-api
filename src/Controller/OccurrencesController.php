<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Occurrences Controller
 *
 * @property \App\Model\Table\OccurrencesTable $Occurrences
 *
 * @method \App\Model\Entity\Occurrence[] paginate($object = null, array $settings = [])
 */
class OccurrencesController extends AppController
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
        $this->paginate = [
            'contain' => ['Regulations', 'Inspections']
        ];
        $occurrences = $this->paginate($this->Occurrences);

        $this->set(compact('occurrences'));
        $this->set('_serialize', ['occurrences']);
    }

    /**
     * View method
     *
     * @param string|null $id Occurrence id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $occurrence = $this->Occurrences->get($id, [
            'contain' => ['Regulations', 'Inspections']
        ]);
        $this->set('occurrence', $occurrence);
        $this->set('_serialize', ['occurrence']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $occurrence = $this->Occurrences->newEntity();
        if ($this->request->is('post')) {
            $occurrence = $this->Occurrences->patchEntity($occurrence, $this->request->getData());
            if (!$this->Occurrences->save($occurrence)) {
                throw new InternalErrorException();
            }
            $this->set(compact('occurrence'));
            $this->set('_serialize', ['occurrence']);
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Occurrence id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $occurrence = $this->Occurrences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $occurrence = $this->Occurrences->patchEntity($occurrence, $this->request->getData());
            if (!$this->Occurrences->save($occurrence)) {
                throw new InternalErrorException();
            }
            $this->set(compact('occurrence'));
            $this->set('_serialize', ['occurrence']);
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Occurrence id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $occurrence = $this->Occurrences->get($id);
        if (!$this->Occurrences->delete($occurrence)) {
            throw new InternalErrorException();
        }
        $this->set(compact('occurrence'));
        $this->set('_serialize', ['occurrence']);
    }
}
