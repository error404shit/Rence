<?php
if ( is_active_sidebar('footer-four') ) {
	dynamic_sidebar( 'footer-four' );
} else {
	return false;
}