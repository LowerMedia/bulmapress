<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BulmapressStarter
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer hero has-background-grey" role="contentinfo">
	<div class="has-background-grey pt-5 pb-4">
		<div class="footer-content container">
			<div class="site-info columns is-marginless is-multiline">
				<?php bulmapress_copyright_link(); ?>
				<div class="column is-full-touch is-narrow pt-0">
					<?php get_acf_image_from_handle('site_logo_image', true, 'footer-logo'); ?>
				</div><!-- .column -->
				<div class="column is-2-desktop is-full-touch py-0 pt-1-desktop mt-1-desktop">
					<?php bulmapress_navigation('footer-button-menu', 0, ''); ?>
				</div><!-- .column -->
				<div class="column is-full-touch py-0 px-0 has-text-white has-text-centered-touch has-text-centered-touch">
					<h5><?php display_acf_formatted_phonenumber('phone_number', 'has-text-white is-size-4 font-main-semi-bold'); ?></h5>
					<h6 class="font-main-semi-bold">FAX: <?php display_acf_formatted_phonenumber('phone_number', 'has-text-white is-size-6 font-main-semi-bold'); ?></h6>
				</div><!-- .column -->
				<div class="column is-1-desktop is-full-touch py-0 pr-6-desktop has-text-centered-touch has-text-centered-touch">
					<div class="columns">
						<div class="column is-1 px-0 pt-2">
							<?php bulmapress_navigation('footer-social-menu', 0, ''); ?>
						</div><!-- .column -->
					</div><!-- .columns -->
				</div><!-- .column -->
				<div class="column is-2-desktop is-full-touch py-0 mb-6-touch has-border-left-desktop has-text-centered-touch has-text-centered-touch has-text-white">
					<?php the_field('footer_block_one', 'option'); ?>
				</div><!-- .column -->
				<div class="column is-2-desktop is-full-touch py-0 mb-6-touch has-border-left-desktop has-text-centered-touch has-text-centered-touch has-text-white">
					<?php the_field('footer_block_two', 'option'); ?>
				</div><!-- .column -->
				<div class="column is-2-desktop is-full-touch py-0 has-border-left-desktop has-text-centered-touch has-text-centered-touch has-text-white">
					<?php the_field('footer_block_three', 'option'); ?>
				</div><!-- .column -->
			</div><!-- .site-info -->
		</div>
	</div><!-- .container -->
	<nav id="footer-site-navigation" class="navbar has-background-grey-dark" role="navigation">
		<div class="navbar-menu container">
			<div class="navbar-start"></div>
			<?php bulmapress_navigation('footer-menu', 0, 'footer-nav navbar-start font-conduit is-uppercase has-text-white'); ?>
		</div>
	</nav>
	<div class="has-background-grey-dark">
		<div class="has-text-centered container mt-2 mb-4">
			<div class="site-info has-text-grey-light is-size-8">
				©<?= date('Y') ?> <?= bloginfo() ?> All Rights Reserved. Privacy Policy
			</div><!-- .site-info -->
		</div>
	</div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
