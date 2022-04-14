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

        // добавляем разрешение на создание и редактирование пользователей
        $addUser = $auth->createPermission('addUser');
        $addUser->description = 'Add & config Users';
        $auth->add($addUser);
/*================================================================*/

        

        // добавляем роль "moderator" 
        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);
        //$auth->addChild($moderator, $updatePost);       
        $auth->addChild($moderator, $activePost);

        // добавляем роль "manager" 
        $manager = $auth->createRole('manager');
        $auth->add($manager);
        $auth->addChild($manager, $moderator);
        $auth->addChild($manager, $updatePost);
        $auth->addChild($manager, $createPost);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deletePost);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $activePost);
        //$auth->addChild($admin, $manager);
     

        $mainAdmin = $auth->createRole('mainAdmin');
        $auth->add($mainAdmin);
        $auth->addChild($mainAdmin, $addUser);
        $auth->addChild($mainAdmin, $admin);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($mainAdmin, 1);
        $auth->assign($admin, 2);
        $auth->assign($manager, 3);
        $auth->assign($moderator, 4);
        
        

        //yii migrate --migrationPath=@yii/rbac/migrations
        //yii rbac/init
    }
}