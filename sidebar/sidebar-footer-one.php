<?php
if ( is_active_sidebar('footer-one') ) {
	dynamic_sidebar( 'footer-one' );
} else {
	return false;
}