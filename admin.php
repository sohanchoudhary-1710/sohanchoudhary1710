<?php 
print_r($_POST);
$uploadDir = 'uploads/'; 
// $response = array( 
//     'status' => 0, 
//     'message' => 'Form submission failed, please try again.' 
// ); 
 
// If form is submitted 
$data = "";

if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['file'])){ 
    // Get the submitted form data 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $username=$_POST['username'];
    $password=$_POST['password']; 
     
    // Check whether submitted data is not empty 
       
                  // Allow certain file formats 
                  $uploadStatus = 1; 
                  $fileName = basename($_FILES["file"]["name"]); 
                  $targetFilePath = $uploadDir . $fileName; 
                  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                        $response['message'] = 'Image uploaded succesfully!';
                    }else{ 
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                    $meassage = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                } 
             
            if($uploadStatus == 1){ 
                // Include the database config file 
                include_once 'conn.php'; 
                 
                // Insert form data in the database 
                

                    $insert ="INSERT INTO `admin` (name,email,username,password,file) VALUES ('".$name."','".$email."','".$username."','".$password."','".$uploadedFile."')"; 
                    $res=mysqli_query($conn,$insert) or  die(mysqli_error($conn));  
                    
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
            //     if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
            //         $uploadedFile = $fileName; 
            //         $response['message'] = 'Image uploaded succesfully!';
            //     } 
            // }        
}

 ?>