<?php

class Seasons_model extends CI_Model
{
  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insertSeason($data)
    {
    	$this->db->insert('seasons',$data);
    	return $this->db->insert_id();
    }

    function addInstallment($data)
    {
        $this->db->insert('payments',$data);
        return $this->db->insert_id();
    }

    function seasonsList()
    {
    	$query = $this->db->query("SELECT * FROM `seasons` WHERE `status` = 1 ORDER BY id DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getExpenseAttance($table, $type)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE `expenseType` = '$type' AND `status` = 1 ORDER BY id DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getStaffExpense($table, $role)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE `role` = '$role' AND `status` = 1 ORDER BY id DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getKargal($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `kargal` WHERE `seasonId` = '$seasonId' AND `status` = 1 ORDER BY id DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function updateCurent($seasonId)
    {
    	$this->db->update('seasons');
    	$this->sb->where('id !=',$seasonId);
    	return true;
    }

    function checkSeasonAlreadyExist($seasonYear)
    {
		$this->db->select('*');
		$this->db->where('season',$seasonYear);
		$query = $this->db->get('seasons');
		if($query->num_rows() > 0)
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
    }

    function gardenList($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `garden_purchasing` WHERE seasonId = '$seasonId' AND (`status` = 1 OR `status` = 2) ORDER BY id DESC ");
    	return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getSeason($seasonId)
    {
        $query = $this->db->query("SELECT `season` FROM `seasons` WHERE id = '$seasonId' ");
        return $query->row()->season;
    }

    function getLabourId($id)
    {
        $query = $this->db->query("SELECT `attendanceOfId` as labourId FROM `daily_attendance` WHERE id = '$id' ");
        return $query->row()->labourId;
    }
    

    function getForeman($foremanId)
    {
        $query = $this->db->query("SELECT `name` FROM `staff` WHERE id = '$foremanId' ");
        return $query->row()->name;
    }
    

    function insertGarden($data)
    {
        $this->db->insert('garden_purchasing',$data);
        return $this->db->insert_id();
    }

    function addPumpExpense($data)
    {
        $this->db->insert('expenses',$data);
        return $this->db->insert_id();   
    }

    function addPumpExpenseFactory($data)
    {
        $this->db->insert('expenses_factory',$data);
        return $this->db->insert_id();   
    }

    function getSelectedGarden($gardenId)
    {
        $query = $this->db->query("SELECT * FROM `garden_purchasing` WHERE id = '$gardenId' ");
        return $query->row();
    }

    function updateGarden($data,$gardenId)
    {
        $this->db->where('id',$gardenId);
        $this->db->update('garden_purchasing',$data);
        return TRUE;
    }

    function updateAttendance($data, $expenseId, $managing, $date)
    {
        $array = array('attendanceOfId' => $expenseId, 'managing' => $managing, 'attendanceDate' => $date);
        $this->db->where($array);
        $this->db->update('daily_attendance',$data);
        return TRUE;
    }
    

    function setBayana($data,$gardenId)
    {
        $this->db->where('id',$gardenId);
        $this->db->update('garden_purchasing',$data);
        return TRUE;
    }

    function getInstallments($gardenId)
    {
        $query = $this->db->query("SELECT * FROM `payments` WHERE gardenId = '$gardenId' AND `status` = 1 ORDER BY `id` DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getTotalPaid($gardenId)
    {
        $query = $this->db->query("SELECT SUM(amount) as totalPaid FROM payments WHERE gardenId = '$gardenId' AND `status` = 1 ");
        return $query->row()->totalPaid;
    }

    function fetchAmount($table,$id)
    {
        if($table == 'garden_purchasing')
        {
            $query = $this->db->query("SELECT `bayana` as amount FROM `garden_purchasing` WHERE id = '$id' ");
        }
        else if($table == 'payments')
        {
            $query = $this->db->query("SELECT `amount` as amount FROM `payments` WHERE id = '$id' ");
        }

        return $query->row()->amount;
    }

    function updateEditFormValue($data,$table,$id)
    {
        $this->db->where('id',$id);
        $this->db->update($table,$data);
        return TRUE;
 
    }

    function updatePumpExpense($data,$expenseId)
    {
        $this->db->where('id',$expenseId);
        $this->db->update('expenses',$data);
        return TRUE;
    }

    function updatePumpExpenseFactory($data,$expenseId)
    {
        $this->db->where('id',$expenseId);
        $this->db->update('expenses_factory',$data);
        return TRUE;
    }

    function updatePersonalExpense($data,$expenseId)
    {
        $this->db->where('id',$expenseId);
        $this->db->update('expenses',$data);
        return TRUE;
    }

    function updatePersonalExpenseFactory($data,$expenseId)
    {
        $this->db->where('id',$expenseId);
        $this->db->update('expenses_factory',$data);
        return TRUE;
    }
    

    function addExpenseTransport($data)
    {
        $this->db->insert('expenses',$data);
        return $this->db->insert_id();
    }

    function addExpenseTransportFactory($data)
    {
        $this->db->insert('expenses_factory',$data);
        return $this->db->insert_id();
    }
    
    function getExpenseStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT SUM(expenseAmount) FROM `expenses` WHERE `expenseType` = 1 AND `seasonId` = '$seasonId')  as totalTransaport,
            (SELECT SUM(expenseAmount) FROM `expenses` WHERE `expenseType` = 2 AND `seasonId` = '$seasonId')  as totalLabour,
            (SELECT SUM(expenseAmount) FROM `expenses` WHERE `expenseType` = 3 AND `seasonId` = '$seasonId')  as totalOther");
        return $query->row();
    }

    function getExpenses($seasonId,$type)
    {
        $query = $this->db->query("SELECT * FROM `expenses` WHERE `expenseType` = '$type' AND `seasonId` = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getExpensesFactory($seasonId,$type)
    {
        $query = $this->db->query("SELECT * FROM `expenses_factory` WHERE `expenseType` = '$type' AND `seasonId` = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    } 

    function getPumpExpenses($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `expenses` WHERE (`expenseType` = 4 OR `expenseType` = 5)  AND `seasonId` = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    } 

    function getPumpExpensesFactory($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `expenses_factory` WHERE (`expenseType` = 4 OR `expenseType` = 5)  AND `seasonId` = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    } 

    function getExpenseToEdit($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `expenses` WHERE `id` = '$expenseId' ");
        return $query->row();
    }

    function getExpenseToEditFactory($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `expenses_factory` WHERE `id` = '$expenseId' ");
        return $query->row();
    }

    function getPersonalStaff($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE `seasonId` = '$seasonId' AND `role` = 3 AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getPersonalStaffFactory($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE `seasonId` = '$seasonId' AND `role` = 6 AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function udpateTransportExpense($data,$expenseId)
    {
        $this->db->where('id',$expenseId);
        $this->db->update('expenses',$data);
        return TRUE;
 
    }

    function udpateTransportExpenseFactory($data,$expenseId)
    {
        $this->db->where('id',$expenseId);
        $this->db->update('expenses_factory',$data);
        return TRUE;
 
    }

    function updateSeason($data,$seasonId)
    {
        $this->db->where('id',$seasonId);
        $this->db->update('seasons',$data);
        return TRUE;
    }

    function updateNexInstallmentDate($data,$gardenId)
    {
        $this->db->where('id',$gardenId);
        $this->db->update('garden_purchasing',$data);
        return TRUE;
    }

    function addAttendence($data)
    {
        $this->db->insert('daily_attendance',$data);
        return TRUE;
    }

    function getSelectedTransport($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `expenses` WHERE id = '$expenseId' ");
        return $query->row();
    }

    function getSelectedTransportFactory($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `expenses_factory` WHERE id = '$expenseId' ");
        return $query->row();
    }

    function getTotalTransportRent($expenseId)
    {
        $query = $this->db->query("SELECT SUM(perDayAmount) as total FROM `daily_attendance` WHERE `attendanceOfId` = '$expenseId' AND `attendance` = 1 ");
        return $query->row()->total;
    }

    function getTotalTransportRentFactory($expenseId)
    {
        $query = $this->db->query("SELECT SUM(perDayAmount) as total FROM `daily_attendance` WHERE `attendanceOfId` = '$expenseId' AND `attendance` = 1 AND `managing` = 6 ");
        return $query->row()->total;
    }

    function getTotalTransportRecord($expenseId,$managing)
    {
        $query = $this->db->query("SELECT * FROM `daily_attendance` WHERE `attendanceOfId` = '$expenseId' AND `managing` = '$managing' ORDER BY id DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function changeAttendance($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('daily_attendance',$data);
        return TRUE;
    }

    function checkIfAttendanceAlreadyExist($expenseId,$managing)
    {
        $currentDate = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM `daily_attendance` WHERE `attendanceOfId` = '$expenseId' AND `attendanceDate` = '$currentDate' AND `managing` = '$managing' ");
        return $query->num_rows();
    }

    function checkAttendance($expenseId, $managing, $date)
    {
        $query = $this->db->query("SELECT * FROM `daily_attendance` WHERE `attendanceOfId` = '$expenseId' AND `attendanceDate` = '$date' AND `managing` = '$managing' ");
        return $query->num_rows() > 0 ? TRUE : FALSE;
    }

    

    function addTransportExpensePayment($data)
    {
        $this->db->insert('payments',$data);
        return $this->db->insert_id();   
    }
    
    function getTotalTransportPaid($expenseId)
    {
        $query = $this->db->query("SELECT SUM(amount) as total FROM `payments` WHERE `paymentOfExpenseId` = '$expenseId' AND `status` = 1 ");
        return $query->row()->total;
    }

    function getTransportExpensePayments($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `payments` WHERE `paymentOfExpenseId` = '$expenseId' AND `status` = 1 ORDER BY id DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function endSession($data,$expenseId)
    {
        $this->db->where('id',$expenseId);
        $this->db->update('expenses',$data);
        return TRUE;
    }

    function endSessionForeman($data,$staffId)
    {
        $this->db->where('id',$staffId);
        $this->db->update('staff',$data);
        return TRUE;
    }
    

    function addLabourForeman($data)
    {
        $this->db->insert('staff',$data);
        return $this->db->insert_id();   
    }

    function getLabourExpenses($seasonId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE `seasonId` = '$seasonId' AND `role` = 1 AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getSelectedForeman($foremanId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE id = '$foremanId' ");
        return $query->row();
    }

    function getSelectedLabour($labourId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE id = '$labourId' ");
        return $query->row();
    }

    function getForemanAttendace($id,$managing)
    {
        $query = $this->db->query("SELECT * FROM `daily_attendance` WHERE `attendanceOfId` = '$id' AND `managing` = '$managing' ORDER BY attendanceDate DESC");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function addLabourOfForeman($data)
    {
        $this->db->insert('staff',$data);
        return $this->db->insert_id();   
    }

    function getForemanLabours($foremanId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE foremanId = '$foremanId' AND `role` = 2 AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getForemanLaboursFactory($foremanId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE foremanId = '$foremanId' AND `role` = 5 AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    } 

    function setForemanAmount($data,$foremanId)
    {
        $this->db->where('id',$foremanId);
        $this->db->update('staff',$data);
        return TRUE;
    }

    function givePaymentToForeman($data)
    {
        $this->db->insert('payments',$data);
        return $this->db->insert_id();  
    }

    function getForemanPaymentsDetail($foremanId)
    {
        $query = $this->db->query("SELECT * FROM `payments` WHERE `paymentOfForemanId` = '$foremanId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    } 

    function getPersonalStaffPayments($memberId, $seasonId)
    {
        $query = $this->db->query("SELECT * FROM `payments` WHERE `personalStaffId` = '$memberId' AND `seasonId` = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getPersonalStaffPaymentsFactory($memberId, $seasonId)
    {
        $query = $this->db->query("SELECT * FROM `payments` WHERE `personalStaffId` = '$memberId' AND `seasonId` = '$seasonId' AND `paymenType` = 1 AND `status` = 1 ORDER BY id DESC ");
        return $query->num_rows() > 0 ? $query->result() : array();
    }

    function getPersonalStaffTotalPaid($memberId, $seasonId)
    {
        $query = $this->db->query("SELECT SUM(amount) as totalPaid FROM `payments` WHERE `personalStaffId` = '$memberId' AND `seasonId` = '$seasonId' AND `status` = 1 ORDER BY id DESC ");
        return $query->row()->totalPaid;
    }

    function getPersonalStaffTotalPaidFactory($memberId, $seasonId)
    {
        $query = $this->db->query("SELECT SUM(amount) as totalPaid FROM `payments` WHERE `personalStaffId` = '$memberId' AND `seasonId` = '$seasonId' AND `paymenType` = 1 AND `status` = 1 ORDER BY id DESC ");
        return $query->row()->totalPaid;
    }
    
    function getTotalPaidForeman($foremanId)
    {
        $query = $this->db->query("SELECT SUM(amount) as totalPaidForeman FROM `payments` WHERE `paymentOfForemanId` = '$foremanId' AND `foremanPaymentType` = 1 AND `status` = 1");
        return $query->row()->totalPaidForeman;
    } 

    function paidToForemanForLabours($foremanId)
    {
        $query = $this->db->query("SELECT SUM(amount) as totalPaidForLabour FROM `payments` WHERE `paymentOfForemanId` = '$foremanId' AND `foremanPaymentType` = 2 AND `status` = 1 ");
        return $query->row()->totalPaidForLabour;
    } 
    

    function getTotalLabourRent($foremanId, $labourIds)
    {
        $query = $this->db->query("SELECT SUM(perDayAmount) as totalLabourRent FROM `daily_attendance` WHERE `foremanId` = '$foremanId' AND `managing` = 5 AND `attendanceOfId` IN ($labourIds) AND `attendance` = 1 ");
        return $query->row()->totalLabourRent;
    }

    function addPersonalCarExpense($data)
    {
        $this->db->insert('expenses',$data);
        return $this->db->insert_id();   
    }

    function addPersonalCarExpenseFactory($data)
    {
        $this->db->insert('expenses_factory',$data);
        return $this->db->insert_id();   
    }

    function getPumpExpenseRow($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `expenses` WHERE `id` = '$expenseId' ");
        return $query->row();
    } 

    function getPumpExpenseRowFactory($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `expenses_factory` WHERE `id` = '$expenseId' ");
        return $query->row();
    } 

    function getPersonalExpenseRow($expenseId)
    {
        $query = $this->db->query("SELECT * FROM `expenses` WHERE `id` = '$expenseId' ");
        return $query->row();
    } 

    function getForemanRow($foremanId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE `id` = '$foremanId' ");
        return $query->row();
    } 

    function getLabourRow($labourId)
    {
        $query = $this->db->query("SELECT * FROM `staff` WHERE `id` = '$labourId' ");
        return $query->row();
    } 
    

   function updateForeman($data,$foremanId)
    {
        $this->db->where('id',$foremanId);
        $this->db->update('staff',$data);
        return TRUE;
    }

   function updateLabour($data,$labourId)
    {
        $this->db->where('id',$labourId);
        $this->db->update('staff',$data);
        return TRUE;
    }

    function getGardenStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            COUNT(*) as totalGardens,
            SUM(purchaseAmount) as totalPurchaseAmount,
            SUM(bayana) as totalBayana,
            SUM(gardenAcre) as totalAcre
            FROM garden_purchasing WHERE seasonId = '$seasonId' AND (status = 1 OR status = 2) ");
        return $query->row();
    }

    function getPaidForGarden($seasonId)
    {
        $query = $this->db->query("SELECT SUM(p.amount) as totalPaidForGarden FROM garden_purchasing g JOIN payments p ON p.seasonId = '$seasonId' AND g.seasonId = '$seasonId' AND g.id = p.gardenId AND (g.status = 1 OR g.status = 2)");
        return $query->row()->totalPaidForGarden;
    }

    function getTransportExpenseStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses WHERE seasonId = '$seasonId' AND expenseType = 1 AND status = 1 ) as totalTransport,
            (SELECT COUNT(*) FROM expenses e JOIN daily_attendance d WHERE e.seasonId = '$seasonId' AND e.expenseType = 1 AND e.status = 1 AND e.id = d.attendanceOfId AND d.managing = 1 AND attendance = 1) as totalPresent,
            (SELECT SUM(perDayAmount) FROM expenses e JOIN daily_attendance d WHERE e.seasonId = '$seasonId' AND e.expenseType = 1 AND e.status = 1 AND e.id = d.attendanceOfId AND d.managing = 1 AND attendance = 1) as totalAmountToPaid,
            (SELECT SUM(amount) FROM expenses e JOIN payments p WHERE e.seasonId = '$seasonId' AND e.expenseType = 1 AND e.status = 1 AND e.id = p.paymentOfExpenseId AND p.status = 1) as totalPaid
            "); 
        return $query->row();
    }

    function getTransportExpenseStatisticsFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 1 AND status = 1 ) as totalTransport,
            (SELECT COUNT(*) FROM expenses_factory e JOIN daily_attendance d WHERE e.seasonId = '$seasonId' AND e.expenseType = 1 AND e.status = 1 AND e.id = d.attendanceOfId AND d.managing = 1 AND attendance = 1) as totalPresent,
            (SELECT SUM(perDayAmount) FROM expenses_factory e JOIN daily_attendance d WHERE e.seasonId = '$seasonId' AND e.expenseType = 1 AND e.status = 1 AND e.id = d.attendanceOfId AND d.managing = 1 AND attendance = 1) as totalAmountToPaid,
            (SELECT SUM(amount) FROM expenses_factory e JOIN payments p WHERE e.seasonId = '$seasonId' AND e.expenseType = 1 AND e.status = 1 AND e.id = p.paymentOfExpenseId AND p.status = 1) as totalPaid
            "); 
        return $query->row();
    }

    function getLabourExpenseStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM staff WHERE seasonId = '$seasonId'AND role = 1 AND status = 1 ) as totalForeman,
            (SELECT COUNT(*) FROM staff WHERE seasonId = '$seasonId'AND role = 2 AND status = 1 ) as totalLabours,
            (SELECT COUNT(*) FROM staff s JOIN daily_attendance d 
                WHERE s.seasonId = '$seasonId' AND s.role = 2 AND s.status = 1 AND s.id = d.attendanceOfId 
                AND d.managing = 3 AND attendance = 1) as totalLabourPresent,
            (SELECT SUM(foremanSeasonFixAmount) FROM staff WHERE seasonId = '$seasonId'AND role = 1 AND status = 1 ) as totalAmountForeman,
            (SELECT SUM(d.perDayAmount) FROM staff s JOIN daily_attendance d
                WHERE s.seasonId = '$seasonId' AND s.role = 2 AND s.status = 1 AND s.id = d.attendanceOfId
                AND d.managing = 3 AND attendance = 1) as totalLabourAmount,
           (SELECT SUM(p.amount) FROM staff s JOIN payments p 
                WHERE s.seasonId = '$seasonId' AND (s.role = 2 OR s.role = 1) AND s.status = 1
                AND p.paymentOfForemanId = s.id AND (p.foremanPaymentType = 1 OR p.foremanPaymentType = 2) AND p.paymenType = 0 AND p.status = 1) as totalPaidToForeman
            "); 
        return $query->row();
    }

    function getLabourExpenseStatisticsFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM staff WHERE seasonId = '$seasonId' AND role = 4 AND status = 1 ) as totalForeman,
            (SELECT COUNT(*) FROM staff WHERE seasonId = '$seasonId' AND role = 5 AND status = 1 ) as totalLabours,
            (SELECT COUNT(*) FROM staff s JOIN daily_attendance d 
                WHERE s.seasonId = '$seasonId' AND s.role = 5 AND s.status = 1 AND s.id = d.attendanceOfId 
                AND d.managing = 5 AND attendance = 1) as totalLabourPresent,
            (SELECT SUM(foremanSeasonFixAmount) FROM staff WHERE seasonId = '$seasonId'AND role = 4 AND status = 1 ) as totalAmountForeman,
            (SELECT SUM(d.perDayAmount) FROM staff s JOIN daily_attendance d
                WHERE s.seasonId = '$seasonId' AND s.role = 5 AND s.status = 1 AND s.id = d.attendanceOfId
                AND d.managing = 5 AND attendance = 1) as totalLabourAmount,
           (SELECT SUM(p.amount) FROM staff s JOIN payments p 
                WHERE s.seasonId = '$seasonId' AND (s.role = 4 OR s.role = 5) AND s.status = 1
                AND p.paymentOfForemanId = s.id AND (p.foremanPaymentType = 1 OR p.foremanPaymentType = 2) AND p.paymenType = 1 AND p.status = 1) as totalPaidToForeman
            "); 
        return $query->row();
    }

    function getPersonalStaffStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM staff WHERE seasonId = '$seasonId'AND role = 3 AND status = 1 ) as totalMembers,
            (SELECT COUNT(*) FROM staff s JOIN daily_attendance d 
                WHERE s.seasonId = '$seasonId' AND s.role = 3 AND s.status = 1 AND s.id = d.attendanceOfId 
                AND d.managing = 4 AND attendance = 1) as totalPresent,
            (SELECT SUM(d.perDayAmount) FROM staff s JOIN daily_attendance d
                WHERE s.seasonId = '$seasonId' AND s.role = 3 AND s.status = 1 AND s.id = d.attendanceOfId
                AND d.managing = 4 AND attendance = 1) as totalAmountToPaid,
           (SELECT SUM(p.amount) FROM staff s JOIN payments p 
                WHERE s.seasonId = '$seasonId' AND s.role = 2 AND s.status = 1
                AND p.personalStaffId = s.id AND p.status = 1) as totalPaid
            "); 
        return $query->row();
    }

    function getPersonalStaffStatisticsFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM staff WHERE seasonId = '$seasonId'AND role = 6 AND status = 1 ) as totalMembers,
            (SELECT COUNT(*) FROM staff s JOIN daily_attendance d 
                WHERE s.seasonId = '$seasonId' AND s.role = 6 AND s.status = 1 AND s.id = d.attendanceOfId 
                AND d.managing = 7 AND attendance = 1) as totalPresent,
            (SELECT SUM(d.perDayAmount) FROM staff s JOIN daily_attendance d
                WHERE s.seasonId = '$seasonId' AND s.role = 6 AND s.status = 1 AND s.id = d.attendanceOfId
                AND d.managing = 7 AND attendance = 1) as totalAmountToPaid,
           (SELECT SUM(p.amount) FROM staff s JOIN payments p 
                WHERE s.seasonId = '$seasonId' AND s.role = 6 AND s.status = 1
                AND p.personalStaffId = s.id AND p.status = 1) as totalPaid
            "); 
        return $query->row();
    }

    function getPumpExpenseStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses WHERE seasonId = '$seasonId' AND (expenseType = 4 OR expenseType = 5)  AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses WHERE seasonId = '$seasonId' AND (expenseType = 4 OR expenseType = 5)  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }

    function getPumpExpenseStatisticsFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses_factory WHERE seasonId = '$seasonId' AND (expenseType = 4 OR expenseType = 5)  AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses_factory WHERE seasonId = '$seasonId' AND (expenseType = 4 OR expenseType = 5)  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }

    function getPersoanlCarStatistics($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses WHERE seasonId = '$seasonId' AND expenseType = 6 AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses WHERE seasonId = '$seasonId' AND expenseType = 6  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }  

    function getPersoanlCarStatisticsFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 6 AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 6  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }   

    function getOtherExpense($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses WHERE seasonId = '$seasonId' AND expenseType = 3 AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses WHERE seasonId = '$seasonId' AND expenseType = 3  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }

    function getOtherExpenseFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 3 AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 3  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }  

    function getpattiExpenseFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 7 AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 7  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }  

    function getpatriExpenseFactory($seasonId)
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 8 AND status = 1 ) as totalExpense,
            (SELECT SUM(expenseAmount) FROM expenses_factory WHERE seasonId = '$seasonId' AND expenseType = 8  AND status = 1 ) as totalExpenseAmount "); 
        return $query->row();
    }  

}
?>
