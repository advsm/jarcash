<?php

/**
 * Generated Model class.
 */
class Base_ProfileWalletRow extends Db_Row
{

    /**
     * Set new value for profile_wallet.id column in current Row.
     * 
     * @param int $IdFromProfileWalletRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return profile_wallet.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for profile_wallet.amount column in current Row.
     * 
     * @param float $AmountFromProfileWalletRow
     * @return void
     */
    public function setAmount($Amount)
    {
        $this->__set("amount", $Amount);
    }

    /**
     * Return profile_wallet.amount column value in current Row.
     * 
     * @return float
     */
    public function getAmount()
    {
        return $this->__get("amount");
    }

    /**
     * Set new value for profile_wallet.modified column in current Row.
     * 
     * @param timestamp $ModifiedFromProfileWalletRow
     * @return void
     */
    public function setModified($Modified)
    {
        $this->__set("modified", $Modified);
    }

    /**
     * Return profile_wallet.modified column value in current Row.
     * 
     * @return timestamp
     */
    public function getModified()
    {
        return $this->__get("modified");
    }

    /**
     * Set new value for profile_wallet.profit column in current Row.
     * 
     * @param float $ProfitFromProfileWalletRow
     * @return void
     */
    public function setProfit($Profit)
    {
        $this->__set("profit", $Profit);
    }

    /**
     * Return profile_wallet.profit column value in current Row.
     * 
     * @return float
     */
    public function getProfit()
    {
        return $this->__get("profit");
    }

    /**
     * Return dependent rowset from table Profile where Profile.WalletId reference to
     * profile_wallet table
     * 
     * @param Db_Select $select FromProfile
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getProfileRowsetByWalletId($select = null)
    {
        return $this->findDependentRowset('ProfilePeer', null, $select);
    }


}

