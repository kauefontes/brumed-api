<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\NotFoundException;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 *
 * @method \App\Model\Entity\Company[] paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
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
        $companies = $this->paginate($this->Companies);

        $this->set(compact('companies'));
        $this->set('_serialize', ['companies']);
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Inspections' => ['Occurrences']]
        ]);

        $this->set('company', $company);
        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->input('json_decode', true));
            $company->created_at = date('Y-m-d H:i:s');
            debug($company);
            exit;
            //$company->updated_at = date('Y-m-d H:i:s');
            if (!$this->Companies->save($company)) {
                throw new InternalErrorException("Verifique os campos corretamente e tente novamente.");
            }
            $this->set('company', $company);
            $this->set('_serialize', ['company']);
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->input('json_decode', true));
            if (!$this->Companies->save($company)) {
                throw new InternalErrorException("Verifique os campos corretamente e tente novamente.");
            }
            $this->set('company', $company);
            $this->set('_serialize', ['company']);
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if (!$this->Companies->delete($company)) {
            throw new InternalErrorException("Não foi possivel remover, tente novamente!");   
        }
        $this->set('company', $company);
        $this->set('_serialize', ['company']);
    }
}
