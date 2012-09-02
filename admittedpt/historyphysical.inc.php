<div class="admittedHolder">
	<span class="pageTitle">History and Physical Examination</span>
	<div id="hxHolder">
		<?php 
		if (checkExistingHxPt($pid, $rid, $aid) === false){
		?>
		<!-- Form for Adding or Updating Patient's History and Physical Examination -->
		<div id="hxFormHolder">
			<form id="pthxForm">
				<div id="hxInfoWrapper">
					<div class="hxHolder">
						<div class="hxRow">
							<div class="titleCell hx-title" style="border-top: 1px solid #ccc;">Name:</div>
							<div class="contentCell hx-cont-name" style="border-top: 1px solid #ccc;"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
							<div class="titleCell hx-title" style="border-top: 1px solid #ccc;">Age:</div>
							<div class="contentCell hx-cont-age" style="border-top: 1px solid #ccc;"><?php echo $age;?></div>
							<div class="titleCell hx-title" style="border-top: 1px solid #ccc;">Civil Status:</div>
							<div class="contentCell hx-cont-last" style="border-top: 1px solid #ccc;"><?php echo $cs;?></div>
						</div>
						<div class="hxRow">
							<div class="titleCell hx-title">Ward:</div>
							<div class="contentCell"><?php echo $service;?></div>
							<div class="titleCell hx-title">Bed No.:</div>
							<div class="contentCell hx-cont-bn"><?php echo $bednum;?></div>
							<div class="titleCell hx-title">Hospital No.:</div>
							<div class="contentCell hx-cont-last">#<?php echo $opdnum;?></div>
						</div>
					</div>
				</div>
		
				<div id="hxRecWrapper">
					<div class="hxHolder">
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec" style="border-top:1px solid #ccc;">1. Chief Complaint</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="complaint" id="complaint" class="txtField"><?php echo nl2br($complaint);?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">2. Present Illness</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="presentill" id="presentill" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">3. Past Illness (History)</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec">
								<div id="col1">
									<input type="checkbox" id="measles" name="measles" value="Measles" class="chckField"/>Measles<br/>
									<input type="checkbox" id="tb" name="tb" value="TB" class="chckField"/>TB<br/>
									<input type="checkbox" id="malaria" name="malaria" value="Malaria" class="chckField"/>Malaria<br/>
									<input type="checkbox" id="arthritis" name="arthritis" value="Arthritis" class="chckField"/>Arthritis<br/>
									<input type="checkbox" id="syphillis" name="syphillis" value="Syphillis" class="chckField"/>Syphillis<br/>
									<input type="checkbox" id="drugs" name="drugs" value="Drugs" class="chckField"/>Drugs<br/>
								</div>
								<div id="col2">
									<input type="checkbox" id="mumps" name="mumps" value="Mumps" class="chckField"/>Mumps<br/>
									<input type="checkbox" id="asthma" name="asthma" value="Asthma" class="chckField"/>Asthma<br/>
									<input type="checkbox" id="rheumatic" name="rheumatic" value="Rheumatic Fever" class="chckField"/>Rheumatic Fever<br/>
									<input type="checkbox" id="typhoid" name="typhoid" value="Typhoid Fever" class="chckField"/>Typhoid Fever<br/>
									<input type="checkbox" id="diarrhea" name="diarrhea" value="Diarrhea" class="chckField"/>Diarrhea<br/>
									<input type="checkbox" id="alcoholism" name="alcoholism" value="Alcholism" class="chckField"/>Alcoholism<br/>
								</div>
								<div id="col3">
									<input type="checkbox" id="mental" name="mental" value="Mental Illness" class="chckField"/>Mental Illness<br/>
									<input type="checkbox" id="diabetes" name="diabetes" value="Diabetes" class="chckField"/>Diabetes<br/>
									<input type="checkbox" id="cancer" name="cancer" value="Cancer" class="chckField"/>Cancer<br/>
									<input type="checkbox" id="hypertension" name="hypertension" value="Hypertension" class="chckField"/>Hypertension<br/>
									<input type="checkbox" id="blooddys" name="blooddys" value="Blood Dys" class="chckField"/>Blood Dys<br/>
									<input type="checkbox" id="allergies" name="allergies" value="Allergies" class="chckField"/>Allergies<br/>
								</div>
								<input type="checkbox" id="othcheck" class="chckField" style="margin-left: 10px;" class="textField"/>Others: <input type="text" name="others" id="others" class="textField" disabled="disabled"/><br/>
								<input type="checkbox" id="prevcheck" class="chckField" style="margin-left: 10px;"/>Previous Operation: <input type="text" name="prevop" id="prevop" class="textField" disabled="disabled"/><br/>
								<input type="checkbox" id="childcheck" class="chckField" style="margin-left: 10px;"/>Children How Many: <input type="text" name="children" id="children" class="textField" disabled="disabled"/>
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">4. Family History</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec">
								<div id="fcol1">
									<input type="checkbox" class="chckField" id="fcancer" name="fcancer" value="Cancer"/>Cancer<br/>
									<input type="checkbox" class="chckField" id="ftb" name="ftb" value="TB"/>TB<br/>
									<input type="checkbox" class="chckField" id="fhypertension" name="fhypertension" value="Hypertenstion"/>Hypertension<br/>
									<input type="checkbox" class="chckField" id="fmental" name="fmental" value="Mental Illness"/>Mental Illness<br/>
									<input type="checkbox" class="chckField" id="fblooddys" name="fblooddys" value="Blood Dyscrasia"/>Blood Dyscrasia<br/>
								</div>
								<div id="fcol2">
									<input type="checkbox" class="chckField" id="heartdisease" name="heartdisease" value="Heart Disease"/>Heart Disease<br/>
									<input type="checkbox" class="chckField" id="fdiabetes" name="fdiabetes" value="Diabetes"/>Diabetes<br/>
									<input type="checkbox" class="chckField" id="fallergies" name="fallergies" value="Allergies"/>Allergies<br/>
									<input type="checkbox" class="chckField" id="familyplanning" name="familyplanning" value="Family Plannig"/>Family Planning<br/>
								</div>
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">5. General Appearance</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="genappearance" id="genappearance" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">6. Skin</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="skin" id="skin" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">7. Head Bent</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="headbent" id="headbent" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">8. Head and Lymph Nodes</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="headandlymph" id="headandlymph" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">9. Chest Breast</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="chestbreast" id="chestbreast" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">10. Heart</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec" style="text-align: center;">
								Rate: <input type="text" name="hrate" id="hrate" class="hrField"/> BP: <input type="text" name="hsys" id="hsys" class="bpField"> / <input type="text" name="hdia" id="hdia" class="bpField"> Respiration: <input type="text" name="rrate" id="rrate" class="hrField"/>
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">11. Abdomen</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec" style="text-align: center;">
								<input type="checkbox" id="stomach" name="stomach" value="Stomach" class="chckField"/>Stomach <input type="checkbox" id="liver" name="liver" value="liver" class="chckField"/>Liver <input type="checkbox" id="gallbladder" name="gallbladder" value="Gallbladder" class="chckField"/>Gallbladder <input type="checkbox" id="spleen" name="spleen" value="Spleen" class="chckField"/>Spleen
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">12. Kidney, Bladder</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="kidneyblad" id="kidneyblad" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">13. Genitalia</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="genitalia" id="genitalia" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">14. Spine Extremities</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="spine" id="spine" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">15. Neurological</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="neurological" id="neurological" class="txtField"></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">16. Admitting Impression</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="impression" id="impression" class="txtField"></textarea></div>
						</div>
                        <div class="hxRowLong">
                        	<div class="titleCell hx-title-rec">Medical Examiner:</div>
                        </div>
                        <div class="hxRowLong">
                        	<div class="contentCell hx-cont-rec">
                            	<select name="docid" id="docid" class="docField">
                                		<option value="">Select</option>
								<?php
								$getAv = getAllAvDoctors();
								foreach ($getAv as $av){
								?>
										<option value="<?php echo $av["did"];?>">Dr. <?php echo $av["firstname"];?> <?php echo $av["lastname"];?>, <?php echo $av["title"];?> - <?php echo $av["specialization"];?></option>
								<?php } ?>
                                </select>
                            </div>
                        </div>
						<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec" style="text-align: right;">
								<input type="reset" id="reset" value="Reset Fields" class="bluebutton"/>
								<input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>"/>
								<input type="hidden" id="rid" name="rid" value="<?php echo $rid;?>"/>
								<input type="hidden" id="aid" name="aid" value="<?php echo $aid;?>"/>	
								<input type="submit" name="subHxPhys" id="subHxPhys" value="Submit Patient's History and Physical" class="greenbutton"/>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</form>	
		</div>
		<?php }else{ include 'templates/showhistoryphypt.php';} ?>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#showHxPhy").click(function() {		
		$("#hxShowWrapper").slideUp(1000);
		$("#hxFormHolder").slideDown(1000);
		$('body,html').animate({scrollTop:0},800);
	});
});
</script>
<script>
$(document).ready(function(){	
	$("textarea").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("textarea").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
	
	$("#othcheck").click(function(){
		if ($(this).attr('checked')){
			$("#others").removeAttr("disabled"); 
		}else{
			$("#others").attr("disabled", "disabled");
			$("#others").val("");
		}
	});
	$("#prevcheck").click(function(){
		if ($(this).attr('checked')){
			$("#prevop").removeAttr("disabled"); 
		}else{
			$("#prevop").attr("disabled", "disabled");
			$("#prevop").val("");
		}
	});
	$("#childcheck").click(function(){
		if ($(this).attr('checked')){
			$("#children").removeAttr("disabled"); 
		}else{
			$("#children").attr("disabled", "disabled");
			$("#children").val("");
		}
	});
});
</script>