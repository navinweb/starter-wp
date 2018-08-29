	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nicewp' ) ); ?>">
				<?php
				printf( esc_html__( 'Proudly powered by %s', 'nicewp' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'nicewp' ), 'nicewp', '<a href="http://navinweb.net/">Anatolii Kirzo</a>' );
				?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
