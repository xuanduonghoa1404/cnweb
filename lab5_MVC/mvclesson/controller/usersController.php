<?php
    require 'model/usersModel.php';
    require 'model/users.php';
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class usersController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =  new usersModel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'add' :                    
					$this->insert();
					break;						
				case 'update':
					$this->update();
					break;				
				case 'delete' :					
					$this -> delete();
					break;								
				default:
                    $this->list();
			}
        }
        public function close_db()
		{
			$this->condb->close();
		}		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($usertb)
        {    $noerror=true;
            // Validate username        
            if(empty($usertb->username)){
                $usertb->username_msg = "Field is empty.";$noerror=false;
            } elseif(!filter_var($usertb->username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Za-z0-9_\.]{6,32}$/")))){
                $usertb->username_msg = "Tài khoản không được chứa dấu cách và phải chứa từ 6 ký tự trở lên";$noerror=false;
            }else{$usertb->username_msg ="";}            
            // Validate password            
            if(empty($usertb->password)){
                $usertb->password_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($usertb->password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/")))){
                $usertb->password_msg = "Mật khẩu phải bao gồm tối thiểu tám ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số";$noerror=false;
            }else{$usertb->password_msg ="";}
            return $noerror;
        }
        // add new record
		public function insert()
		{
            try{
                $usertb=new users();
                if (isset($_POST['addbtn'])) 
                {   
                    // read form value
                    $usertb->username = trim($_POST['username']);
                    $usertb->password = trim($_POST['password']);
                    $check = $this->checkValidation($usertb);
                    if(!$check) {
                        $_SESSION['usertbl0']=serialize($usertb);      
                        $this->pageRedirect("view/insert.php");
                    }
                    $usertb->id = mt_rand(1,10000);
                    //call validation
                    $mysqli = new mysqli("localhost", "root", "", "db");
                    $query = $mysqli->query("SELECT * FROM users WHERE username = '$usertb->username'");    
                    if($query->num_rows != 0) {
                        echo "username exists!, please try again";      
                    }
                    if($query->num_rows == 0 && $check)
                    {   
                        //call insert record            
                        $pid = $this -> objsm ->insertRecord($usertb);
                        if($pid>0){			
                            $this->list();
                        }else{
                            $this->pageRedirect("index.php"); 
                        }
                    // }else
                    // {   
                    //     $_SESSION['usertbl0']=serialize($usertb);//add session obj           
                    //     $this->pageRedirect("view/insert.php");                
                    // }
                }
            }
            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }
    
        // update record
        public function update()
		{
            try
            {
                
                if (isset($_POST['updatebtn'])) 
                {
                    $usertb=unserialize($_SESSION['usertbl0']);
                    $usertb->id = trim($_POST['id']);
                    $usertb->username = trim($_POST['username']);
                    $usertb->password = trim($_POST['password']);                    
                    // check validation  
                    $mysqli = new mysqli("localhost", "root", "", "db");
                    $query = $mysqli->query("SELECT * FROM users WHERE username = '$usertb->username'");  
                    $check = $this->checkValidation($usertb);
                    if(!$check) {
                        $_SESSION['usertbl0']=serialize($usertb);      
                        $this->pageRedirect("view/update.php");
                    }
                    if($query->num_rows == 2){
                        echo "username exists!, please try again";  
                        echo $query->num_rows;
                    }
                    elseif($query->num_rows !=2 && $check)
                    {
                        $res = $this -> objsm ->updateRecord($usertb);	                        
                        if($res){			
                            $this->list();                           
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }
                }elseif(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                    $id=$_GET['id'];
                    $result=$this->objsm->selectRecord($id);
                    $row=mysqli_fetch_array($result);  
                    $usertb=new users();                  
                    $usertb->id=$row["id"];
                    $usertb->password=$row["password"];
                    $usertb->username=$row["username"];
                    $_SESSION['usertbl0']=serialize($usertb);
                    $this->pageRedirect('view/update.php');
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        // delete record
        public function delete()
		{
            try
            {
                if (isset($_GET['id'])) 
                {
                    $id=$_GET['id'];
                    $res=$this->objsm->deleteRecord($id);                
                    if($res){
                        $this->pageRedirect('index.php');
                    }else{
                        echo "Somthing is wrong..., try again.";
                    }
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        public function list(){
            $result=$this->objsm->selectRecord(0);
            include "view/list.php";                                        
        }
    }
?>