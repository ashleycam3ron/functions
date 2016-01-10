<?php
	// Bookmark/Add to favorites link
/*
	add_filter( 'wp_nav_menu_items', 'bookmark', 10, 2 );
	function bookmark ( $items, $args ) {
	    if ( $args->theme_location == 'social' ) {
	        $items .= '<li><a href="javascript:CreateBookmarkLink();" class="bookmark">Bookmark</a></li>';
	    }
	    return $items;
	}
*/

function bookmark_this(){ ?>
	<script>
		jQuery(document).ready(function($) {
		  $('.bookmark').click(function(e) {
		    var bookmarkURL = window.location.href;
		    var bookmarkTitle = document.title;

		    if ('addToHomescreen' in window && window.addToHomescreen.isCompatible) {
		      // Mobile browsers
		      addToHomescreen({ autostart: false, startDelay: 0 }).show(true);
		    } else if (window.sidebar && window.sidebar.addPanel) {
		      // Firefox version < 23
		      window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
		    } else if ((window.sidebar && /Firefox/i.test(navigator.userAgent)) || (window.opera && window.print)) {
		      // Firefox version >= 23 and Opera Hotlist
		      $(this).attr({
		        href: bookmarkURL,
		        title: bookmarkTitle,
		        rel: 'sidebar'
		      }).off(e);
		      return true;
		    } else if (window.external && ('AddFavorite' in window.external)) {
		      // IE Favorite
		      window.external.AddFavorite(bookmarkURL, bookmarkTitle);
		    } else {
		      // Other browsers (mainly WebKit - Chrome/Safari)
		      alert('Press ' + (/Mac/i.test(navigator.userAgent) ? 'Cmd' : 'Ctrl') + '+D to bookmark this page.');
		    }

		    return false;
		  });
		});
	</script>
<?php } ?>