<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Internalcomments Model
 *
 * @method \App\Model\Entity\Internalcomment newEmptyEntity()
 * @method \App\Model\Entity\Internalcomment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Internalcomment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Internalcomment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Internalcomment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Internalcomment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Internalcomment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Internalcomment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internalcomment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internalcomment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Internalcomment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Internalcomment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Internalcomment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InternalcommentsTable extends Table
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

        $this->setTable('internalcomments');
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
            ->scalar('user')
            ->requirePresence('user', 'create')
            ->notEmptyString('user');

        $validator
            ->scalar('Content')
            ->requirePresence('Content', 'create')
            ->notEmptyString('Content');

        $validator
            ->scalar('forslagid')
            ->requirePresence('forslagid', 'create')
            ->notEmptyString('forslagid');

        $validator
            ->dateTime('TIMESTAMP')
            ->requirePresence('TIMESTAMP', 'create')
            ->notEmptyDateTime('TIMESTAMP');

        return $validator;
    }
}
