<?php

class Db_Profiler extends Zend_Db_Profiler
{
    /**
     * Ends a query.  Pass it the handle that was returned by queryStart().
     * This will mark the query as ended and save the time.
     * 
     * 
     *
     * @param  integer $queryId
     * @param Db_Statement $stmt Executed query statement
     * @throws Zend_Db_Profiler_Exception
     * @return void
     */
    public function queryEnd($queryId, $stmt = null)
    {
    	if (self::IGNORED == parent::queryEnd($queryId)) {
    		return self::IGNORED;
    	}
    	
    	$backtrace = debug_backtrace();
        $stack = Debug_TraceHelper::getShortStacktrace($backtrace);
        
        // Bind trace
        $profile = $this->getLastQueryProfile();
        $profile->bindParam('trace', $stack);
        
        // Bind warn level base on query time
        $elapsed = $profile->getElapsedSecs();
        $color = '';
        if ($elapsed > 0.1) {
        	$color = 'blue';
        } elseif ($elapsed > 0.9) {
        	$color = 'red';
        }
        
        $profile->bindParam('color', $color);
        
        // Query result count rows
        if ($stmt instanceof Db_Statement) {
        	$profile->bindParam('rowCount', $stmt->rowCount());
        }
        
        
        // Query error
        
        
    }
}
