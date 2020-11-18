<?php

class Factory_model extends CI_Model
{
  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        //VARIABLES
        $this->season = $this->session->userdata('season-id');
    }

    function getSuppliers()
    {
        $query = $this->db->query("SELECT * FROM `suppliers` WHERE seasonId = '$this->season' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getCustomers($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `customers` WHERE seasonId = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getSeasonPurchasesStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT SUM(totalAmount) FROM `purchases` WHERE `seasonId` = '$seasonId' AND `status` = 1 ) as seasonTotalPurchases,
            (SELECT SUM(amount) FROM `factory_payments` WHERE (`paymentOf` = 1 OR `paymentOf` = 2) AND `seasonId` = '$seasonId' AND `status` = 1 ) as seasonTotalPaid,
            (SELECT COUNT(*) FROM `suppliers` WHERE `seasonId` = '$seasonId' AND `status` = 1 ) as totalSuppliers ");
        return $query->row();
    }

    function gardenList($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `garden_purchasing` WHERE seasonId = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getPurchasesList($seasonId, $type, $supplierId="")
    {
        if($type == 'overall')
        {
            $query = $this->db->query("SELECT * FROM `purchases` WHERE `seasonId` = $seasonId AND `status` = 1 ORDER BY id DESC ");
        }
        else
        {
            $query = $this->db->query("SELECT * FROM `purchases` WHERE `seasonId` = $seasonId AND `supplierId` = $supplierId AND `status` = 1 ORDER BY id DESC ");
        }
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getKinowPurchasesList($seasonId)
    {
        $query = $this->db->query("SELECT 
            g.landlordName,
            g.gardenLocation,
            g.purchaseAmount,
            g.isCompleted,
            kp.gardenId,
            SUM(kp.quantityInMaan) as totalQuantityInMaan,
            SUM(kp.categoryAQuanity) as totalACategory,
            SUM(kp.categoryBQuantity) as totalBCategory,
            SUM(kp.totalPrice) as totalPrice
            FROM garden_purchasing g JOIN kinow_purchasing kp ON kp.seasonId = '$seasonId' AND kp.gardenId = g.id AND kp.status = 1 GROUP BY kp.gardenId");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getKinowPurchasesByGarden($gardenId)
    {
        $query = $this->db->query("SELECT 
            g.landlordName,
            g.gardenLocation,
            g.purchaseAmount,
            g.isCompleted,
            g.status,
            kp.gardenId,
            SUM(kp.quantityInMaan) as totalQuantityInMaan,
            SUM(kp.categoryAQuanity) as totalACategory,
            SUM(kp.categoryBQuantity) as totalBCategory,
            SUM(kp.totalPrice) as totalPrice
            FROM garden_purchasing g JOIN kinow_purchasing kp ON kp.gardenId = '$gardenId' AND kp.gardenId = g.id AND kp.status = 1 GROUP BY kp.gardenId");
        return $query->row();
    }

    function getKinowPurchases($gardenId)
    {
        $query = $this->db->query("SELECT * FROM `kinow_purchasing` WHERE `gardenId` =  '$gardenId' AND status = 1 ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getTotalItems($seasonId)
    {
        $query = $this->db->query("SELECT 
            SUM(charPathiQuantity)  as totalCharPathi,
            SUM(panchPathiQuantity) as totalPanchPathi,
            SUM(sheyPathiQuantity)  as totalSheyPathi,
            SUM(radiQuantity)  as totalRadi,
            SUM(keelQuantity)  as totalKeel,
            SUM(stickerQuantity)  as totalSticker,
            SUM(doPlySheetQuantity)  as totalDoPlySheet,
            SUM(teenPlySheetQuantity)  as totalTeenPlySheet,
            SUM(panchPlySheetQuantity)  as totalPanchPlySheet,
            SUM(cottonQuantity)  as totalSCotton
            FROM purchases WHERE seasonId = '$seasonId' AND status = 1");
        return $query->row();
    }

    function getTotalKinow($seasonId)
    {
        $query = $this->db->query("SELECT 
            SUM(quantityInMaan)  as totalMaan,
            SUM(categoryAQuanity) as totalCatA,
            SUM(categoryBQuantity)  as totalCatB
            FROM kinow_purchasing WHERE seasonId = '$seasonId' AND status = 1");
        return $query->row();
    }

    function getLabourExpenses($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE `seasonId` = '$seasonId' AND `role` = 4 AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getProductionList($seasonId)
    {
        $query = $this->db->query("SELECT * FROM kinow_production WHERE seasonId = '$seasonId' AND status = 1 ORDER BY addDate DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function checkIfExist($seasonId, $addDate)
    {
        $query = $this->db->query("SELECT * FROM kinow_production WHERE seasonId = '$seasonId' AND addDate = '$addDate' AND status = 1 ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getSelectedProductionRecord($seasonId, $addDate)
    {
        $query = $this->db->query("SELECT * FROM kinow_production WHERE seasonId = '$seasonId' AND addDate = '$addDate' AND status = 1 ");
        return $query->num_rows() > 0 ? $query->row() : array();
    }

    function updateKinowProductionRecod($data, $seasonId, $addDate)
    {
        $conditions = array('seasonId' => $seasonId, 'addDate' => $addDate);
        $this->db->where($conditions);
        $this->db->update( 'kinow_production', $data );
        return TRUE;   
    }

    function getOverallProductionStatistics($seasonId)
    {
        $query = $this->db->query("SELECT
            SUM(fourtyEight_first) as fourtyEight_first,
            SUM(fiftySix_first) as fiftySix_first,
            SUM(sixtyFour_first) as sixtyFour_first,
            SUM(seventyTwo_first) as seventyTwo_first,
            SUM(eighty_first) as eighty_first,
            SUM(ninety_first) as ninety_first,
            SUM(hundred_first) as hundred_first,
            SUM(hundredAndTen_first) as hundredAndTen_first,
            SUM(totalFirst) as totalFirst,
            SUM(fourtyEight_second) as fourtyEight_second,
            SUM(fiftySix_second) as fiftySix_second,
            SUM(sixtyFour_second) as sixtyFour_second,
            SUM(seventyTwo_second) as seventyTwo_second,
            SUM(eighty_second) as eighty_second,
            SUM(ninety_second) as ninety_second,
            SUM(hundred_second) as hundred_second,
            SUM(hundredAndTen_second) as hundredAndTen_second,
            SUM(totalSecond) as totalSecond,
            SUM(fourtyTwo_cotton) as fourtyTwo_cotton,
            SUM(fourtyEight_cotton) as fourtyEight_cotton,
            SUM(fiftySix_cotton) as fiftySix_cotton,
            SUM(sixty_cotton) as sixty_cotton,
            SUM(sixtySix_cotton) as sixtySix_cotton,
            SUM(seventyTwo_cotton) as seventyTwo_cotton,
            SUM(eighty_cotton) as eighty_cotton,
            SUM(ninety_cotton) as ninety_cotton,
            SUM(hundred_cotton) as hundred_cotton,
            SUM(hundredAndTen_cotton) as hundredAndTen_cotton,
            SUM(cottonTotal) as cottonTotal
            FROM kinow_production WHERE seasonId = '$seasonId' AND status = 1 GROUP BY seasonId ");
        return $query->row();
    }

    function getSalesStatictics($seasonId)
    {
        $todayDate = date('Y-m-d');
        $query = $this->db->query("SELECT
            (SELECT COUNT(*) FROM kinow_selling WHERE seasonId = '$seasonId' AND status = 1) as totalSeasonSales,
            (SELECT COUNT(*) FROM kinow_selling WHERE seasonId = '$seasonId' AND sellDate = '$todayDate' AND status = 1) as totalTodaySales,
            (SELECT SUM(grand_total) FROM kinow_selling WHERE seasonId = '$seasonId' AND status = 1 GROUP BY seasonId) as totalAmount");
        return $query->row();
    }

    function getSalesByDate($seasonId)
    {
        $query = $this->db->query("SELECT COUNT(*) as totalSales,sellDate FROM kinow_selling GROUP BY sellDate ORDER BY sellDate DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getSalesOfDate($date)
    {
        $query = $this->db->query("SELECT * FROM kinow_selling WHERE sellDate = '$date' AND status = 1 ORDER BY id DESC");
        return $query->num_rows() > 0 ? $query->result() : array();   
    }

}
?>