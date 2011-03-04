<?php 

function pagelines_theme_options()
{
	
	$intro = '<small><strong>Welcome to Reblue theme options.</strong> This section allows you to customize your theme.</small>';
	
	$option_type = 'option';
	$save_button = '儲存';
	get_option_header($option_type, $intro, $save_button);
?>			
	<div id="tabs">	
		<ul id="tabsnav">
			<li><span class="graphic top">&nbsp;</span></li>
			<?php 	
				$optionarray = get_option_array();
			?>
			<?php foreach($optionarray as $menuitem => $options)
			{?>
				<li>
					<a class="<?php echo $menuitem;?>" href="#<?php echo $menuitem;?>">
						<span><?php echo ucwords(str_replace('_',' ',$menuitem));?></span>
					</a>
				</li>
			<?php } ?>	
			<li><span class="graphic bottom">&nbsp;</span></li>
		</ul>
		<div id="thetabs" class="fix">
			<?php foreach($optionarray as $menuitem => $options)
			{ ?>
		
				<div id="<?php echo $menuitem;?>" class="tabinfo fix">
					<div class="tabtitle"><?php echo ucwords(str_replace('_',' ',$menuitem));?></div>
				<?php foreach ( $options as $optionid => $o)
				{
					if ( !isset($o['version']) || (isset($o['version']) && $o['version'] == 'pro') )
					{
						if ( isset($o['selectvalues']) )
							$serialize_subvalues = serialize($o['selectvalues']);
						else
							$serialize_subvalues = '';
						$o['version'] = isset($o['version']) ? $o['version'] : '';
						$o['imagepreview'] = isset($o['imagepreview']) ? $o['imagepreview'] : '';
						$o['optionicon'] = isset($o['optionicon']) ? $o['optionicon'] : '';
						$o['layout'] = isset($o['layout']) ? $o['layout'] : '';
						$o['inputlabel'] = isset($o['inputlabel']) ? $o['inputlabel'] : '';

						$engine_args = 'version='.$o['version'].'&img_width='. $o['imagepreview'].'&selectvalues='.$serialize_subvalues.'&optionicon='. $o['optionicon'].'&layout='.$o['layout'];
						if ( isset($o['wp_option'])) $optionvalue = get_option($optionid);
						else $optionvalue = pagelines($optionid);                                            
						option_engine($o['type'], $optionid, $optionvalue, $o['title'], $o['shortexp'], $o['exp'], $o['inputlabel'], $engine_args);
					}
				}
			echo '</div>';
			}
				?>
		</div> <!-- End the tabs -->
	</div> <!-- End tabs -->

	<?php get_option_footer('option', $save_button);?>
<?php
}

