<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.

// Hide trailing zeros on prices.
add_filter( 'woocommerce_price_trim_zeros', 'wc_hide_trailing_zeros', 10, 1 );
function wc_hide_trailing_zeros( $trim ) {
    
    return true;
    
}