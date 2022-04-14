<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // добавляем разрешение "deletePost"
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete post';
        $auth->add($deletePost);

        // добавляем разрешение на вкл. выкл "active"
        $activePost = $auth->createPermission('activePost');
        $activePost->description = 'Active post';
        $auth->add($activePost);
/*================================================================*/

        // добавляем роль "manager" 
        $manager = $auth->createRole('manager');
        $auth->add($manager);
        $auth->addChild($manager, $updatePost);
        $auth->addChild($manager, $createPost);

        // добавляем роль "moderator" 
        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);
        $auth->addChild($moderator, $updatePost);       
        $auth->addChild($moderator, $activePost);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deletePost);
        $auth->addChild($admin, $manager);
        $auth->addChild($admin, $moderator);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($manager, 3);
        $auth->assign($moderator, 2);
        $auth->assign($admin, 1);
    }
}