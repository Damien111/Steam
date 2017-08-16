<?php

$lang = array(
		'__app_steam'					=> "Steam Integration",
		'module__steam_steam'			=> "Steam",
		'menu__steam_steam'				=> "Steam",
		'menu__steam_steam_settings'	=> "Settings",
		'menu__steam_steam_settings_title'	=> "Steam Profile Integration Settings",
		'menu__steam_steam_manage'		=> "Manage",
		'menu__steam_steam_view'		=> "View Profiles",
		'menu__steam_steam_view_title'	=> "View Profiles",
		'task__steamProfile'			=> "Update Profile information / online status",
		'task__steamCleanup'			=> "Check for missing profiles, remove profiles where Steam ID has been removed.",
		'task__steamGames'				=> "Update local cache of recently played & owned games",
		'acp_search_title_steam_Steam'	=> "Steam",
		'group__steam_Steam'			=> "Steam Profile",
		'pf_type_steamid'				=> "Steam ID",
		'profile_steam_steamprofile'	=> "<i class='fa fa-steam'></i> Steam Profile",
		'block_steamPlayerWidget'		=> "Random Steam Profiles",
		'block_steamPlayerWidget_desc'	=> "Show X Random Steam Profiles.",
		'steamIndexCount'				=> "Show how many profiles?",
		'steamIndex2weeks'				=> "Show games played in the last 2 weeks?",
		'steam_settings'				=> "Settings",
		'steam_gen_settings'			=> "General Settings",
		'steam__gen_settings'			=> "General Settings",
		'steam__index_settings'			=> "Board Index",
		'steam__mem_profiles'			=> "Member Profiles",
		'steam_instructions'			=> "Instructions to show on Empty Profiles",
		'steam_api_key'					=> "Steam API Key",
		'steam_custom_field_key'		=> "Custom Profile Field Key",
		'steam_pull_groups'				=> "Get data from members in which groups?",
		'steam_batch_count'				=> "Update Game data X members at a time",
		'steam_batch_count_desc'		=> "Increase if your server can handle it, recommend to stay < 50",
		'steam_profile_count'			=> "Update Online data X members at a time",
		'steam_profile_count_desc'		=> "Enter a multiple of 100",
		'steam_showintopic'				=> "Show in Topics",
		'steam_showonhover'				=> "Show Online status on Hovercard",
		'steam_index_count'				=> "Number of users to show on Board Index",
		'steam_showlastplayed'			=> "Show games played in last 2 weeks on Board Index",
		'steam_pull_groups_index'		=> "Groups to pull for Board Index and Pages",
		'steam_showinprofile'			=> "Show in User Profile",
		'steam_profile_style'			=> "Display style for game list",
		'steam_profile_style_image'		=> "Image Grid",
		'steam_profile_style_list'		=> "List",
		'steam_get_owned'				=> "Display owned games",
		'steam_link_stats'				=> "Link to user stats from Game Icon / Logo?",
		'steam_can_clear'				=> "Users can delete their local cache data?",
		'steam_diagnostics'				=> "Enable DIAGNOSTICS mode?",
		'steam_diagnostics_desc'		=> "Leave OFF for normal operation",
		'steam_pull'					=> "Show Steam Profile",
		'steam_index'					=> "Show on Board Index",
		'steam_status_0'				=> "Offline",
		'steam_status_1'				=> "Online",
		'steam_status_2'				=> "Busy",
		'steam_status_3'				=> "Away",
		'steam_status_4'				=> "Snooze",
		'steam_status_5'				=> "Looking for Trade",
		'steam_status_6'				=> "Looking to Play",
		'task_steam_profile'			=> "Update Failed for ID(s): ",
		'task_steam_profile_done'		=> "Update Complete, No Errors",
		'steam_ingame'					=> "In Game",
		'steam_playing'					=> "Playing",
		'steam_since'					=> "Since",
		'steam_header'					=> "Steam Profile",
		'steam_2weeks'					=> "hrs in the last 2 weeks",
		'steam_noplaytime'				=> "0",
		'steam_private'					=> "This profile is private.",
		'steam_forever'					=> "hrs on record",
		'steam_level'					=> "Level",
		'steam_addfriend'				=> "Add Friend",
		'steam_created'					=> "Created",
		'steam_title'					=> "Steam Users Online",
		'steam_owned_games'				=> "Owned Steam Games",
		'steam_status'					=> "Steam Status",
		'steam_id_invalid'				=> "Steam Name / ID Invalid, cannot find player",
		'steam_last_update'				=> "Last Update",
		'steam_err_getlevel'			=> "Error: Failed response from Steam Servers, GetLevel",
		'steam_err_getvanity'			=> "Error: Failed response from Steam Servers, ResolveVanity",
		'steam_err_getplayer'			=> "Error: Failed response from Steam Servers, GetPlayer",
		'steam_err_getrecent'			=> "Error: Failed response from Steam Servers, GetRecentGames",
		'steam_err_getowned'			=> "Error: Failed response from Steam Servers, GetOwnedGames",
		'steam_err_getbadges'			=> "Error: Failed response from Steam Servers, GetBadges",
		'steam_err_noapi'				=> "Error: API Key Missing",
		'steam_err'						=> "Error",
		'steam_remove'					=> "Clear Cache",
		'steam_update'					=> "Update",
		'steam_disable'					=> "Disable",
		'steam_enable'					=> "Enable",
		'steam_menu'					=> "Options",
		'steam_validate'				=> "Validate SteamID",
		'steam_disabled'				=> "Account Disabled",
		'steam_err_disabled'			=> "Error: Failed to disable account",
		'steam_enabled'					=> "Account Enabled",
		'steam_err_enabled'				=> "Error: Failed to enable account",
		'steam_validated'				=> "SteamID Valid",
		'steam_err_validated'			=> "Steam ID Invalid",
		'steam_removed'					=> "Profile Cache cleared",
		'steam_err_removed'				=> "Error: Failed to clear local cache",
		'steam_updated'					=> "Steam Profile cache updated",
		'steam_err_updated'				=> "Error: Cache update failed",
		'steam_wait'					=> "Profile has been updated in last 5 minutes, please wait",
		'steam_member_updated'			=> "Profile Updated",
		'steam_member_removed'			=> "Profile Data Removed",
		'steam_member_restricted'		=> "Steam Profile data removed, account restricted",
		'steam_member_unrestricted'		=> "Steam Profile data updated, account unrestricted",
		'steam_field_invalid'			=> "No Custom Field or Steam Login available",
		'steam_general'					=> "Steam Profile Error",
		'steam_input_bad'				=> "Invalid count value",
		'steam_admin_batch'				=> "How many users to process at a time",
		'steam_multi_update'			=> "Update",
		'steam_multi_cleanup'			=> "Cleanup",
		'steam_admin_batch_type'		=> "Update or Cleanup local cache",
		'steam_update_running'			=> "Building Local Steam Cache... Please wait",
		'steam_cleanup_running'			=> "Cleaning Local Steam Cache... Please wait",
		'steam_update_complete'			=> "Local Steam Cache update Complete",
		'steam_cleanup_complete'		=> "Local Steam Cache cleanup Complete",
		'steam_title_update'			=> "Updating",
		'steam_title_cleanup'			=> "Cleaning up",
		'steam_recent'					=> "Recently Played Games",
		'steam_of'						=> "of",
		'steam_exp_update_profile'		=> "Update Profile Data Failed",
		'steam_empty'					=> "Steam Profile Empty",
		'st_member_id'					=> "Member ID",
		'st_members_seo_name'			=> "Member Name",
		'st_steamid'					=> "Steam ID",
		'st_personaname'				=> "Steam Name",
		'st_last_update'				=> "Last Update",
		'st_timecreated'				=> "Time Created",
		'st_lastlogoff'					=> "Last Logoff",
		'st_vac_status'					=> "VAC Ban?",
		'st_communityvisibilitystate'	=> "Profile",
		'st_game_count'					=> "Games Owned",
		'st_personastate'				=> "Status",
		'st_playtime_2weeks'			=> "Playtime 2 weeks (hrs)",
		'st_restricted'					=> "Disabled?",
		'st_error'						=> "Error",
		'steam_no'						=> "No",
		'steam_yes'						=> "Yes",
		'steam_banned'					=> "Banned",
		'steam_public'					=> "Public",
		'steam_private'					=> "Private",
		'steam_default_tab'				=> "Make Steam the default Profile Tab?",
		'r__manage'						=> "Manage",
		'r__settings'					=> "Settings",
		'r__view'						=> "View Profiles",
		'r__steam_manage'				=> "Can manually Update / Cleanup",
		'r__steam_settings'				=> "Can Edit Steam Settings",
		'r__steam_view'					=> "Can View Profile Table",
		'steam_filters_vacban'			=> "VAC Banned",
		'steam_filters_error'			=> "Errors",
		'steam_filters_disabled'		=> "Disabled",
		'steam_filters_active'			=> "Active Users",
		'name'							=> "User Name",
		'steam_comm_groups'             => "Steam Groups",
		'steam_comm_groups_desc'        => "64 Bit ID or steamcommunity.com/groups/{name}",
		'steam__mem_groups'             => "Steam Community Group Settings",
		'block_steamGroupWidget'        => "Steam Group",
		'block_steamGroupWidget_desc'   => "Show basic Steam Group information",
		'steamLimit'                    => "Number of Lines in Description",
		'steamUserCount'                => "Number of users to display",
		'steamGroup'                    => "Group to display",
		'st_joinGroup'                  => "Join Group",
		'st_joinChat'                   => "Join Chat",
		'st_online'                     => "Online",
		'st_inChat'                     => "In-Chat",
		'st_inGame'                     => "In-Game",
		'st_members'                    => "Members",

);