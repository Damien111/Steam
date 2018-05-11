<?php


namespace IPS\steam\setup\upg_working;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * {version_human} Upgrade Code
 */
class _Upgrade
{
	/**
	 * ...
	 * @copyright Lavoaster github.com/Lavoaster/
     * @license http://opensource.org/licenses/mit-license.php The MIT License
	 * @return	array|bool	If returns TRUE, upgrader will proceed to next step. If it returns any other value, it will set this as the value of the 'extra' GET parameter and rerun this step (useful for loops)
	 */
	public function step1()
	{
        if (!\IPS\Db::i()->checkForColumn('core_members', 'steamid')) {
            \IPS\Db::i()->addColumn('core_members', [
                'name' => 'steamid',
                'type' => 'VARCHAR',
                'length' => 17
            ]);
        }

        if (!\IPS\Db::i()->checkForIndex('core_members', 'steamid')) {
            \IPS\Db::i()->addIndex('core_members', array(
                'name' => 'steamid',
                'type' => 'key',
                'columns' => array('steamid')
            ));
        }

        try {
            \IPS\Db::i()->select('login_key', 'core_login_methods', array('login_classname=?', 'IPS\Login\Steam'))->first();
            \IPS\Db::i()->delete( 'core_login_methods', array('login_classname=?', 'IPS\Login\Steam'));
        } catch (\UnderflowException $e) {
            // Do nothing, we're creating a new login handler no matter what, and removing the old Sign in.
        }

        $maxLoginOrder = \IPS\Db::i()->select('MAX(login_order)', 'core_login_methods')->first();

        \IPS\Db::i()->insert('core_login_methods', array(
            'login_settings' => '{"steam_apikey":"","use_steam_name":true}',
            'login_classname' => 'IPS\steam\Login\Steam',
            'login_enabled' => 1,
            'login_order' => $maxLoginOrder + 1,
            'login_register' => 1,
            'login_acp' => 0
        ));

        return TRUE;
	}
	
	// You can create as many additional methods (step2, step3, etc.) as is necessary.
	// Each step will be executed in a new HTTP request
}