<?php
/**
 * @brief            steamprofile Task
 * @author           <a href='http://www.invisionpower.com'>Invision Power Services, Inc.</a>
 * @copyright    (c) 2001 - SVN_YYYY Invision Power Services, Inc.
 * @license          http://www.invisionpower.com/legal/standards/
 * @package          IPS Social Suite
 * @subpackage       steam
 * @since            19 Oct 2015
 * @version          SVN_VERSION_NUMBER
 */

namespace IPS\steam\tasks;

/* To prevent PHP errors (extending class does not exist) revealing path */
if (!defined('\IPS\SUITE_UNIQUE_KEY')) {
    header((isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0') . ' 403 Forbidden');
    exit;
}


/**
 * steamprofile Task
 */
class _steamProfile extends \IPS\Task
{
    /**
     * Execute
     * If ran successfully, should return anything worth logging. Only log something
     * worth mentioning (don't log "task ran successfully"). Return NULL (actual NULL, not '' or 0) to not log (which
     * will be most cases). If an error occurs which means the task could not finish running, throw an
     * \IPS\Task\Exception - do not log an error as a normal log. Tasks should execute within the time of a normal HTTP
     * request.
     * @return    mixed    Message to log or NULL
     * @throws    \IPS\Task\Exception
     */
    public function execute()
    {
        if (!\IPS\Application::appIsEnabled('steam')) {
            return null;
        }

        if (!isset($_SERVER['REQUEST_METHOD'])) {
            $_SERVER['REQUEST_METHOD'] = "POST";
        }
        try {
            $steam = new \IPS\steam\Update;
            $steam->updateProfile();

        } catch (\Exception $e) {
            throw new \IPS\Task\Exception($this, $e);

        }

        \IPS\Widget::deleteCaches('steamPlayerWidget', 'steam');

        return null;
    }

    /**
     * Cleanup
     * If your task takes longer than 15 minutes to run, this method
     * will be called before execute(). Use it to clean up anything which
     * may not have been done
     * @return    void
     */
    public function cleanup()
    {
    }
}
