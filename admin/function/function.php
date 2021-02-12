<?

    /**
     * @name : uuid
     * @desc : 고유 키값 발급
     * @return sprintf
     */
    function uuid() {
        return sprintf('%08x-%04x-%04x-%04x-%04x%08x',
        mt_rand(0, 0xffffffff),
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff), mt_rand(0, 0xffffffff)
        );
    }
  
?>