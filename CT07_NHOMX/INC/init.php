<?
    // Khoi tao session
    if(session_id() === '') session_start();

    // phương thúc tự động load các class tương ứng
    spl_autoload_register(
        function($className){
            $fileName = strtolower($className) . ".php";
            $dirRoot = dirname(__DIR__);
            require $dirRoot . "/CLASSES/{$fileName}";
        }
    );
    //  goi tap tin config.php
    require dirname(__DIR__) . "/config.php";
    
    // Quan ly loi va Exception

    //ham quan ly loi
    function errorHandler($level, $message, $file, $line){
        throw new ErrorException($message, 0, $level, $file, $line);
    }

    //Ham quan ly Exception
    function exceptionHandler($ex){
        if(DEBUG){
            echo "<h2> ERROR </h2>";
            echo "<p> Exception " . get_class($ex) . "</p>";
            echo "<p> Noi dung " . $ex->getMessage() . "</p>";
            echo "<p> Tap tin " . $ex->getFile(). "Dong thu : " . $ex->getLine() . "</p>";
        }else{
            echo "<h2> Loi. Vui long thu lai!! </h2>";
            // sau nay goi trang 404
        }
        exit();
    }

    // Dang ky voi PHP
    set_error_handler('errorHandler');
    set_exception_handler('exceptionHandler');

?>