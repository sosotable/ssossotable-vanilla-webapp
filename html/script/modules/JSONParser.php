<?php
    class JSONParser {
        private static $JSONparser=null;

        public function parse($path) {
            $arr = json_decode(file_get_contents($path), true);
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }

        public static function factory()
        {
            if (self::$JSONparser == null) {
                self::$JSONparser = new JSONParser();
            }

            return self::$JSONparser;
        }
    }

?>