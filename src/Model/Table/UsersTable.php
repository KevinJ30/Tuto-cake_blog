<?php

namespace App\Model\Table;

use App\Auth\LegacyPasswordHasher;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

    public function initialize(Array $config){
        parent::initialize($config);

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator){
        // Régle Générique
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence(['username', 'password', 'email'], 'create');
        $validator->notEmpty(['username', 'password', 'password-confirm', 'email', 'token'], 'Vous devez renseigner ces champs');

        // Régle spécifique
        $validator->add('username', [
            'minLength' => [
                'rule' => ['minLength', 4],
                'message' => 'Votre identifiant doit contenir au minimum 4 caractères.'
            ],
            'maxLength' => [
                'rule' => ['maxLength', 10],
                'message' => 'Votre identifiant doit contenir au maximum 10 caractères.'
            ],
            'alphaNumeric' => [
                'rule' => 'alphaNumeric',
                'message' => 'Votre identifiant doit êtres au format alphanumérique.'
            ]
        ]);

        $validator->add('password', [
            'minLength' => [
                'rule' => ['minLength', 8],
                'message' => 'Votre mot de passe doit contenir au minimum 8 caractères.'
            ]
        ]);

        $validator->add('password', [
            'minLength' => [
                'rule' => ['minLength', 8],
                'message' => 'Votre identifiant doit contenir au minimum 4 caractères.'
            ]
        ]);

        $validator->add('confirm-password', [
            'confirmPassword' => [
                'rule' => [$this, 'confirmPassword'],
                'message' => 'Votre mot de passe est différent du mot de passe de confirmation.'
            ]
        ]);

        $validator->add('email', [
            'email' => [
                'rule' => 'email',
                'message' => 'Votre adresse e-mail n\'est pas valide.'
            ]
        ]);

        return $validator;
    }

    public function confirmPassword($field, $check){
        return $check['data']['password'] == $field;
    }

    public function buildRules(RulesChecker $rules){
        $rules->add($rules->isUnique(['username'], 'Votre identifiant existe déjà.'));
        $rules->add($rules->isUnique(['email'], 'Votre identifiant existe déjà.'));
        return $rules;
    }
}