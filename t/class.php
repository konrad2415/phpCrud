<?php
      // ------- Store MySQL server global configuration --------------------------- 
      $conf=[
              'serv' => 'localhost',
              'user' => 'konrad',
              'pass' => 'Hall0w33nday',
              'dbnm' => 'blog'
            ];
      // ----------------------------------------------------------------------------

      class DBwrapper
      {
        private $srv; // serverhost
        private $usr; // dbUser
        private $key; // dbPass
        private $db;  // dbName
        private $con; // dbConnection
        

        // Constructor Initialice the Object instanceof
              public function __construct($config)
              {
                $this->srv  = $config['serv'];
                $this->usr  = $config['user'];
                $this->key  = $config['pass'];
                $this->db   = $config['dbnm'];
              
                  $this->con = new mysqli($this->srv,$this->usr,$this->key,$this->db); // host user pass dbName
                  if(mysqli_connect_error())
                  {
                    trigger_error("Error connecting to database:".mysqli_connect_error());
                  }else
                       {
                        return $this->con; 
                       }
              }

        // Fetch Database information method
              public function getData()
              {
                // MySQL Query string
                // the database fields are id	name	email	username	password
                    $sql = "SELECT * FROM `blog`.`customers`"; 
                                               // New Empty array to store results of the qry
                    
                    $result=$this->con->query($sql);
                    
                      if($result->num_rows)
                      {
                        $data = array();
                          while(($row=$result->fetch_assoc()))
                          {   
                            $data[]=$row;
                          }
                        return $data;  
                      }else
                           {
                              return NULL;
                           }
                  
              }

      }  
     

      $myObj = new DBwrapper($conf);
      $infoArray = $myObj->getData();
      if(!isset($infoArray))echo "Nothing to be shown!";
        else 
             {
               // The array has a content 
               foreach($infoArray as $customer)
               {
                  echo $customer['id']." ".$customer['name']." ".$customer['email']."<br/>";
               }
             }

?>