function pagelines_feature_options()
{	
		$intro = '<small><strong>Welcome to '.THEMENAME.' feature setup.</strong> This section allows you to customize this theme\'s feature templates.</small>';
		$save_button = '儲存';
		$option_type = 'feature';
		
		get_option_header($option_type, $intro, $save_button );
	?>			
	<div id="tabs">

		<ul id="tabsnav">
			<li><span class="graphic top">&nbsp;</span></li>
			<?php $featurearray = get_feature_array();?>
			<?php foreach($featurearray as $menuitem => $options):?>
			<li><a onClick="" class="<?php echo $menuitem;?>" href="#<?php echo $menuitem;?>"><span><?php echo ucwords(str_replace('_',' ',$menuitem));?></span></a></li>
			<?php endforeach;?>
			
			<?php if(is_array(pagelines('features'))):?>
				<?php foreach(pagelines('features') as $key => $feature):?>
					<li>
						<a onClick="" class="feature <?php echo 'feature'.$key;?>" href="#<?php echo 'feature'.$key;?>">
							<span>
								<?php if(isset($feature['name']) && $feature['name'] != null):?>
									<?php echo $feature['name'];?>
								<?php else:?>
									<?php echo '新增 Slide';?>
								<?php endif;?>
							</span>
						</a>
					</li>
				<?php endforeach;?>
			<?php endif;?>
			<?php if(is_array(pagelines('fboxes'))):?>
				<?php foreach(pagelines('fboxes') as $key => $fbox):?>
					<li>
						<a onClick="" class="fbox" href="#<?php echo 'fbox'.$key;?>">
							<span>
								<?php if(isset($fbox['name']) && $fbox['name'] != null):?>
									<?php echo $fbox['name'];?>
								<?php else:?>
									<?php echo 'New Feature Box';?>
								<?php endif;?>
							</span>
						</a>
					</li>
				<?php endforeach;?>
			<?php endif;?>
			<li><span class="graphic bottom">&nbsp;</span></li>

		</ul>
		<div id="thetabs" class="fix">		
				<?php foreach($featurearray as $menuitem => $options):?>
				<div id="<?php echo $menuitem;?>" class="tabinfo fix">
					<div class="tabtitle"><?php echo ucwords(str_replace('_',' ',$menuitem));?></div>
				
					<?php foreach($options as $optionid => $o):?>
						
						<?php 
						if ( isset($o['selectvalues']) )
							$serialize_subvalues = serialize($o['selectvalues']);
						else
							$serialize_subvalues = '';

						$o['version'] = isset($o['version']) ? $o['version'] : '';
						$o['imagepreview'] = isset($o['imagepreview']) ? $o['imagepreview'] : '';
						$o['optionicon'] = isset($o['optionicon']) ? $o['optionicon'] : '';
						$o['layout'] = isset($o['layout']) ? $o['layout'] : '';
						$o['inputlabel'] = isset($o['inputlabel']) ? $o['inputlabel'] : '';

						$engine_args = 'img_width='.$o['imagepreview'].'&selectvalues='.$serialize_subvalues.'&optionicon='.$o['optionicon'].'&layout='.$o['layout'];
						if(isset($o['wp_option'])) $optionvalue = get_option($optionid);
						else $optionvalue = pagelines($optionid);
						option_engine($o['type'], $optionid, $optionvalue,$o['title'], $o['shortexp'], $o['exp'], $o['inputlabel'], $engine_args);
						?>
											
					<?php endforeach; ?>
			</div>

			<?php endforeach; ?>
			
			<?php $fset = get_feature_setup();?>
			
			<?php if(is_array(pagelines('features'))):?>
				<?php foreach(pagelines('features') as $key => $feature):?>
					
					<div id="<?php echo 'feature'.$key;?>" class="featuretab tabinfo fix">
						<div class="tabtitle">
							<?php if(isset($feature['name']) && $feature['name'] != null):
								echo $feature['name'];
							else:
								echo '新增 Slide';
							endif;?>
						</div>
							<?php
							// goes through setup array and makes sure option array has option have it set (for upgrades).. if not it will add it..
							foreach($fset as $setupoption => $val){
								if(!array_key_exists($setupoption, $feature)){
									$feature[$setupoption] = '';
								}
							}
							foreach($feature as $field => $fieldvalue):
								if(isset($fset[$field])):
									$optionid = 'feature['.$key.']['.$field.']';
									option_engine($fset[$field]['type'], $optionid, $fieldvalue, $fset[$field]['title'], $fset[$field]['shortexp'], $fset[$field]['exp'], $fset[$field]['inputlabel']);
								endif;
							endforeach;?>
						<div class="insidebox context">
							<input class="button-secondary" type="submit" name="delete_feature_slide[<?php echo $key;?>]" onClick="return ConfirmDelSlide();" value="Delete" /> Delete this feature box.
						</div>
						<?php pl_action_confirm('ConfirmDelSlide', '您確定要把這個 Slide 刪掉嗎？');?>		
					</div>
					
			<?php endforeach;?>
			<?php endif;?>

			<?php $fboxset = get_fbox_setup();?>

			<?php if(is_array(pagelines('fboxes'))):?>
				<?php foreach(pagelines('fboxes') as $key => $fbox):?>
					
					<div id="<?php echo 'fbox'.$key;?>" class="tabinfo fix">
						<div class="tabtitle">
						<?php if(isset($fbox['name']) && $fbox['name'] != null):?>
							<?php echo $fbox['name'];?>
						<?php else:?>
							<?php echo 'New Feature Box';?>
						<?php endif;?>
						</div>
						<?php
						// goes through setup array and makes sure option array has option have it set (for upgrades).. if not it will add it..
						foreach($fboxset as $setupoption => $val){
							if(!array_key_exists($setupoption, $fbox)){
								$fbox[$setupoption] = '';
							}
						}
						foreach($fbox as $field => $fieldvalue):
							if(isset($fboxset[$field])):								
								$optionid = 'fbox['.$key.']['.$field.']';
								option_engine($fboxset[$field]['type'], $optionid, $fieldvalue, $fboxset[$field]['title'], $fboxset[$field]['shortexp'], $fboxset[$field]['exp'], $fboxset[$field]['inputlabel']);
							endif;
						endforeach;?>
						<div class="insidebox context">
							<input class="button-secondary" type="submit" name="delete_feature_box[<?php echo $key;?>]" onClick="return ConfirmDelBox();" value="Delete" /> Delete this feature box.
						</div>
						<?php pl_action_confirm('ConfirmDelBox', 'Are you sure? This will delete this box.');?>
					</div>
					
				<?php endforeach;?>
			<?php endif;?>
		</div> <!-- end the tabs -->
	</div> <!-- end tabs -->
		
	<?php get_option_footer($option_type, $save_button);?>
<?php
}
?>
