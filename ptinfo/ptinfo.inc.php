<div id="ptRecordHolder">
	<span class="pageTitle">Patient Information</span>
    <div id="infoHolder">
    	<table class="infoTable">
        	<tr>
            	<td width="20%" align="right"><label for="patientname">Patient Name:</label></td>
                <td><span class="info"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></span></td>
                <td width="15%" align="right"><label for="sex">Sex</label></td>
                <td width="18%"><?php echo $sex;?></td>
            </tr>
            <tr>
                <td align="right"><label for="dateofbirth">Date of Birth:</label></td>
                <td><?php echo $dateofbirth;?></td>
                <td align="right"><label for="cs">Civil Status</label></td>
                <td><?php echo $cs;?></td>
            </tr>
            <tr>
                <td><label for="address">Address</label></td>
                <td colspan="3"><?php echo $address;?></td>
            </tr>
            <tr>
                <td><label for="placeofbirth">Place of Birth:</label></td>
                <td colspan="3"><?php echo $placeofbirth;?></td>
            </tr>  
            <tr>
                <td><label for="occupation">Occupation:</label></td>
                <td><?php echo $occupation;?></td>
                <td><label for="contactno">Contact #:</label></td>
                <td><?php echo $contactno;?></td>
            </tr>
            <tr>
                <td><label for="religion">Religion:</label></td>
                <td><?php echo $religion;?></td>
                <td><label for="nationality">Nationality:</label></td>
                <td><?php echo $nationality;?></td>
            </tr>
            <tr>
            	<td><label for="lastvisit">Last Visit:</label></td>
                <td colspan="3">
			<?php
				$last = lastVisit($pid);
				if(empty($last)){
			?>
					<span class="info">No Records Found.</span>
			<?php
				}else{
					foreach ($last as $lst){	
			?>
            		<span class="info"><?php echo date('F d, Y', strtotime($lst["dateofvisit"]));?></span>
            <?php
					}
				}
			?>
                
                </td>
            </tr>
            <tr>
            	<td colspan=4>
                	<center>
		                <input type="button" name="view" class="greenbutton" value="View Patient's Records" onClick="window.location.href='?ref=ptrecords&pid=<?php echo $pid;?>'" title="View Patient Records"/>
						<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
    	        		<input type="button" name="edit" class="bluebutton" value="Edit Patient's Info" onClick="window.location.href='validate.php?loc=pt&type=edit&pid=<?php echo $pid;?>'" title="Edit Patient's Information"/>
        	            <input type="button" name="delete" class="redbutton" value="Delete Patient's Info" title="Delete Patient's Information" onClick="window.location.href='validate.php?loc=pt&type=delete&pid=<?php echo $pid;?>'"/>
						<?php } ?>
					</center>
                </td>
            </tr>
    </table>
    </div>  
</div>