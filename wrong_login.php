<?php function wrong_login() {
  return 'Wrong username or password.';
}
add_filter('login_errors', 'wrong_login');