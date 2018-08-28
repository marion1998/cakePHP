<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Film Model
 *
 * @method \App\Model\Entity\Film get($primaryKey, $options = [])
 * @method \App\Model\Entity\Film newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Film[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Film|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Film[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Film findOrCreate($search, callable $callback = null, $options = [])
 */
class FilmTable extends Table
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

        $this->setTable('film');
        $this->setDisplayField('idFilm');
        $this->setPrimaryKey('idFilm');
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
            ->integer('idFilm')
            ->allowEmpty('idFilm', 'create');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 45)
            ->requirePresence('titre', 'create')
            ->notEmpty('titre');

        $validator
            ->dateTime('dateSortie')
            ->allowEmpty('dateSortie');

        $validator
            ->time('duree')
            ->allowEmpty('duree');

        $validator
            ->scalar('synopsis')
            ->allowEmpty('synopsis');

        $validator
            ->scalar('DISPO')
            ->allowEmpty('DISPO');

        return $validator;
    }
}
