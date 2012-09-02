<?php
$hxcont = getHxPhy($pid, $rid, $aid);
if(empty($hxcont)){
	header("Location: pagenotfound.php");
	exit();
}else{
?>		
	<div id="holder">
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
					<div class="contentCell"></div>
					<div class="titleCell hx-title">Bed No.:</div>
					<div class="contentCell hx-cont-bn"><?php echo $bednum;?></div>
					<div class="titleCell hx-title">Hospital No.:</div>
					<div class="contentCell hx-cont-last">#<?php echo $opdnum;?></div>
				</div>
			</div>
		</div>
	</div>
	<?php foreach ($hxcont as $hx){ ?>
	<div id="hxShowWrapper">
		<div id="hxRecWrapper">
			<div class="hxHolder">
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec" style="border-top:1px solid #ccc;">1. Chief Complaint</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["complaint"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">2. Present Illness</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["presentill"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">3. Past Illness (History)</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec">
						<div id="col1">
							<?php if($hx["measles"] != "N/A"){echo $hx["measles"] . '<br/>';}?>
							<?php if($hx["tb"] != "N/A"){echo $hx["tb"] . '<br/>';}?>
							<?php if($hx["malaria"] != "N/A"){echo $hx["malaria"] . '<br/>';}?>
							<?php if($hx["arthritis"] != "N/A"){echo $hx["arthritis"] . '<br/>';}?>
							<?php if($hx["syphillis"] != "N/A"){echo $hx["syphillis"] . '<br/>';}?>
							<?php if($hx["drugs"] != "N/A"){echo $hx["drugs"] . '<br/>';}?>
						</div>
						<div id="col2">
							<?php if($hx["mumps"] != "N/A"){echo $hx["mumps"] . '<br/>';}?>
							<?php if($hx["asthma"] != "N/A"){echo $hx["asthma"] . '<br/>';}?>
							<?php if($hx["rheumatic"] != "N/A"){echo $hx["rheumatic"] . '<br/>';}?>
							<?php if($hx["typhoid"] != "N/A"){echo $hx["typhoid"] . '<br/>';}?>
							<?php if($hx["diarrhea"] != "N/A"){echo $hx["diarrhea"] . '<br/>';}?>
							<?php if($hx["alcoholism"] != "N/A"){echo $hx["alcoholism"] . '<br/>';}?>
						</div>
						<div id="col3">
							<?php if($hx["mental"] != "N/A"){echo $hx["mental"] . '<br/>';}?>
							<?php if($hx["diabetes"] != "N/A"){echo $hx["diabetes"] . '<br/>';}?>
							<?php if($hx["cancer"] != "N/A"){echo $hx["cancer"] . '<br/>';}?>
							<?php if($hx["hypertension"] != "N/A"){echo $hx["hypertension"] . '<br/>';}?>
							<?php if($hx["blooddys"] != "N/A"){echo $hx["blooddys"] . '<br/>';}?>
							<?php if($hx["allergies"] != "N/A"){echo $hx["measles"] . '<br/>';}?>
						</div>
						<?php if($hx["others"] != "N/A"){echo '<strong>Others</strong>: ' . $hx["others"] . '<br/>';}?>
						<?php if($hx["previousop"] != "N/A"){echo '<strong>Previous Operation</strong>: ' . $hx["previousop"] . '<br/>';}?>
						<?php if($hx["children"] != "N/A"){echo '<strong>Children How Many</strong>: ' . $hx["children"] . '<br/>';}?>
					</div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">4. Family History</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec">
						<div id="fcol1">
							<?php if($hx["fcancer"] != "N/A"){echo $hx["fcancer"] . '<br/>';}?>
							<?php if($hx["ftb"] != "N/A"){echo $hx["ftb"] . '<br/>';}?>
							<?php if($hx["fhypertension"] != "N/A"){echo $hx["fhypertension"] . '<br/>';}?>
							<?php if($hx["fmental"] != "N/A"){echo $hx["fmental"] . '<br/>';}?>
							<?php if($hx["fblooddys"] != "N/A"){echo $hx["fblooddys"] . '<br/>';}?>
						</div>
						<div id="fcol2">
							<?php if($hx["heartdisease"] != "N/A"){echo $hx["heartdisease"] . '<br/>';}?>
							<?php if($hx["fdiabetes"] != "N/A"){echo $hx["fdiabetes"] . '<br/>';}?>
							<?php if($hx["fallergies"] != "N/A"){echo $hx["fallergies"] . '<br/>';}?>
							<?php if($hx["familyplanning"] != "N/A"){echo $hx["familyplanning"] . '<br/>';}?>
						</div>
					</div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">5. General Appearance</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["genappearance"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">6. Skin</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["skin"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">7. Head Bent</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["headbent"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">8. Head and Lymph Nodes</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["headandlymph"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">9. Chest Breast</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["chestbreast"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">10. Heart</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec">
						<strong>Rate:</strong> <?php echo $hx["hrate"];?> pulse per minute<br/>
						<strong>BP:</strong> <?php echo $hx["bp"];?> mmHg<br/>
						<strong>Respiration:</strong> <?php echo $hx["rrate"];?> breathes per minute
					</div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">11. Abdomen</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec">
						<?php if($hx["stomach"] != "N/A"){echo $hx["stomach"] . '<br/>';}?>
						<?php if($hx["liver"] != "N/A"){echo $hx["liver"] . '<br/>';}?>
						<?php if($hx["gallbladder"] != "N/A"){echo $hx["gallbladder"] . '<br/>';}?>
						<?php if($hx["spleen"] != "N/A"){echo $hx["spleen"] . '<br/>';}?>
					</div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">12. Kidney, Bladder</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["kidneyblad"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">13. Genitalia</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["genitalia"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">14. Spine Extremities</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["spine"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">15. Neurological</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["neurological"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">16. Admitting Impression</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec"><?php echo $hx["impression"];?></div>
				</div>
				<div class="hxRowLong">
					<div class="titleCell hx-title-rec">Doctor Observed:</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec">
					<?php
					$drName = getDocProf($hx["doctor"]);
					if(empty($drName)){
						echo 'Still waiting for a doctor';
					}else{
						foreach ($drName as $dr){
							echo 'Dr.' . $dr["firstname"] .' ' . $dr["lastname"] . ', ' . $dr["title"];
						}
					}
					?>
					</div>
				</div>
				<div class="hxRowLong">
					<div class="contentCell hx-cont-rec" style="text-align: right;">
						<input type="button" id="showHxPhy" name="showHxPhy" class="bluebutton" value="Update Patient's History and Physical Examination"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="hxFormHolder" style="display:none;">
		<form id="pthxForm">
			<div id="hxRecWrapper">
				<div class="hxHolder">
					<div class="hxRowLong">
						<div class="titleCell hx-title-rec" style="border-top:1px solid #ccc;">1. Chief Complaint</div>
					</div>
					<div class="hxRowLong">
						<div class="contentCell hx-cont-rec"><textarea name="complaint" id="complaint" class="txtField"><?php echo $hx["complaint"];?></textarea></div>
					</div>
					<div class="hxRowLong">
						<div class="titleCell hx-title-rec">2. Present Illness</div>
					</div>
					<div class="hxRowLong">
						<div class="contentCell hx-cont-rec"><textarea name="presentill" id="presentill" class="txtField"><?php echo $hx["presentill"];?></textarea></div>
					</div>
					<div class="hxRowLong">
						<div class="titleCell hx-title-rec">3. Past Illness (History)</div>
					</div>
					<div class="hxRowLong">
						<div class="contentCell hx-cont-rec">
							<div id="col1">
								<input type="checkbox" id="measles" name="measles" value="Measles" class="chckField" <?php if($hx["measles"]!="N/A"){echo 'checked="checked"';}?>/>Measles<br/>
									<input type="checkbox" id="tb" name="tb" value="TB" class="chckField" <?php if($hx["tb"]!="N/A"){echo 'checked="checked"';}?>/>TB<br/>
									<input type="checkbox" id="malaria" name="malaria" value="Malaria" class="chckField" <?php if($hx["malaria"]!="N/A"){echo 'checked="checked"';}?>/>Malaria<br/>
									<input type="checkbox" id="arthritis" name="arthritis" value="Arthritis" class="chckField" <?php if($hx["arthritis"]!="N/A"){echo 'checked="checked"';}?>/>Arthritis<br/>
									<input type="checkbox" id="syphillis" name="syphillis" value="Syphillis" class="chckField" <?php if($hx["syphillis"]!="N/A"){echo 'checked="checked"';}?>/>Syphillis<br/>
									<input type="checkbox" id="drugs" name="drugs" value="Drugs" class="chckField" <?php if($hx["drugs"]!="N/A"){echo 'checked="checked"';}?>/>Drugs<br/>
								</div>
								<div id="col2">
									<input type="checkbox" id="mumps" name="mumps" value="Mumps" class="chckField" <?php if($hx["mumps"]!="N/A"){echo 'checked="checked"';}?>/>Mumps<br/>
									<input type="checkbox" id="asthma" name="asthma" value="Asthma" class="chckField" <?php if($hx["asthma"]!="N/A"){echo 'checked="checked"';}?>/>Asthma<br/>
									<input type="checkbox" id="rheumatic" name="rheumatic" value="Rheumatic Fever" class="chckField" <?php if($hx["rheumatic"]!="N/A"){echo 'checked="checked"';}?>/>Rheumatic Fever<br/>
									<input type="checkbox" id="typhoid" name="typhoid" value="Typhoid Fever" class="chckField" <?php if($hx["typhoid"]!="N/A"){echo 'checked="checked"';}?>/>Typhoid Fever<br/>
									<input type="checkbox" id="diarrhea" name="diarrhea" value="Diarrhea" class="chckField" <?php if($hx["diarrhea"]!="N/A"){echo 'checked="checked"';}?>/>Diarrhea<br/>
									<input type="checkbox" id="alcoholism" name="alcoholism" value="Alcholism" class="chckField" <?php if($hx["alcoholism"]!="N/A"){echo 'checked="checked"';}?>/>Alcoholism<br/>
								</div>
								<div id="col3">
									<input type="checkbox" id="mental" name="mental" value="Mental Illness" class="chckField" <?php if($hx["mental"]!="N/A"){echo 'checked="checked"';}?>/>Mental Illness<br/>
									<input type="checkbox" id="diabetes" name="diabetes" value="Diabetes" class="chckField" <?php if($hx["diabetes"]!="N/A"){echo 'checked="checked"';}?>/>Diabetes<br/>
									<input type="checkbox" id="cancer" name="cancer" value="Cancer" class="chckField" <?php if($hx["cancer"]!="N/A"){echo 'checked="checked"';}?>/>Cancer<br/>
									<input type="checkbox" id="hypertension" name="hypertension" value="Hypertension" class="chckField" <?php if($hx["hypertension"]!="N/A"){echo 'checked="checked"';}?>/>Hypertension<br/>
									<input type="checkbox" id="blooddys" name="blooddys" value="Blood Dys" class="chckField" <?php if($hx["blooddys"]!="N/A"){echo 'checked="checked"';}?>/>Blood Dys<br/>
									<input type="checkbox" id="allergies" name="allergies" value="Allergies" class="chckField" <?php if($hx["allergies"]!="N/A"){echo 'checked="checked"';}?>/>Allergies<br/>
								</div>
								<input type="checkbox" id="othcheck" class="chckField" style="margin-left: 10px;" class="textField" <?php if($hx["others"]!="N/A"){echo 'checked="checked"';}?>/><?php if($hx["others"]!="N/A"){?>Others: <input type="text" name="others" id="others" class="textField" value="<?php echo $hx["others"];?>"/><br/><?php }else{ ?><input type="text" name="others" id="others" class="textField" disabled="disabled"/><br/><?php } ?>
								
								<input type="checkbox" id="prevcheck" class="chckField" style="margin-left: 10px;" <?php if($hx["previousop"]!="N/A"){echo 'checked="checked"';}?>/>Previous Operation: <?php if($hx["previousop"]!="N/A"){?><input type="text" name="prevop" id="prevop" class="textField" value="<?php echo $hx["previousop"];?>"><br/><?php }else{ ?><input type="text" name="prevop" id="prevop" class="textField" disabled="disabled"><br/><?php } ?>
								
								<input type="checkbox" id="childcheck" class="chckField" style="margin-left: 10px;" <?php if($hx["children"]!="N/A"){echo 'checked="checked"';}?>/>Children How Many: <?php if($hx["children"]!="N/A"){?><input type="text" name="children" id="children" class="textField" value="<?php echo $hx["children"];?>"/><?php }else{?><input type="text" name="children" id="children" class="textField" disabled="disabled"/><?php } ?>
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">4. Family History</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec">
								<div id="fcol1">
									<input type="checkbox" class="chckField" id="fcancer" name="fcancer" value="Cancer" <?php if($hx["fcancer"]!="N/A"){echo 'checked="checked"';}?>/>Cancer<br/>
									<input type="checkbox" class="chckField" id="ftb" name="ftb" value="TB" <?php if($hx["ftb"]!="N/A"){echo 'checked="checked"';}?>/>TB<br/>
									<input type="checkbox" class="chckField" id="fhypertension" name="fhypertension" value="Hypertenstion" <?php if($hx["fhypertension"]!="N/A"){echo 'checked="checked"';}?>/>Hypertension<br/>
									<input type="checkbox" class="chckField" id="fmental" name="fmental" value="Mental Illness" <?php if($hx["fmental"]!="N/A"){echo 'checked="checked"';}?>/>Mental Illness<br/>
									<input type="checkbox" class="chckField" id="fblooddys" name="fblooddys" value="Blood Dyscrasia" <?php if($hx["fblooddys"]!="N/A"){echo 'checked="checked"';}?>/>Blood Dyscrasia<br/>
								</div>
								<div id="fcol2">
									<input type="checkbox" class="chckField" id="heartdisease" name="heartdisease" value="Heart Disease" <?php if($hx["heartdisease"]!="N/A"){echo 'checked="checked"';}?>/>Heart Disease<br/>
									<input type="checkbox" class="chckField" id="fdiabetes" name="fdiabetes" value="Diabetes" <?php if($hx["fdiabetes"]!="N/A"){echo 'checked="checked"';}?>/>Diabetes<br/>
									<input type="checkbox" class="chckField" id="fallergies" name="fallergies" value="Allergies" <?php if($hx["fallergies"]!="N/A"){echo 'checked="checked"';}?>/>Allergies<br/>
									<input type="checkbox" class="chckField" id="familyplanning" name="familyplanning" value="Family Plannig" <?php if($hx["familyplanning"]!="N/A"){echo 'checked="checked"';}?>/>Family Planning<br/>
								</div>
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">5. General Appearance</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="genappearance" id="genappearance" class="txtField"><?php echo $hx["genappearance"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">6. Skin</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="skin" id="skin" class="txtField"><?php echo $hx["skin"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">7. Head Bent</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="headbent" id="headbent" class="txtField"><?php echo $hx["headbent"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">8. Head and Lymph Nodes</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="headandlymph" id="headandlymph" class="txtField"><?php echo $hx["headandlymph"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">9. Chest Breast</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="chestbreast" id="chestbreast" class="txtField"><?php echo $hx["chestbreast"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">10. Heart</div>
						</div>
						<div class="hxRowLong">
							<?php
							$pr = explode('/', $hx["bp"]);
							$sys = $pr[0];
							$dia = $pr[1];
							?>
							<div class="contentCell hx-cont-rec" style="text-align: center;">
								Rate: <input type="text" name="hrate" id="hrate" class="hrField" value="<?php echo $hx["hrate"];?>"/> BP: <input type="text" name="hsys" id="hsys" class="bpField" value="<?php echo $sys;?>"/> / <input type="text" name="hdia" id="hdia" class="bpField" value="<?php echo $dia;?>"/> Respiration: <input type="text" name="rrate" id="rrate" class="hrField" value="<?php echo $hx["rrate"];?>"/>
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">11. Abdomen</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec" style="text-align: center;">
								<input type="checkbox" id="stomach" name="stomach" value="Stomach" class="chckField" <?php if($hx["stomach"]!="N/A"){echo 'checked="checked"';}?>/>Stomach <input type="checkbox" id="liver" name="liver" value="liver" class="chckField" <?php if($hx["liver"]!="N/A"){echo 'checked="checked"';}?>/>Liver <input type="checkbox" id="gallbladder" name="gallbladder" value="Gallbladder" class="chckField" <?php if($hx["gallbladder"]!="N/A"){echo 'checked="checked"';}?>/>Gallbladder <input type="checkbox" id="spleen" name="spleen" value="Spleen" class="chckField" <?php if($hx["spleen"]!="N/A"){echo 'checked="checked"';}?>/>Spleen
							</div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">12. Kidney, Bladder</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="kidneyblad" id="kidneyblad" class="txtField"><?php echo $hx["kidneyblad"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">13. Genitalia</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="genitalia" id="genitalia" class="txtField"><?php echo $hx["genitalia"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">14. Spine Extremities</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="spine" id="spine" class="txtField"><?php echo $hx["spine"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">15. Neurological</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="neurological" id="neurological" class="txtField"><?php echo $hx["neurological"];?></textarea></div>
						</div>
						<div class="hxRowLong">
							<div class="titleCell hx-title-rec">16. Admitting Impression</div>
						</div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec"><textarea name="impression" id="impression" class="txtField"><?php echo $hx["impression"];?></textarea></div>
						</div>
                        <div class="hxRowLong">
                        	<div class="titleCell hx-title-rec">Doctor Observed:</div>
                        </div>
                        <div class="hxRowLong">
                        	<div class="contentCell hx-cont-rec">
                            	<select name="docid" id="docid" class="docField">
                                		<option value="">Select</option>
								<?php
								$getAv = getAllAvDoctors();
								foreach ($getAv as $av){
								?>
										<option value="<?php echo $av["did"];?>" <?php if($av["did"] == $hx["doctor"]){echo 'selected="selected"';}?>>Dr. <?php echo $av["firstname"];?> <?php echo $av["lastname"];?>, <?php echo $av["title"];?> - <?php echo $av["specialization"];?></option>
								<?php } ?>
                                </select>
                            </div>
                        </div>
						<div class="hxRowLong">
							<div class="contentCell hx-cont-rec" style="text-align: right;">
								<input type="reset" id="reset" value="Reset Fields" class="bluebutton"/>
								<input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>"/>
								<input type="hidden" id="rid" name="rid" value="<?php echo $rid;?>"/>
								<input type="hidden" id="aid" name="aid" value="<?php echo $aid;?>"/>
								<input type="hidden" id="iid" name="iid" value="<?php echo $hx["iid"];?>"/>
								<input type="hidden" id="hid" name="hid" value="<?php echo $hx["hid"];?>"/>
								<input type="submit" name="upHxPhys" id="upHxPhys" value="Update Patient's History and Physical" class="greenbutton"/>
						</div>
					</div>
				</div>
			</div>
		</form>	
	</div>
<?php 
	}
}
?>