<?php

class Db_Statement extends Zend_Db_Statement_Pdo
{
    /**
     * Executes a prepared statement.
     * Adding executed statement to profile.
     * Also adding last query to Db class.
     *
     * @param array $params OPTIONAL Values to bind to parameter placeholders.
     * @return bool
     */
    public function execute(array $params = null)
    {
    	Db::getInstance()->setLastQuery(array(
    		'query' => $this->_stmt->queryString,
    		'params' => $params
    	));

        /*
         * Simple case - no query profiler to manage.
         */
        if ($this->_queryId === null) {
            return $this->_execute($params);
        }

        /*
         * Do the same thing, but with query profiler
         * management before and after the execute.
         */
        $prof = $this->_adapter->getProfiler();
        $qp = $prof->getQueryProfile($this->_queryId);
        if ($qp->hasEnded()) {
            $this->_queryId = $prof->queryClone($qp);
            $qp = $prof->getQueryProfile($this->_queryId);
        }
        if ($params !== null) {
            $qp->bindParams($params);
        } else {
            $qp->bindParams($this->_bindParam);
        }
        $qp->start($this->_queryId);

        $retval = $this->_execute($params);

        // Edited parent method only there. Adding self object to profile.
        $prof->queryEnd($this->_queryId, $this);

        return $retval;
    }



	/**
	 * Return Profiler queryId for check it from Profile
	 *
	 * @return integer
	 */
	public function getQueryId()
	{
		return $this->_queryId;
	}
}