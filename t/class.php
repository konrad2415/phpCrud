<?php
      class Customers
      {
          private $srv;
          private $usr;
          private $pss;
          private $db;
          private $con;
          private $qry;
          

          public function __construct($s='localhost',$u='konrad',$p='Hall0w33nday',$d='blog')
          {
              $this->srv = $s;
              $this->usr = $u;
              $this->pss = $p; 
              $this->db  = $d;
             
              $this->con = new mysqli($this->srv,$this->usr,$this->pss,$this->db); // host user pass db
              
               if(!mysqli_connect_error())return $this->con;
                 else trigger_error("Failed to connect to mysql:".mysqli_connect_error());
          }
          
          public function setData($info='')
          {

            $name = (isset($_REQUEST['n'])) ? $_REQUEST['n'] :'';
            echo $name;
            $mail = isset($_REQUEST['m']) ? $_REQUEST['n'] :'';
            $user = isset($_REQUEST['u']) ? $_REQUEST['n'] :'';
            $pass = isset($_REQUEST['k']) ? $_REQUEST['n'] :'';
            $qry = "INSERT INTO customers(name,email,username,password) VALUES('$name','$mail','$user','$pass')";
            
            $sql = $this->con->query($qry); // Its a boolean and return True in case of error returns False
            if($sql==true){
               echo "Data inserted ok!";
            }else{
              echo "Error ocurred";
            }
            
            
         
          }




          public function insertData($post)
          {
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $username = $this->con->real_escape_string($_POST['username']);
            $password = $this->con->real_escape_string(md5($_POST['password']));
            $query="INSERT INTO customers(name,email,username,password) VALUES('$name','$email','$username','$password')";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php?msg1=insert");
            }else{
                echo "Registration failed try again!";
            }

          }



      }

     
      
     // $name = isset($_REQUEST['n'])) ? $_REQUEST['n'] :'';
     // echo $name.'Done';
      $m = new Customers();
     // $m->insertData();

      
      

?>