<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forslag Model
 *
 * @method \App\Model\Entity\Forslag newEmptyEntity()
 * @method \App\Model\Entity\Forslag newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Forslag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Forslag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Forslag findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Forslag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Forslag[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Forslag|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forslag saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forslag[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forslag[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forslag[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forslag[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ForslagTable extends Table
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

        $this->setTable('forslag');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('kategori')
            ->requirePresence('kategori', 'create')
            ->notEmptyString('kategori');

        $validator
            ->scalar('comments')
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

        $validator
            ->integer('state')
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('jirakey')
            ->requirePresence('jirakey', 'create')
            ->notEmptyString('jirakey');

        $validator
            ->dateTime('Dateadded')
            ->requirePresence('Dateadded', 'create')
            ->notEmptyDateTime('Dateadded');

        $validator
            ->dateTime('updatedate')
            ->requirePresence('updatedate', 'create')
            ->notEmptyDateTime('updatedate');

        return $validator;
    }
}
