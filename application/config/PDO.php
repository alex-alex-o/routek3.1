<?php
	
	

	class PDO_routes {
		
		public $state = true;
		private $db;
		private $conf_url = 'database.php';
				
		
		public function __construct(){
			
			
			require $this->conf_url;
			
			
						try {
			    $this->db = new PDO('mysql:host='.$db[$active_group]['hostname'].';dbname='.$db[$active_group]['database'].';charset=utf8'
			                         , $db[$active_group]['username']
			                         , $db[$active_group]['password']
			                        );
			} catch (PDOException $e) {
			    echo 'Подключение не удалось: ' . $e->getMessage();
			    $this->state = false;
		
			}
			//return $this->state;

		}
		
		public function get_routens(){
			
		
			$sql = 'select * from ci_seo_urls where active = "Y";';
			
			
			$q = $this->db->prepare($sql);		
			$q -> execute();
			
			return $q->fetchAll(PDO::FETCH_OBJ);
			
			
			
		}
		
	}