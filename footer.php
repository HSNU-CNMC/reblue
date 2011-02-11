			<div class="footer">
				<div class="effect">
					<div class="fcolumns_container text">
						<?php	for ( $i = 1 ; $i <= 4 ; $i++ )
						{
							$out = get_option('ide2_fcol'.$i);
							// get_option() returns HTML 'escaped', so I'll strip out all backslashes
							// This might cause problems
							$out = stripslashes($out);
							echo '<div class="fcol">
								'.$out.'
								</div>
								';
						} ?>
						<div class="fcol">
							<address><p>校址：106 台北市大安區信義路三段143號</p></address>
							<p>總機：(02) 2707-5215</p>
							<p>管理員信箱：<a href="mailto:<?php bloginfo('admin_email')?>"><?php bloginfo('admin_email')?></a></p>
							<p>&copy; <?php bloginfo('name'); ?></p>
						</div>
					</div><!--fcolumns_container-->
				</div><!--effect-->
			</div><!--footer-->
		</div><!--wrapper-->
		<?php wp_footer(); ?>
	</body>
</html>
