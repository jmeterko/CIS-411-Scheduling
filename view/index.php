<?php
    $title = "Testing";
    include '../view/headerInclude.php';
    ?>
<div class="col-sm-12 text-center center-block center-text"> 
      <p>	 
		  <?php
		  
			//$s = file_get_contents('store');
			//$a = unserialize($s);
  
				 echo $stdq->cat0; 
				 echo $stdq->cat1; 
				 echo $stdq->cat2; 
				 echo $stdq->cat3; 
				 echo $stdq->cat4; 
				 echo $stdq->cat5; 
				 echo $stdq->cat6; 
				 echo $stdq->cat7; 
				 echo $stdq->rankFR; 
				 echo $stdq->rankSO; 
				 echo $stdq->rankJR; 
				 echo $stdq->rankSR; 
				 
				 echo $stdq->or0;
				 echo $stdq->or1;
				 echo $stdq->or2;
				 echo $stdq->or3;
				 echo $stdq->or4;
				 echo $stdq->or5;
				 echo $stdq->or6;
				 echo $stdq->or7;
				 
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
                                    <td class="pad-right"><?php echo htmlspecialchars($row['username']) ?></td><br>
                                    <td class="pad-right"><?php echo htmlspecialchars($row['serial']) ?></td><br>
									<br><br><hr>
                  
                            </tr>
		
				
					 <?php }} ?>
				
           

				 
      </p>										
    </div>

    </body>
</html>

