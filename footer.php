			<div class="footer">
				<div class="effect">
					<div class="fcolumns_container text">
						<?php	for ( $i = 1 ; $i <= 4 ; $i++ )
						{
							echo '<div class="fcol">';
							echo pagelines('footer_col'.$i);
							echo '</div>';
						} ?>
						<div class="fcol">
						<?php echo pagelines('inside_contact_info'); ?>
						</div>
					</div><!--fcolumns_container-->
				</div><!--effect-->
			</div><!--footer-->
		</div><!--wrapper-->
		<?php wp_footer(); ?>
	</body>
</html>
