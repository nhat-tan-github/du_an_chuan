<?
    $db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    return $db->getConn();


    // // Sua code
    // function getDbConnection()
    // {
    //     require_once 'database.php';
    //     $conn = Database::getConn();
    //     $conn->exec("dp_ct07");
    //     return $conn;
    // }
    // //


?>