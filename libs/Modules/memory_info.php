<?php

    namespace Modules;

    class memory_info extends \ld\Modules\Module {
        protected $name = 'memory_info';
        protected $raw_output = true;

        public function getData($args=array()) {
			$data = array();
			
			exec(
                "/bin/cat /proc/meminfo",
                $result
            );
			
			foreach ($result as $a) {
				$p = explode(':', $a);
				$data[$p[0]] = $p[1];
            }
			
			return $data;
        }
    }