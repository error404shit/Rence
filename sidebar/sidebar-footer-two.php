<?php
if ( is_active_sidebar('footer-two') ) {
	dynamic_sidebar( 'footer-two' );
} else {
	return false;
}