<?php 
$uploadDir = 'uploads/'; 
// $response = array( 
//     'status' => 0, 
//     'message' => 'Form submission failed, please try again.' 
// ); 
 
// If form is submitted 
$data = "";
print_r($_POST);

//if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['file_u'])){ 
    // Get the submitted form data 
    $id=$_POST['id'];
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $username=$_POST['username'];
    $password=$_POST['password']; 
     
    // Check whether submitted data is not empty 
       
                  // Allow certain file formats 
                  $uploadStatus = 1; 
                  $fileName = basename($_FILES["file_u"]["name"]); 
                  $targetFilePath = $uploadDir . $fileName; 
                  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["file_u"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                    }else{ 
                        $uploadStatus = 0; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                } 
             
            if($uploadStatus == 1){ 
                // Include the database config file 
                include_once 'conn.php'; 
                 
                // Insert form data in the database 
                

                    $update='update `admin` set name="'.$name.'",email="'.$email.'",file="'. $uploadedFile.'" ,username="'.$username.'",password="'.$password.'"  where id="'.$id.'"';
                    $res=mysqli_query($conn,$update) or  die(mysqli_error($conn));  
                    
                   if($res)
                   {
                    $data= 'success';
                    echo $data;
                    
                   }else{
                    $data='unsuccess';
                    echo $data;
                   }
        
            } 
            // if(in_array($fileType, $allowTypes)){ 
            //     // Upload file to the server 
            //     if(move_uploaded_file($_FILES["file_u"]["tmp_name"], $targetFilePath)){ 
            //         $uploadedFile = $fileName; 
            //     }else{ 
            //         $uploadStatus = 0; 
            //     } 
            // }else{ 
            //     $uploadStatus = 0; 
            // } 


 ?>