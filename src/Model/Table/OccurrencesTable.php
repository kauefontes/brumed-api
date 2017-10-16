<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Occurrences Model
 *
 * @property \App\Model\Table\RegulationsTable|\Cake\ORM\Association\BelongsTo $Regulations
 * @property \App\Model\Table\InspectionsTable|\Cake\ORM\Association\BelongsTo $Inspections
 *
 * @method \App\Model\Entity\Occurrence get($primaryKey, $options = [])
 * @method \App\Model\Entity\Occurrence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Occurrence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Occurrence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Occurrence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Occurrence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Occurrence findOrCreate($search, callable $callback = null, $options = [])
 */
class OccurrencesTable extends Table
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

        $this->setTable('occurrences');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regulations', [
            'foreignKey' => 'regulation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Inspections', [
            'foreignKey' => 'inspection_id',
            'joinType' => 'INNER'
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
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('severity')
            ->allowEmpty('severity');

        $validator
            ->scalar('todo')
            ->allowEmpty('todo');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->allowEmpty('image');

        $validator
            ->scalar('correction')
            ->allowEmpty('correction');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['regulation_id'], 'Regulations'));
        $rules->add($rules->existsIn(['inspection_id'], 'Inspections'));

        return $rules;
    }
}
