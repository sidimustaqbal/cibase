<?php defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in()
{
	return (isset(get_instance()->current_user->id)) ? true : false;
}

function group_has_role($module, $role)
{
	if (empty(ci()->current_user))
	{
		return false;
	}

	ci()->config->load('permissions');

	$groups = ci()->current_user->groups;

	$user_groups = array();
	foreach ($groups as $group_entry) {
		$user_groups[] = $group_entry->name;
	}

	
	if (in_array('admin', $user_groups))
	{
		return true;
	}

	$permissions_lists = ci()->config->item('permissions');

	$permissions[$module] = array();
	foreach ($user_groups as $user_group) {
		if(!empty($permissions_lists[$user_group])) {
			$permissions[$module] = array_unique(array_merge($permissions[$module], $permissions_lists[$user_group][$module]));
		}
	}

	if (empty($permissions[$module]) or !in_array($role, ($permissions[$module])))
	{
		return false;
	}

	return true;
}