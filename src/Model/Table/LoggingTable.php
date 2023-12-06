<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Logging Model
 *
 * @method \App\Model\Entity\Logging newEmptyEntity()
 * @method \App\Model\Entity\Logging newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Logging[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Logging get($primaryKey, $options = [])
 * @method \App\Model\Entity\Logging findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Logging patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Logging[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Logging|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Logging saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Logging[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Logging[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Logging[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Logging[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LoggingTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('logging');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('forslagid')
            ->requirePresence('forslagid', 'create')
            ->notEmptyString('forslagid');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('TIMESTAMP')
            ->requirePresence('TIMESTAMP', 'create')
            ->notEmptyDateTime('TIMESTAMP');

        return $validator;
    }
}
