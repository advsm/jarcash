<?php

class Debug_ControllerPlugin_Database extends ZFDebug_Controller_Plugin_Debug_Plugin_Database
{
    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        if (!$this->_db)
            return '';

        $html = '<h4>Database queries</h4>';
        if (Zend_Db_Table_Abstract::getDefaultMetadataCache ()) {
            $html .= 'Metadata cache is ENABLED';
        } else {
            $html .= 'Metadata cache is DISABLED';
        }

        foreach ($this->_db as $adapter) {
            $profiler = $adapter->getProfiler();
            if ($profiles = $profiler->getQueryProfiles()) {
                $html .= '<h4>Adapter '.get_class($adapter).'</h4>
                <p>Total queryes: ' . $profiler->getTotalNumQueries() . '</p>
                <p>Total time: ' . round($profiler->getTotalElapsedSecs()) . ' sec</p><ol>';
                foreach ($profiles as $profile) {
                	$params = $profile->getQueryParams();
                	$color = isset($params['color']) ? $params['color'] : 'black';
                	$rowCount = isset($params['rowCount']) ? $params['rowCount'] : '';
                    $html .= '
                    <li>
                    	<strong style="color:' . $color . ';">
                    		['.round($profile->getElapsedSecs(), 3).' sec]
                    	</strong> '
                        . htmlspecialchars($profile->getQuery()) . 
                        ($rowCount ? " || $rowCount rows" : '') . '
                    </li>';
                    // <p style="display:none;"><b>[+]</b> ' . implode('<br /><b>[+]</b> ', $params['trace']) . '</p>
                }
                $html .= '</ol>';
            }
        }

        return $html;
    }

}