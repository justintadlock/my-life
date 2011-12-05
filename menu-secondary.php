<?php
/**
 * Secondary Menu Template
 *
 * Displays the Secondary Menu if it has active menu items.
 *
 * @package MyLife
 * @subpackage Template
 * @since 0.1.0
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2011, Justin Tadlock
 * @link http://themehybrid.com/themes/my-life
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( has_nav_menu( 'secondary' ) ) : ?>

	<?php do_atomic( 'before_menu_secondary' ); // my-life_before_menu_secondary ?>

	<div id="menu-secondary" class="menu-container">

		<div class="wrap">

			<?php do_atomic( 'open_menu_secondary' ); // my-life_open_menu_secondary ?>

			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container_class' => 'menu', 'menu_class' => '', 'menu_id' => 'menu-secondary-items', 'fallback_cb' => '' ) ); ?>

			<?php do_atomic( 'close_menu_secondary' ); // my-life_close_menu_secondary ?>

		</div>

	</div><!-- #menu-secondary .menu-container -->

	<?php do_atomic( 'after_menu_secondary' ); // my-life_after_menu_secondary ?>

<?php endif; ?>