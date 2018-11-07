<?php
    $title = "Testing";
    include '../view/headerInclude.php';
    ?>
<div class="col-sm-12 text-center center-block center-text"> 
      <p>	 
		  <?php
		  
			//$s = file_get_contents('store');
			//$a = unserialize($s);
  
				 /*echo "Category 1: " . $stdq->cat0 . "<br>"; 
				 echo "Category 2: " . $stdq->cat1 . "<br>"; 
				 echo "Category 3: " . $stdq->cat2 . "<br>"; 
				 echo "Category 4: " . $stdq->cat3 . "<br>"; 
				 echo "Category 5: " . $stdq->cat4 . "<br>"; 
				 echo "Category 6: " . $stdq->cat5 . "<br>"; 
				 echo "Category 7: " . $stdq->cat6 . "<br>"; 
				 echo "Category 8: " . $stdq->cat7 . "<br>"; 
				 
				 echo "<br><br>";

				 echo $stdq->rankFR; 
				 echo $stdq->rankSO; 
				 echo $stdq->rankJR; 
				 echo $stdq->rankSR; 
				 
				 echo "<br><br>";
				 
				 echo $stdq->or0;
				 echo $stdq->or1;
				 echo $stdq->or2;
				 echo $stdq->or3;
				 echo $stdq->or4;
				 echo $stdq->or5;
				 echo $stdq->or6;
				 echo $stdq->or7;
				 
				 echo "<br><br>";

				  $orDropdownValue = $stdq->data;
				  foreach ($orDropdownValue as $item => $value) {
					  echo $item . ": " . $value  . "\n";
				  }//echo $item to see key/value pair

				 */
				/*   
				 echo $u->cat1; 
				 echo $u->cat2; 
				 echo $u->cat3; 
				 echo $u->cat4; 
				 echo $u->cat5; 
				 echo $u->cat6; 
				 echo $u->cat7; 
				 echo $u->cat8; 
				 echo $u->rankFR; 
				 echo $u->rankSO; 
				 echo $u->rankJR; 
				 echo $u->rankSR; 
				 echo $saveQuestion;*/
				 
					 if(!empty($results)){
					             $i = 0;
            foreach ($results as $row) { $i++; ?>

                <tr class="<?php echo ($i % 2 == 0)?"evenRow":"oddRow" ?>" >
									<td class="pad-right"><a href="../controller/controller.php?action=RebuildQuestion&SerialID=<?php echo $row['id'] ?>"><?php echo htmlspecialchars($row['name']) ?></a></td><br>
									<br><br><hr>
                  
                            </tr>
		
				
					 <?php }} ?>
				
           

				 
      </p>										
    </div>

    </body>
</html>

