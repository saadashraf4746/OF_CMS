<?php

class Common_model extends CI_Model
{
  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getSeason($seasonId)
    {
        $query = $this->db->query("SELECT `season` FROM `seasons` WHERE id = '$seasonId' ");
        return $query->row()->season;
    }

    function insertion($tableName,$data)
    {
        $this->db->insert($tableName,$data);
        return $this->db->insert_id();
    }
    
    function DO_GLOBAL_DELETE($table, $data, $delete__id)
    {
        $this->db->where('id', $delete__id);
        $this->db->update( $table, $data );
        return TRUE;
    }

    function getRecord($id, $table)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE `id` = $id ");
        return $query->row(); 
    }

    function updateRecord($data, $table, $id)
    {
        $this->db->where('id', $id);
        $this->db->update( $table, $data );
        return TRUE;   
    }

    function getPayment($seasonId, $paymentOfId, $paymentOf)
    {
        $query = $this->db->query("SELECT * FROM `factory_payments` WHERE `seasonId` = '$seasonId' AND `paymentOfId` = '$paymentOfId' AND `paymentOf` = '$paymentOf' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();

    }

    function getTotalPurchaseAmount($seasonId, $supplierId)
    {
        $query = $this->db->query("SELECT SUM(totalAmount) as totalPurchaseAmount FROM `purchases` WHERE `seasonId` = '$seasonId' AND `supplierId` = '$supplierId' AND `status` = 1 ");
        return $query->row()->totalPurchaseAmount; 
    }

    function getTotalPaidAmount($seasonId, $paymentOfId, $paymentOf)
    {
        $query = $this->db->query("SELECT SUM(amount) as totalPaidAmount FROM `factory_payments` WHERE `seasonId` = '$seasonId' AND `paymentOfId` = '$paymentOfId' AND `paymentOf` = '$paymentOf' AND `status` = 1 ");
        return $query->row()->totalPaidAmount; 
    }

    

}