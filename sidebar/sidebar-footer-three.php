<?php
if ( is_active_sidebar('footer-three') ) {
	dynamic_sidebar( 'footer-three' );
} else {
	return false;
}