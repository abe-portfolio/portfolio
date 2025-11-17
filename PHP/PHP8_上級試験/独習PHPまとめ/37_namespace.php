<?php
// namespace：名前空間：名前の衝突を防ぐための仕組み

// Model/User.php
/*
namespace App\Model;

class User {
    public function hello() {
        return "Hello from App\\Model\\User";
    }
}
*/

// Auth/User.php
/*
namespace App\Auth;

class User {
    public function hello() {
        return "Hello from App\\Auth\\User";
    }
}
*/

require_once 'Model/User.php';
require_once 'Auth/User.php';

use App\Model\User as ModelUser;
use App\Auth\User as AuthUser;

// 実際のファイルがないためエラーが発生するため、コメントにしておく
// $modelUser = new ModelUser();
// $authUser = new AuthUser();

echo $modelUser->hello(); // Hello from App\Model\User
echo "\n";
echo $authUser->hello();  // Hello from App\Auth\User




?>