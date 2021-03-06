<?php

use yii\db\Migration;

/**
 * Class m220717_122123_init_rbac
 */
class m220717_122123_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createPost = $auth->createPermission('super_admin');
        $createPost->description = 'The owner of the startup';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('playstation_admin');
        $updatePost->description = 'Can control playstation';
        $auth->add($updatePost);


        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('super_admin');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('playstation_admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220717_122123_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
