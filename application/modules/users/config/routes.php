<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['users/admin/user(:any)'] = 'admin_user$1';
$route['users/admin/group(:any)'] = 'admin_group$1';