<?php

/**
 * Generated Model class.
 */
class Base_Midlet2subaccRow extends Db_Row
{

    /**
     * Set new value for midlet2subacc.id column in current Row.
     * 
     * @param int $IdFromMidlet2subaccRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return midlet2subacc.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for midlet2subacc.subacc_id column in current Row.
     * 
     * @param int $SubaccIdFromMidlet2subaccRow
     * @return void
     */
    public function setSubaccId($SubaccId)
    {
        $this->__set("subacc_id", $SubaccId);
    }

    /**
     * Return midlet2subacc.subacc_id column value in current Row.
     * 
     * @return int
     */
    public function getSubaccId()
    {
        return $this->__get("subacc_id");
    }

    /**
     * Return parent row from table subacc where midlet2subacc.subacc_id = subacc.id
     * 
     * @param Db_Select $selectFromSubacc
     * @return SubaccRow
     */
    public function getSubaccRowBySubaccId($select = null)
    {
        return $this->findParentRow('SubaccPeer', null, $select);
    }

    /**
     * Set new value for midlet2subacc.midlet_id column in current Row.
     * 
     * @param int $MidletIdFromMidlet2subaccRow
     * @return void
     */
    public function setMidletId($MidletId)
    {
        $this->__set("midlet_id", $MidletId);
    }

    /**
     * Return midlet2subacc.midlet_id column value in current Row.
     * 
     * @return int
     */
    public function getMidletId()
    {
        return $this->__get("midlet_id");
    }

    /**
     * Return parent row from table midlet where midlet2subacc.midlet_id = midlet.id
     * 
     * @param Db_Select $selectFromMidlet
     * @return MidletRow
     */
    public function getMidletRowByMidletId($select = null)
    {
        return $this->findParentRow('MidletPeer', null, $select);
    }

    /**
     * Set new value for midlet2subacc.internal_jar column in current Row.
     * 
     * @param varchar $InternalJarFromMidlet2subaccRow
     * @return void
     */
    public function setInternalJar($InternalJar)
    {
        $this->__set("internal_jar", $InternalJar);
    }

    /**
     * Return midlet2subacc.internal_jar column value in current Row.
     * 
     * @return varchar
     */
    public function getInternalJar()
    {
        return $this->__get("internal_jar");
    }


}

