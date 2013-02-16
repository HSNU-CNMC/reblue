			<div class="footer clear text">
				<div class="effect">
					<div class="fcolumns_container text">
						<?php	for ( $i = 1 ; $i <= 3 ; $i++ )
						{
							echo '<div class="fcol">';
							echo ot_get_option('footer_column_'.$i);
							echo '</div>';
						} ?>
						<div class="fcol">
						<?php echo ot_get_option('footer_contact'); ?>
						</div>
					</div><!--fcolumns_container-->
					<a href="#top" class="mobile-text">top</a>
				</div><!--effect-->
			</div><!--footer-->
		</div><!--wrapper-->
		<?php wp_footer(); ?>
	</body>
</html>
