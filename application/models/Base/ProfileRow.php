<?php

/**
 * Generated Model class.
 */
class Base_ProfileRow extends Db_Row
{

    /**
     * Set new value for profile.id column in current Row.
     * 
     * @param int $IdFromProfileRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return profile.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for profile.login column in current Row.
     * 
     * @param varchar $LoginFromProfileRow
     * @return void
     */
    public function setLogin($Login)
    {
        $this->__set("login", $Login);
    }

    /**
     * Return profile.login column value in current Row.
     * 
     * @return varchar
     */
    public function getLogin()
    {
        return $this->__get("login");
    }

    /**
     * Set new value for profile.email column in current Row.
     * 
     * @param varchar $EmailFromProfileRow
     * @return void
     */
    public function setEmail($Email)
    {
        $this->__set("email", $Email);
    }

    /**
     * Return profile.email column value in current Row.
     * 
     * @return varchar
     */
    public function getEmail()
    {
        return $this->__get("email");
    }

    /**
     * Set new value for profile.password column in current Row.
     * 
     * @param varchar $PasswordFromProfileRow
     * @return void
     */
    public function setPassword($Password)
    {
        $this->__set("password", $Password);
    }

    /**
     * Return profile.password column value in current Row.
     * 
     * @return varchar
     */
    public function getPassword()
    {
        return $this->__get("password");
    }

    /**
     * Set new value for profile.activated column in current Row.
     * 
     * @param tinyint $ActivatedFromProfileRow
     * @return void
     */
    public function setActivated($Activated)
    {
        $this->__set("activated", $Activated);
    }

    /**
     * Return profile.activated column value in current Row.
     * 
     * @return tinyint
     */
    public function getActivated()
    {
        return $this->__get("activated");
    }

    /**
     * Set new value for profile.percent column in current Row.
     * 
     * @param tinyint $PercentFromProfileRow
     * @return void
     */
    public function setPercent($Percent)
    {
        $this->__set("percent", $Percent);
    }

    /**
     * Return profile.percent column value in current Row.
     * 
     * @return tinyint
     */
    public function getPercent()
    {
        return $this->__get("percent");
    }

    /**
     * Set new value for profile.icq column in current Row.
     * 
     * @param varchar $IcqFromProfileRow
     * @return void
     */
    public function setIcq($Icq)
    {
        $this->__set("icq", $Icq);
    }

    /**
     * Return profile.icq column value in current Row.
     * 
     * @return varchar
     */
    public function getIcq()
    {
        return $this->__get("icq");
    }

    /**
     * Set new value for profile.wallet_id column in current Row.
     * 
     * @param int $WalletIdFromProfileRow
     * @return void
     */
    public function setWalletId($WalletId)
    {
        $this->__set("wallet_id", $WalletId);
    }

    /**
     * Return profile.wallet_id column value in current Row.
     * 
     * @return int
     */
    public function getWalletId()
    {
        return $this->__get("wallet_id");
    }

    /**
     * Return parent row from table profile_wallet where profile.wallet_id =
     * profile_wallet.id
     * 
     * @param Db_Select $selectFromProfileWallet
     * @return ProfileWalletRow
     */
    public function getProfileWalletRowByWalletId($select = null)
    {
        return $this->findParentRow('ProfileWalletPeer', null, $select);
    }

    /**
     * Set new value for profile.subacc_id column in current Row.
     * 
     * @param int $SubaccIdFromProfileRow
     * @return void
     */
    public function setSubaccId($SubaccId)
    {
        $this->__set("subacc_id", $SubaccId);
    }

    /**
     * Return profile.subacc_id column value in current Row.
     * 
     * @return int
     */
    public function getSubaccId()
    {
        return $this->__get("subacc_id");
    }

    /**
     * Return parent row from table subacc where profile.subacc_id = subacc.id
     * 
     * @param Db_Select $selectFromSubacc
     * @return SubaccRow
     */
    public function getSubaccRowBySubaccId($select = null)
    {
        return $this->findParentRow('SubaccPeer', null, $select);
    }

    /**
     * Set new value for profile.webmoney_number column in current Row.
     * 
     * @param varchar $WebmoneyNumberFromProfileRow
     * @return void
     */
    public function setWebmoneyNumber($WebmoneyNumber)
    {
        $this->__set("webmoney_number", $WebmoneyNumber);
    }

    /**
     * Return profile.webmoney_number column value in current Row.
     * 
     * @return varchar
     */
    public function getWebmoneyNumber()
    {
        return $this->__get("webmoney_number");
    }

    /**
     * Return dependent rowset from table Midlet where Midlet.ProfileId reference to
     * profile table
     * 
     * @param Db_Select $select FromMidlet
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getMidletRowsetByProfileId($select = null)
    {
        return $this->findDependentRowset('MidletPeer', null, $select);
    }

    /**
     * Return dependent rowset from table ProfilePayment where ProfilePayment.ProfileId
     * reference to profile table
     * 
     * @param Db_Select $select FromProfilePayment
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getProfilePaymentRowsetByProfileId($select = null)
    {
        return $this->findDependentRowset('ProfilePaymentPeer', null, $select);
    }

    /**
     * Return dependent rowset from table StatisticDownload where
     * StatisticDownload.ProfileId reference to profile table
     * 
     * @param Db_Select $select FromStatisticDownload
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getStatisticDownloadRowsetByProfileId($select = null)
    {
        return $this->findDependentRowset('StatisticDownloadPeer', null, $select);
    }

    /**
     * Return dependent rowset from table Subacc where Subacc.ProfileId reference to
     * profile table
     * 
     * @param Db_Select $select FromSubacc
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getSubaccRowsetByProfileId($select = null)
    {
        return $this->findDependentRowset('SubaccPeer', null, $select);
    }

    /**
     * Return dependent rowset from table Ticket where Ticket.ProfileId reference to
     * profile table
     * 
     * @param Db_Select $select FromTicket
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getTicketRowsetByProfileId($select = null)
    {
        return $this->findDependentRowset('TicketPeer', null, $select);
    }

    /**
     * Return dependent rowset from table TicketMessage where
     * TicketMessage.FromProfileId reference to profile table
     * 
     * @param Db_Select $select FromTicketMessage
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getTicketMessageRowsetByFromProfileId($select = null)
    {
        return $this->findDependentRowset('TicketMessagePeer', null, $select);
    }

    /**
     * Return dependent rowset from table TicketMessage where TicketMessage.ToProfileId
     * reference to profile table
     * 
     * @param Db_Select $select FromTicketMessage
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getTicketMessageRowsetByToProfileId($select = null)
    {
        return $this->findDependentRowset('TicketMessagePeer', null, $select);
    }


}

