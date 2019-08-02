<?php
/**
 * @brief            steamGroupWidget Widget
 * @author           <a href='https://www.invisioncommunity.com'>Invision Power Services, Inc.</a>
 * @copyright    (c) Invision Power Services, Inc.
 * @license          https://www.invisioncommunity.com/legal/standards/
 * @package          Invision Community
 * @subpackage       steam
 * @since            25 Jul 2017
 */

namespace IPS\steam\widgets;

/* To prevent PHP errors (extending class does not exist) revealing path */
if (!defined('\IPS\SUITE_UNIQUE_KEY')) {
    header((isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0') . ' 403 Forbidden');
    exit;
}

/**
 * steamGroupWidget Widget
 */
class _steamGroupWidget extends \IPS\Widget\StaticCache
{
    /**
     * @brief    Widget Key
     */
    public $key = 'steamGroupWidget';

    /**
     * @brief    App
     */
    public $app = 'steam';

    /**
     * @brief    Plugin
     */
    public $plugin = '';

    public function __construct($uniqueKey, array $configuration, $access = null, $orientation = null)
    {
        // Must overload __construct in order to get the orientation.  If I don't get it now
        // I won't have it available when I need it late.
        $this->orientation = $orientation;
        parent::__construct($uniqueKey, $configuration, $access, $orientation);
    }

    /**
     * Initialise this widget
     * @return void
     */
    public function init()
    {
        $this->template(array(\IPS\Theme::i()->getTemplate('widgets', $this->app, 'front'), $this->key));

        if (!isset($this->configuration['steamDescription'])) {
            $this->configuration['steamDescription'] = true;
        }
        if (!isset($this->configuration['steamShowMembers'])) {
            $this->configuration['steamShowMembers'] = true;
        }
        if (!isset($this->configuration['steamGroup'])) {
            $this->configuration['steamGroup'] = null;
        }
        if (!isset($this->configuration['steamLimit'])) {
            $this->configuration['steamLimit'] = 10;
        }
        if (!isset($this->configuration['steamUserCount'])) {
            $this->configuration['steamUserCount'] = 10;
        }
        \IPS\Output::i()->cssFiles = array_merge(\IPS\Output::i()->cssFiles,
            \IPS\Theme::i()->css('widget.css', 'steam', 'front'));

        parent::init();
    }

    /**
     * Specify widget configuration
     * @param null|\IPS\Helpers\Form $form Form object
     * @return    null|\IPS\Helpers\Form
     */
    public function configuration(&$form = null)
    {
        // steamGroup $defaults
        if ($form === null) {
            $form = new \IPS\Helpers\Form;
        }
        $select = "g.stg_url,g.stg_name";
        $where = "";
        $query = \IPS\Db::i()->select($select, array('steam_groups', 'g'), $where);
        $options = array();
        foreach ($query as $row) {
            $options[$row['stg_url']] = $row['stg_name'];
        }

        $defaults = array(
            'options'  => $options,
            'multiple' => false,
        );

        // steamShowMembers $options
        $options = array(
            'togglesOn' => array('steamLimit', 'steamUserCount'),
        );

        $form->add(new \IPS\Helpers\Form\Select('steamGroup',
            isset($this->configuration['steamGroup']) ? $this->configuration['steamGroup'] : null, false, $defaults,
            null, null, null, 'steamGroup'));
        $form->add(new \IPS\Helpers\Form\YesNo('steamDescription',
            isset($this->configuration['steamDescription']) ? $this->configuration['steamDescription'] : true, false,
            array(), null, null, null, 'steamDescription'));
        $form->add(new \IPS\Helpers\Form\YesNo('steamShowMembers',
            isset($this->configuration['steamShowMembers']) ? $this->configuration['steamShowMembers'] : null, false,
            $options, null, null, null, 'steamShowMembers'));
        $form->add(new \IPS\Helpers\Form\Text('steamLimit',
            isset($this->configuration['steamLimit']) ? $this->configuration['steamLimit'] : '10', false, array(), null,
            null, null, 'steamLimit'));
        $form->add(new \IPS\Helpers\Form\Text('steamUserCount',
            isset($this->configuration['steamUserCount']) ? $this->configuration['steamUserCount'] : '10', false,
            array(), null, null, null, 'steamUserCount'));

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
        $group = array();
        $profiles = array();
        if ($this->configuration['steamGroup']) {
            $group = \IPS\steam\Profile\Groups::load($this->configuration['steamGroup'], 'stg_url');

            if (isset($group->id) && !empty($group->id)) {
                $members = new \IPS\Patterns\ActiveRecordIterator(
                    \IPS\Db::i()->select('*', 'steam_profiles',
                        array("st_player_groups LIKE '%" . $group->id . "%'"), "RAND()",
                        $this->configuration['steamLimit']),
                    'IPS\steam\Profile');

                $profiles = iterator_to_array($members);
            }
            $group->summary = strip_tags($group->summary, '<a><br /><br/><br>');

        } else {
            return "";
        }
        if ($this->orientation === 'vertical') {
            $vert = true;
        } else {
            $vert = false;
        }

        return $this->output($group, $profiles, $this->configuration, $vert);
    }
}