<?php
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/

include_once('config.php');
require_once('include/logging.php');
require_once('include/database/PearDatabase.php');
require_once('data/SugarBean.php');
require_once('data/CRMEntity.php');
require_once('include/utils/utils.php');
require_once('user_privileges/default_module_view.php');

class Receiptcards extends CRMEntity {
	var $log;
	var $db;

	var $tab_name = Array('vtiger_crmentity','vtiger_receiptcards','vtiger_receiptcardscf');
	var $tab_name_index = Array('vtiger_crmentity'=>'crmid','vtiger_receiptcards'=>'receiptcards_id','vtiger_receiptcardscf'=>'receiptcards_id');
	var $groupTable = Array('vtiger_receiptcardsgrouprelation','receiptcardsid'); 
  var $column_fields = Array();

	var $sortby_fields = Array('receiptcards_name');		  

  // This is the list of fields that are in the lists.
	var $list_fields = Array(
    'Receiptcards Name'=>Array('receiptcards'=>'receiptcards_name'),
  );
  var $list_fields_name = Array(
    'Receiptcards Name'=>'receiptcards_name',
  );
  var $list_link_field= 'receiptcards_name';

	var $search_fields = Array(
    'Receiptcards Name'=>Array('receiptcards'=>'receiptcards_name'),
  );
  var $search_fields_name = Array(
    'Receiptcards Name'=>'receiptcards_name',
  );

	//Added these variables which are used as default order by and sortorder in ListView
	var $default_order_by = 'receiptcards_name';
	var $default_sort_order = 'ASC';

	/**	Constructor which will set the column_fields in this object
	 */
	function Receiptcards() {
		$this->log =LoggerManager::getLogger('receiptcards');
		$this->log->debug("Entering Receiptcards() method ...");
		$this->db = new PearDatabase();
		$this->column_fields = getColumnFields('Receiptcards');
		$this->log->debug("Exiting Receiptcards method ...");
	}

	function save_module($module)
	{
  	 // Inserting into attachments table 
     $this->insertIntoAttachment($this->id,$module); 
	}	

	/**
	 * This function is used to add the vtiger_attachments. This will call the function uploadAndSaveFile which will upload the attachment into the server and save that attachment information in the database.
	 * @param int $id  - entity id to which the vtiger_files to be uploaded
	 * @param string $module  - the current module name
	 */
	function insertIntoAttachment($id,$module)
	{
		global $adb;
		$file_saved = false;

		foreach($_FILES as $fileindex => $files)
		{
			if($files['name'] != '' && $files['size'] > 0)
			{
				$file_saved = $this->uploadAndSaveFile($id,$module,$files);
			}
		}
	}
 
  function  getListQuery($module)
  {
    $tab_id=getTabid($module);
    global $current_user;
    $is_admin = is_admin($current_user);
    require("user_privileges/user_privileges_".$current_user->id.".php");
    require("user_privileges/sharing_privileges_".$current_user->id.".php");
    $query="SELECT vtiger_crmentity.*, vtiger_receiptcards.* 
        FROM vtiger_receiptcards 
          INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_receiptcards.receiptcards_id 
          LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid 
          LEFT JOIN vtiger_receiptcardsgrouprelation ON vtiger_receiptcards.receiptcards_id = vtiger_receiptcardsgrouprelation.receiptcardsid
          LEFT JOIN vtiger_groups ON vtiger_groups.groupname = vtiger_receiptcardsgrouprelation.groupname
        WHERE vtiger_crmentity.deleted = 0 ".$where;
    if($is_admin==false && $profileGlobalPermission[1]==1 && $profileGlobalPermission[2]==1 && $defaultOrgSharingPermission[$tab_id]==3)
    {
      $sec_parameter=getListViewSecurityParameter($module);
      $query .= $sec_parameter;
    }
    return $query;   
  }
  
  function getListViewSecurityParameter($module)
  {
    global $current_user;
    $tabid=getTabid($module);
    require("user_privileges/user_privileges_".$current_user->id.".php");
    require("user_privileges/sharing_privileges_".$current_user->id.".php");
    $sec_query = " and (vtiger_crmentity.smownerid in($current_user->id) or vtiger_crmentity.smownerid in(select vtiger_user2role.userid from vtiger_user2role inner join vtiger_users on vtiger_users.id=vtiger_user2role.userid inner join vtiger_role on vtiger_role.roleid=vtiger_user2role.roleid where vtiger_role.parentrole like '".$current_user_parent_role_seq."::%') or vtiger_crmentity.smownerid in(select shareduserid from vtiger_tmp_read_user_sharing_per where userid=".$current_user->id." and tabid=".$tabid.") or (vtiger_crmentity.smownerid in (0) and (";
    if(sizeof($current_user_groups) > 0)
    {
      $sec_query .= " vtiger_groups.groupid in (". implode(",", $current_user_groups) .") or ";
    }
    $sec_query .= " vtiger_groups.groupid in(select vtiger_tmp_read_group_sharing_per.sharedgroupid from vtiger_tmp_read_group_sharing_per where userid=".$current_user->id." and tabid=".$tabid.")))) ";
    return $sec_query;
  }
  
	/**	Function used to get the sort order for Receiptcards listview
	 *	@return string	$sorder	- first check the $_REQUEST['sorder'] if request value is empty then check in the $_SESSION['RECEIPTCARDS_SORT_ORDER'] if this session value is empty then default sort order will be returned. 
	 */
	function getSortOrder()
	{
		global $log;
                $log->debug("Entering getSortOrder() method ...");	
		if(isset($_REQUEST['sorder'])) 
			$sorder = $_REQUEST['sorder'];
		else
			$sorder = (($_SESSION['RECEIPTCARDS_SORT_ORDER'] != '')?($_SESSION['RECEIPTCARDS_SORT_ORDER']):($this->default_sort_order));
		$log->debug("Exiting getSortOrder() method ...");
		return $sorder;
	}

	/**	Function used to get the order by value for Receiptcards listview
	 *	@return string	$order_by  - first check the $_REQUEST['order_by'] if request value is empty then check in the $_SESSION['RECEIPTCARDS_ORDER_BY'] if this session value is empty then default order by will be returned. 
	 */
	function getOrderBy()
	{
		global $log;
                $log->debug("Entering getOrderBy() method ...");
		if (isset($_REQUEST['order_by'])) 
			$order_by = $_REQUEST['order_by'];
		else
			$order_by = (($_SESSION['RECEIPTCARDS_ORDER_BY'] != '')?($_SESSION['RECEIPTCARDS_ORDER_BY']):($this->default_order_by));
		$log->debug("Exiting getOrderBy method ...");
		return $order_by;
	}	

}

?>
