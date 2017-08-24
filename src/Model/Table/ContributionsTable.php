<?php
namespace Trois\Fundraising\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contributions Model
 *
 * @property \Trois\Fundraising\Model\Table\DonationsTable|\Cake\ORM\Association\HasMany $Donations
 *
 * @method \Trois\Fundraising\Model\Entity\Contribution get($primaryKey, $options = [])
 * @method \Trois\Fundraising\Model\Entity\Contribution newEntity($data = null, array $options = [])
 * @method \Trois\Fundraising\Model\Entity\Contribution[] newEntities(array $data, array $options = [])
 * @method \Trois\Fundraising\Model\Entity\Contribution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Trois\Fundraising\Model\Entity\Contribution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Trois\Fundraising\Model\Entity\Contribution[] patchEntities($entities, array $data, array $options = [])
 * @method \Trois\Fundraising\Model\Entity\Contribution findOrCreate($search, callable $callback = null, $options = [])
 */
class ContributionsTable extends Table
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

        $this->setTable('contributions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Donations', [
            'foreignKey' => 'contribution_id',
            'className' => 'Trois/Fundraising.Donations'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->numeric('amount')
            ->allowEmpty('amount');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('thanks');

        return $validator;
    }
}
