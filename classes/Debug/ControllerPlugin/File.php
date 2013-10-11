<?php

class Debug_ControllerPlugin_File extends ZFDebug_Controller_Plugin_Debug_Plugin_File 
{
    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        $included = $this->_getIncludedFiles();
        $html = '<h4>File Information</h4>';
        $html .= count($included).' Files Included<br />';
        $size = 0;
        foreach ($included as $file) {
            $size += filesize($file);
        }
        $html .= 'Total Size: '. round($size/1024, 1).'K<br />';
        
        $html .= 'Basepath: ' . $this->_basePath . '<br />';

//        $libraryFiles = array();
//        foreach ($this->_library as $key => $value) {
//            if ('' != $value) {
//                $libraryFiles[$key] = '<h4>' . $value . ' Library Files</h4>';
//            }
//        }
//
//        $baseUrl = u(array(
//	        'controller' => 'file', 
//	        'action' => 'view',
//	        'module' => 'admin',
//	    ), null, true);
//        $html .= '<h4>Application Files</h4>';
//        foreach ($included as $file) {
//            $file = str_replace($this->_basePath, '', $file);
//            $inUserLib = false;
//        	foreach ($this->_library as $key => $library)
//        	{
//        		if('' != $library && false !== strstr($file, $library)) {
//	        		$url = $baseUrl . '?file=' . base64_encode($file);
//        			$libraryFiles[$key] .= "<a target='_blank' href='$url'>$file</a><br />";
//        			$inUserLib = TRUE;
//        		}
//        	}
//        	if (!$inUserLib) {
//        		$url = $baseUrl . '?file=' . base64_encode($file);
//    			$html .= "<a target='_blank' href='$url'>$file</a><br />";
//        	}
//        }
//
//    	$html .= implode('', $libraryFiles);

        return $html;
    }
}