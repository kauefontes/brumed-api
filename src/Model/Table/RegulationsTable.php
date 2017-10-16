<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regulations Model
 *
 * @property \App\Model\Table\OccurrencesTable|\Cake\ORM\Association\HasMany $Occurrences
 *
 * @method \App\Model\Entity\Regulation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Regulation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Regulation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Regulation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Regulation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Regulation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Regulation findOrCreate($search, callable $callback = null, $options = [])
 */
class RegulationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('regulations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Occurrences', [
            'foreignKey' => 'regulation_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('code')
            ->allowEmpty('code');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        return $validator;
    }
}
