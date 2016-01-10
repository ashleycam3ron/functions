<?php
// CUSTOM USER PROFILE FIELDS
   function my_custom_userfields( $contactmethods ) {

   // ADD CONTACT CUSTOM FIELDS
    $contactmethods['contact_phone_office']     = 'Office Phone';
    $contactmethods['contact_phone_mobile']     = 'Mobile Phone';
    $contactmethods['contact_office_fax']       = 'Office Fax';

	// ADD ADDRESS CUSTOM FIELDS
    $contactmethods['address_line_1']       = 'Address Line 1';
    $contactmethods['address_line_2']       = 'Address Line 2 (optional)';
    $contactmethods['address_city']         = 'City';
    $contactmethods['address_state']        = 'State';
    $contactmethods['address_zipcode']      = 'Zipcode';
    return $contactmethods;
   }
   add_filter('user_contactmethods','my_custom_userfields',10,1);