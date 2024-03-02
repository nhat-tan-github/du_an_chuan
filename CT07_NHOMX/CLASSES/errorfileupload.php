<?
    class Errorfileupload {
        public static function error($code){
            switch ($code) {
                case UPLOAD_ERR_OK:
                    $msg = 'OK';
                    break;

                case UPLOAD_ERR_INI_SIZE:
                    $msg = '...';
                    break;

                case UPLOAD_ERR_FORM_SIZE:
                    $msg = '...';
                    break;

                case UPLOAD_ERR_PARTIAL:
                    $msg = '';
                    break;

                case UPLOAD_ERR_NO_FILE:
                    $msg = '';
                    break;

                case UPLOAD_ERR_NO_TMP_DIR:
                    $msg = '';
                    break;
                
                case UPLOAD_ERR_CANT_WRITE:
                    $msg = '';
                    break;
                
                case UPLOAD_ERR_EXTENSION:
                    $msg = '...';
                    break;

                default:
                    $smg = 'Unknow error!';
                    break;
            }
            return $smg;
        }
    }
?>