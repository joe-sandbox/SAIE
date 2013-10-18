<?php
    header('Content-Type: text/html; charset=utf8');
    define("LOCAL_HOST", "localhost/SAIE");
    define("WEB_HOST", "");
    $DIRECTION_HOST = (true)? LOCAL_HOST : WEB_HOST;
    if(true){
        chdir("..");
        $DIRECTION_HOST = getcwd();
    }else{
        $DIRECTION_HOST = WEB_HOST;
    }
    /**
     * Include services package
     */
    include_once $DIRECTION_HOST.'/Services/DomainEnumeration.php';
    include_once $DIRECTION_HOST.'/Services/ProcessEnum.php';
    include_once $DIRECTION_HOST.'/Services/ProjectFilter.php';
    include_once $DIRECTION_HOST.'/Services/FilterEnum.php';
    /**
     * Public Interfaces
     */
    include_once $DIRECTION_HOST.'/Controller/I_UserController.php';
    include_once $DIRECTION_HOST.'/Controller/I_ProjectController.php';
    include_once $DIRECTION_HOST.'/Controller/I_CategoriesController.php';
    /**
     * Include Model Package
     */
    include_once $DIRECTION_HOST.'/Model/I_DataBase.php';
    include_once $DIRECTION_HOST.'/Model/MySqlDB.php';
    include_once $DIRECTION_HOST.'/Model/FactoryDB.php';
    include_once $DIRECTION_HOST.'/Model/FactoryDao.php';
    include_once $DIRECTION_HOST.'/Model/A_Dao.php';
    include_once $DIRECTION_HOST.'/Model/UserDao.php';
    include_once $DIRECTION_HOST.'/Model/ProjectDao.php';
    include_once $DIRECTION_HOST.'/Model/CategoryDao.php';
    /**
     * Include Controller package
     */
    include_once $DIRECTION_HOST.'/Controller/I_UserController.php';
    include_once $DIRECTION_HOST.'/Controller/I_ProjectController.php';
    include_once $DIRECTION_HOST.'/Controller/I_CategoriesController.php';
    include_once $DIRECTION_HOST.'/Controller/I_DomainObject.php';
    include_once $DIRECTION_HOST.'/Controller/DomainFactory.php';
    include_once $DIRECTION_HOST.'/Controller/Controller.php';
    include_once $DIRECTION_HOST.'/Controller/User.php';
    include_once $DIRECTION_HOST.'/Controller/Project.php';
    include_once $DIRECTION_HOST.'/Controller/Category.php';
    /**
     * Include Translators package
     */
    include_once $DIRECTION_HOST.'/Translators/TranslatorBuilder.php';
    include_once $DIRECTION_HOST.'/Translators/DataReceiver.php';
    include_once $DIRECTION_HOST.'/Translators/UserTranslator.php';
    include_once $DIRECTION_HOST.'/Translators/ProjectTranslator.php';
    include_once $DIRECTION_HOST.'/Translators/CategoriesTranslator.php';


?>
