<?php

namespace app\commands;

use yii\console\Controller;
use app\models\UsersData;
use \Yii;
use app\rbac\ProfileRule;

class UserController extends Controller
{
    public function actionLoadUsers()
    {

        UsersData::deleteAll();

        $userData = [
            [
                'first_name' => 'Melissa',
                'last_name' => 'Rose',
                'email' => 'mrose6@geocities.com',
                'gender' => 'Female',
                'username' => 'melissa28',
                'password' => 'summer2016'
            ],
            [
                'first_name' => 'Roy',
                'last_name' => 'Lawrence',
                'email' => 'rlawrencej@dell.com',
                'gender' => 'Male',
                'username' => 'royboy',
                'password' => 'fightclub'
            ],
            [
                'first_name' => 'Nicole',
                'last_name' => 'Wallace',
                'email' => 'nwallacen@trellian.com',
                'gender' => 'Female',
                'username' => 'nikki',
                'password' => 'dontlooknow',
            ],
            [
                'first_name' => 'Phillip',
                'last_name' => 'Coleman',
                'email' => 'pcoleman1c@google.de',
                'gender' => 'Male',
                'username' => 'philly',
                'password' => 'phillysteak'
            ],


        ];

        foreach ($userData as $data) {
            $user = new UsersData($data);
            $user->hashPassword = true;
            $user->save();
        }
    }

    // public function actionPermissions()
    // {
    //     $auth = Yii::$app->authManager;

    //     $updateUser = $auth->createPermission('updateUser');
    //     $updateUser->description = 'Update a user';
    //     $auth->add($updateUser);

    //     $deleteUser = $auth->createPermission('deleteUser');
    //     $deleteUser->description = 'Delete a user';
    //     $auth->add($deleteUser);
    // }

    // public function actionRoles()
    // {
    //     $auth = Yii::$app->authManager;

    //     $updateUser = $auth->getPermission('updateUser');
    //     $deleteUser = $auth->getPermission(('deleteUser'));

    //     $member = $auth->createRole('member');
    //     $auth->add($member);
    //     $auth->addChild($member, $updateUser);

    //     $admin = $auth->createRole('admin');
    //     $auth->add($admin);
    //     $auth->addChild($admin, $deleteUser);
    //     $auth->addChild($admin, $member);

    // }

    // public function actionRules()
    // {
    //     $auth = Yii::$app->authManager;

    //     $rule = new ProfileRule();
    //     $auth->add($rule);

    //     $updateUser = $auth->getPermission('updateUser');
    //     $updateUser->ruleName = $rule->name;
    //     $auth->update('updateUser', $updateUser);
    // }
}
