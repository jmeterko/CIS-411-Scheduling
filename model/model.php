<?php     
    require_once('../security/model.php');

////****************************************************************************************************************************************//
//                                        DATABASE CONNECTION AND SEARCH FUNCTIONS                                                       \\
//****************************************************************************************************************************************//
    function getDBConnection() {
		$dsn = 'mysql:host=localhost;dbname=s_jcmeterko_bookdata';
		$username = 'root';
		$password = '';
                
		try {
			$db = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}
		return $db;
	}
	
	function getAllData() {
		try {
			$db = getDBConnection();
			$query = "select * from s_jcmeterko_bookdata";
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;        
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        function getMaxBookID() {
		try {
			$db = getDBConnection();
			$query = "SELECT MAX(BookID) FROM `s_jcmeterko_bookdata`;";
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;        
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        function getEBooks() {
		try {
			$db = getDBConnection();
			$query = "select * from s_jcmeterko_bookdata where Type = 'eBook'";
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;        
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}

        function getPaperbacks() {
		try {
			$db = getDBConnection();
			$query = "select * from s_jcmeterko_bookdata where Online_Sale = 'N'";
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;        
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        function getFiveStarRatings() {
		try {
			$db = getDBConnection();
			$query = "select * from s_jcmeterko_bookdata where Rating = 5.0";
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;        
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        function getOnlineSales() {
		try {
			$db = getDBConnection();
			$query = "select * from s_jcmeterko_bookdata where Online_Sale = 'Y'";
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;        
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        
	function getCriteria($criteria) {
		try {
			$db = getDBConnection();
			$query = "SELECT *
                            FROM s_jcmeterko_bookdata WHERE 
                            Type LIKE :criteria OR
                            Rating LIKE :criteria OR
                            Date LIKE :criteria OR
                            Online_Sale LIKE :criteria OR
                            Sales LIKE :criteria OR
                            Review LIKE :criteria";
                           
			$statement = $db->prepare($query);
			$statement->bindValue(':criteria', "%$criteria%");
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           // Assoc Array of Rows
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        function getDateRange($fromDate, $toDate) {
                try {
			$db = getDBConnection();
			$query = "SELECT * FROM `s_jcmeterko_bookdata` 
                                 WHERE   Date >= :fromDate AND
                                         Date   <= :toDate";
			$statement = $db->prepare($query);
			$statement->bindValue(':toDate', "%$toDate%", ':fromDate', "%$fromDate");
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           // Assoc Array of Rows
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}
        }
        
	function getBook($bookID) {
		try {
			$db = getDBConnection();
			$query = "select * from s_jcmeterko_bookdata WHERE BookID = $bookID";
			$statement = $db->prepare($query);
                        $statement->bindValue(':bookID', $bookID);//parameterized query to prevent SQL attacks
			$statement->execute();
			$result = $statement->fetch();  
			$statement->closeCursor();
                        $result['ImagePath'] = getImagePath($bookID);
			return $result;			
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}
	}
        
        function insertData($date, $rating, $review, $sales, $type, $online_sale, $tempImageFilePath){
                $db = getDBConnection();
		$query = 'INSERT INTO s_jcmeterko_bookdata (Date, Rating, Review, Sales, Online_Sale, Type)
			VALUES (:Date, :Rating, :Review, :Sales, :Online_Sale, :Type)';
		$statement = $db->prepare($query);
                $statement->bindValue(':Date', toSQLDate($date));
		$statement->bindValue(':Rating', $rating);
		$statement->bindValue(':Review', $review);
		$statement->bindValue(':Sales', $sales);
		$statement->bindValue(':Online_Sale', $online_sale);
		$statement->bindValue(':Type', $type);
		$success = $statement->execute();
		$statement->closeCursor();
		if ($success) {
			saveImageFile($db->lastInsertId(), $tempImageFilePath);
			return $db->lastInsertId(); 
		} else {
			logSQLError($statement->errorInfo()); 
		}		
	}
        
        
        function updateData($bookID, $date, $rating, $review, $sales, $type, $online_sale, $tempImageFilePath, $deleteImage){
                $db = getDBConnection();
		$query = 'UPDATE s_jcmeterko_bookdata SET Date = :Date, 
                                Rating = :Rating, Review = :Review, Sales = :Sales, 
                                Type = :Type, Online_Sale = :Online_Sale
                                WHERE BookID = :BookID';
		$statement = $db->prepare($query);
		$statement->bindValue(':BookID', $bookID);
		$statement->bindValue(':Date', toSQLDate($date));
		$statement->bindValue(':Rating', $rating);
		$statement->bindValue(':Review', $review);
		$statement->bindValue(':Sales', $sales);
                $statement->bindValue(':Type', $type);
		$statement->bindValue(':Online_Sale', $online_sale);
		$success = $statement->execute();
		if ($success) {
			saveImageFile($bookID, $tempImageFilePath);
			if ($deleteImage && $tempImageFilePath == "") {
				deleteImageFile($bookID);
			}
			return $statement->rowCount();         // Number of rows affected
		} else {
			logSQLError($statement->errorInfo());  // Log error to debug
		}	
	}
        
        function deleteEntry($bookID){
		$db = getDBConnection();
		$query = 'DELETE FROM s_jcmeterko_bookdata WHERE BookID = :BookID';
		$statement = $db->prepare($query);
		$statement->bindValue(':BookID', $bookID);
		$success = $statement->execute();
		$statement->closeCursor();
		if ($success) {
                    deleteImageFile($bookID);
			return $statement->rowCount(); 
		} else {
			logSQLError($statement->errorInfo());  
		}		
            }
            
        function deleteImageFile($bookID) {
            $imageFilePath = checkImagePath($bookID);
            if ($imageFilePath != "") {
                    if (unlink($imageFilePath) == false) {
                        $errorMessage = "Unable to delete file at $imageFilePath.";
                        include '../view/errorPage.php';
                    }
                 }
              }
          
        
        function getImagePath($bookID) {
		$ImageDir = "../datafiles/ratings/";
		$FilePath = "$ImageDir/$bookID.jpg";
                return $FilePath;
            }
        
	function checkImagePath($bookID) {
		$FilePath = getImagePath($bookID);
		if (is_file($FilePath)) {
			return $FilePath;
		} else {
			return "";
		}
            }

	function saveImageFile($bookID, $tempImageFilePath) {
		if ($tempImageFilePath != "") {
			$newImagePath = getImagePath($bookID);
			if (move_uploaded_file($tempImageFilePath, $newImagePath) == FALSE) {
				$errorMessage = "Unable to move image file.";
				include '../view/errorPage.php';
                    }
		}
            }
            
////****************************************************************************************************************************************//
//                                        FILE UPLOADS AND PERSISTENCE FUNCTIONS                                                    \\
//****************************************************************************************************************************************//  
        
////****************************************************************************************************************************************//
//                                        PROCESS NEWSLETTER UPLOAD FUNCTION                                                   \\
//****************************************************************************************************************************************//         
        function processNewsletterUpload(){
	$title = "Newsletter File Upload";
	include'../view/headerInclude.php';
        include '../view/sidenavleft.php';

            $newname = "../datafiles/newsletters/newsletter.html";
            $uploadfile = '../datafiles/newsletters/'. $_FILES['userfile']['name'];
            $FileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
           if($FileType == "html") {//if file is .html, then check
            if (file_exists($uploadfile)) {
                        $message = "<p>The file was replaced successfully</p><br>";
                } else {
                        $message = "<p>The file was successfully uploaded</p><br>";
                       }      
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], 
                                        $uploadfile)){
                
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
                rename($uploadfile, $newname);//rename file
                                        }}
                      else {//if there was an upload error:
            if($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE){
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>Please choose a file first, then try again.</p></div>";
            }//if no file was uploaded - show user error message
             else if($FileType != "html") {//if file is not html, then check
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>Please only upload .html files to replace the current newsletter.html.</p></div>";
             } else {
                echo "File Upload Error\n Debugging info:";
                print_r($_FILES);
            }//if there is a different upload error, show user error info
         }
           include '../view/sidenavright.php';
            include '../view/footerInclude.php';
    
      }
////****************************************************************************************************************************************//
//                                        PROCESS LOGO UPLOAD FUNCTION                                                   \\
//****************************************************************************************************************************************// 
      function processLogoUpload(){
        $title = "Logo Upload";
	include'../view/headerInclude.php';
        include '../view/sidenavleft.php';
        $uploadfile = '../datafiles/logos/' . $_FILES['userfile']['name'];
          if (true){
          if (file_exists($uploadfile)) {
                      $message = "<p>The file was replaced successfully</p><br>";
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
              } else {
                      $message = "<p>The file was successfully uploaded</p><br>";
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
              }
          }
              $image_info = getimagesize($_FILES['userfile']['tmp_name']);
              $image_width = $image_info[0];
              $image_height = $image_info[1];
              $image_type = $image_info[2];
              if ($image_type != IMAGETYPE_JPEG && $image_type != 
                      IMAGETYPE_GIF && $image_type != IMAGETYPE_PNG) {
                      echo "Only jpg, gif, and png files are supported. Please upload a supported file type.";
                      print_r($image_info);
                      echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
              } else if ($image_height > 120 OR $image_width > 120) {
                      echo "Logo files must be smaller than 120px by 120px.";
              } else if (move_uploaded_file($_FILES['userfile']['tmp_name'], 
                                                              $uploadfile)) {
             echo "<p>$message.</p>";
              } else if ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE) {
                      echo "<p>Please choose a file first, then try again.</p>";
                      echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
              } else if ($_FILES['userfile']['size'] > 1000000) {
                      echo "<p>Please choose a file smaller than 1MB, then try again.</p>";
                      echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
          } else {
              echo "File Upload Error\n Debugging info:";
              print_r($_FILES);
          }
           include '../view/sidenavright.php';
            include '../view/footerInclude.php';
        }
 ////****************************************************************************************************************************************//
//                                        PROCESS FILE UPLOAD FUNCTION                                                 \\
//****************************************************************************************************************************************//       
        function processFileUpload(){
        $title = "File Upload";
	include'../view/headerInclude.php';
        include '../view/sidenavleft.php';
            $message;
            $newname = "../datafiles/textfiles/quotes.txt";
            $uploadfile = '../datafiles/textfiles/'. $_FILES['userfile']['name'];
            $FileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
                      if($FileType == "txt") {//if file is txt, then check
            if (file_exists($uploadfile)) {
                        $message = "The file was replaced successfully<br>";
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
                } else {
                        $message = "The file was successfully uploaded<br>";
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
                }      

            if (move_uploaded_file($_FILES['userfile']['tmp_name'], 
                                        $uploadfile)){
                echo "<p>$message</p>";
                rename($uploadfile, $newname);//rename file
                                        }  
                      }

                      else {//if there was an upload error:
            if($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE){
                $message = "Please choose a file first, then try again.";
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
            }//if no file was uploaded - show user error message

             else if($FileType != "txt") {//if file is not html, then check
                $message = "Please only upload .txt files to replace the current quotes.txt";
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
            }

            else {
                $message = "File Upload Error\n Debugging info:";
                print_r($_FILES);
                echo "<div class='bodycontent'><br><a href='../controller/controller.php?action=fileManagement' class ='btn btn-default' >File Management</a><p>$message</p></div>";
            }//if there is a different upload error, show user error info
                      }
            include '../view/sidenavright.php';
            include '../view/footerInclude.php';
        }

////****************************************************************************************************************************************//
//                                        STORING MEMBER INFO FUNCTIONS                                                 \\
//****************************************************************************************************************************************//         
	function saveMemberInfo($firstName, $lastName, $age, $email) {
		$file = fopen('../datafiles/textfiles/members.csv', 'ab');
		fputcsv($file, 
			array($firstName, $lastName, $age, $email));
		fclose($file);		
	}

	function getMembers() {
		$file = fopen('../datafiles/textfiles/members.csv', 'rb');
			while (($data = fgetcsv($file)) !== FALSE) {
				$memberArray[] = array($data[0], $data[1], $data[2], $data[3]);
			}
		fclose($file);		
		return $memberArray;
	}
        
       function toDisplayDate($date) {
		if ($phpDate = strtotime($date)) {
			return date('m/d/Y', $phpDate);
		} else {
			return "";
		}
	}
        
        function toSQLDate($date) {
		if ($phpDate = strtotime($date)) {
			return date('Y-m-d', $phpDate);
		} else {
			return "";
		}
	}
        
        function logSQLError($errorInfo) {
		$errorMessage = $errorInfo[2];
		include '../view/errorPage.php';
	}

?>