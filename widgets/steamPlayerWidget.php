<?php
/**
 * @brief            steamPlayerWidget Widget
 * @author           <a href='http://www.invisionpower.com'>Invision Power Services, Inc.</a>
 * @copyright    (c) 2001 - SVN_YYYY Invision Power Services, Inc.
 * @license          http://www.invisionpower.com/legal/standards/
 * @package          IPS Social Suite
 * @subpackage       steam
 * @since            19 Mar 2016
 * @version          SVN_VERSION_NUMBER
 */

namespace IPS\steam\widgets;

/* To prevent PHP errors (extending class does not exist) revealing path */

use IPS\Helpers\Form;
use IPS\Widget\StaticCache;
use IPS\Theme;
use IPS\Db;
use IPS\steam\Profile;

if (!defined('\IPS\SUITE_UNIQUE_KEY')) {
    header(($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.0') . ' 403 Forbidden');
    exit;
}

/**
 * steamPlayerWidget Widget
 */
class _steamPlayerWidget extends StaticCache
{
    /**
     * @brief    Widget Key
     */
    public $key = 'steamPlayerWidget';

    /**
     * @brief    App
     */
    public $app = 'steam';

    /**
     * @brief    Plugin
     */
    public $plugin = '';

    /**
     * Initialise this widget
     * @return void
     */
    public function init()
    {
        $this->template(array(Theme::i()->getTemplate('widgets', $this->app, 'front'), $this->key));

        if (!isset($this->configuration['steamIndexCount'])) {
            $this->configuration['steamIndexCount'] = 5;
        }
        if (!isset($this->configuration['steamIndex2weeks'])) {
            $this->configuration['steamIndex2weeks'] = true;
        }

        parent::init();
    }

    /**
     * Specify widget configuration
     * @param null|\IPS\Helpers\Form $form Form object
     * @return    null|\IPS\Helpers\Form
     */
    public function configuration(&$form = null)
    {
        if ($form === null) {
            $form = new Form;
        }

        $form->add(new Form\Number('steamIndexCount', $this->configuration['steamIndexCount'] ?? 5, true));
        $form->add(new Form\YesNo('steamIndex2weeks', $this->configuration['steamIndex2weeks'] ?? true));

        return $form;
    }

    /**
     * Ran before saving widget configuration
     * @param array $values Values from form
     * @return    array
     */
    public function preConfig($values)
    {
        return $values;
    }

    /**
     * Render a widget
     * @return    string
     */
    public function render()
    {
        /* select steam.* from steam_profiles INNER JOIN core_members where m.member_id = steam.st_memberid AND steam.steamid<>'' AND steam.st_personastate > 0 INNER JOIN core_groups where m.member_group_id = g.id OR g.id IN( m.mgroup_others ) AND g.steam_index=1 ORDER RAND() LIMIT 0,$this->configuration['steamIndexCount']; */
        $members = array();
        $select = 's.*';
        // ON
        $mJoin = 'm.member_id = s.st_member_id';
        $gJoin = '(g.g_id = m.member_group_id OR g.g_id IN(m.mgroup_others))';
        // WHERE
        $gJoin .= " WHERE g.steam_index=1 && g.steam_pull=1 && s.st_steamid<>'' AND s.st_personastate > 0 AND s.st_communityvisibilitystate != 1";
        $limit = array(0, $this->configuration['steamIndexCount'] ?? 5);

        $query = Db::i()->select($select, array('steam_profiles', 's'), null, 'RAND()', $limit, null, null, '011')
            ->join(array('core_members', 'm'), $mJoin, 'LEFT')
            ->join(array('core_groups', 'g'), $gJoin, 'LEFT');


        foreach ($query as $id => $row) {
            if (isset($row['st_games'])) {
                $temp = json_decode($row['st_games'], true);
                while (\count($temp) > 6) {
                    $yoink = \array_pop($temp);
                }
                $row['st_games'] = json_encode($temp);
                unset($temp);
            }

            /* Build the Steam Profile Object for each member */
            $members[] = Profile::constructFromData($row);

        }

        return $this->output($members, $this->configuration);
        // Use $this->output( $foo, $bar ); to return a string generated by the template set in init() or manually added via $widget->template( $callback );
        // Note you MUST route output through $this->output() rather than calling \IPS\Theme::i()->getTemplate() because of the way widgets are cached
    }
}