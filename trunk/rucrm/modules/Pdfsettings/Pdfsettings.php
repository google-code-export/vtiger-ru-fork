<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
require_once('data/CRMEntity.php');
require_once('data/Tracker.php');

class Pdfsettings extends CRMEntity {
	var $db, $log; // Used in class functions of CRMEntity

	var $table_name = 'crmnow_pdfsettings';
	var $table_index= 'pdfsettingsid';
	var $column_fields = Array();

	/** Indicator if this is a custom module or standard module */
	var $IsCustomModule = true;

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('crmnow_pdf_fields', 'pdffieldid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'crmnow_pdfsettings', 'crmnow_pdf_fields', 'crmnow_pdfcolums_active', 'crmnow_pdfcolums_sel','crmnow_pdfconfiguration');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'crmnow_pdfsettings' => 'pdfieldid',
		'crmnow_pdf_fields'=>'pdfieldid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array (
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
	);
	var $list_fields_name = Array (
		/* Format: Field Label => fieldname */
	);

	// Make the field link to detail view 
	var $list_link_field = '';

	// For Popup listview and UI type support
	var $search_fields = Array(
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
	);
	var $search_fields_name = Array (
		/* Format: Field Label => fieldname */
	);

	// For Popup window record selection
	var $popup_fields = Array ();

	// Placeholder for sort fields - All the fields will be initialized for Sorting through initSortFields
	var $sortby_fields = Array();

	// For Alphabetical search
	var $def_basicsearch_col = '';

	// Column value to use on detail view record text display
	var $def_detailview_recname = '';

	// Required Information for enabling Import feature
	var $required_fields = Array ();

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array();
	
	// Callback function list during Importing
	var $special_functions = Array();

	var $default_order_by = '';
	var $default_sort_order='ASC';

	function __construct() {
		global $log;
		$this->column_fields = getColumnFields('Pdfsettings');
		$this->db = new PearDatabase();
		$this->log = $log;
	}

	function getSortOrder() {
		global $currentModule;

		$sortorder = $this->default_sort_order;
		if($_REQUEST['sorder']) $sortorder = $this->db->sql_escape_string($_REQUEST['sorder']);
		else if($_SESSION[$currentModule.'_Sort_Order']) 
			$sortorder = $_SESSION[$currentModule.'_Sort_Order'];

		return $sortorder;
	}

	function getOrderBy() {
		global $currentModule;
		
		$use_default_order_by = '';		
		if(PerformancePrefs::getBoolean('LISTVIEW_DEFAULT_SORTING', true)) {
			$use_default_order_by = $this->default_order_by;
		}
		
		$orderby = $use_default_order_by;
		if($_REQUEST['order_by']) $orderby = $this->db->sql_escape_string($_REQUEST['order_by']);
		else if($_SESSION[$currentModule.'_Order_By'])
			$orderby = $_SESSION[$currentModule.'_Order_By'];
		return $orderby;
	}

	function save_module($module) {
	}

	/**
	 * Return query to use based on given modulename, fieldname
	 * Useful to handle specific case handling for Popup
	 */
	function getQueryByModuleField($module, $fieldname, $srcrecord) {
		// $srcrecord could be empty
	}

	/**
	 * Get list view query.
	 */
	function getListQuery($module, $where='') {
		$query = "SELECT vtiger_crmentity.*, $this->table_name.*";

		// Select Custom Field Table Columns if present
		if(!empty($this->customFieldTable)) $query .= ", " . $this->customFieldTable[0] . ".* ";

		$query .= " FROM $this->table_name";

		$query .= "	INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = $this->table_name.$this->table_index";

		// Consider custom table join as well.
		if(!empty($this->customFieldTable)) {
			$query .= " INNER JOIN ".$this->customFieldTable[0]." ON ".$this->customFieldTable[0].'.'.$this->customFieldTable[1] .
				      " = $this->table_name.$this->table_index"; 
		}
		$query .= " LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid";
		$query .= " LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid";

		$linkedModulesQuery = $this->db->pquery("SELECT distinct fieldname, columnname, relmodule FROM vtiger_field" .
				" INNER JOIN vtiger_fieldmodulerel ON vtiger_fieldmodulerel.fieldid = vtiger_field.fieldid" .
				" WHERE uitype='10' AND vtiger_fieldmodulerel.module=?", array($module));
		$linkedFieldsCount = $this->db->num_rows($linkedModulesQuery);
		
		for($i=0; $i<$linkedFieldsCount; $i++) {
			$related_module = $this->db->query_result($linkedModulesQuery, $i, 'relmodule');
			$fieldname = $this->db->query_result($linkedModulesQuery, $i, 'fieldname');
			$columnname = $this->db->query_result($linkedModulesQuery, $i, 'columnname');
			
			$other = CRMEntity::getInstance($related_module);
			vtlib_setup_modulevars($related_module, $other);
			
			$query .= " LEFT JOIN $other->table_name ON $other->table_name.$other->table_index = $this->table_name.$columnname";
		}
		
		$query .= "	WHERE vtiger_crmentity.deleted = 0 ".$where;
		$query .= $this->getListViewSecurityParameter($module);
		return $query;
	}

	/**
	 * Apply security restriction (sharing privilege) query part for List view.
	 */
	function getListViewSecurityParameter($module) {
		global $current_user;
		require('user_privileges/user_privileges_'.$current_user->id.'.php');
		require('user_privileges/sharing_privileges_'.$current_user->id.'.php');

		$sec_query = '';
		$tabid = getTabid($module);

		if($is_admin==false && $profileGlobalPermission[1] == 1 && $profileGlobalPermission[2] == 1 
			&& $defaultOrgSharingPermission[$tabid] == 3) {

				$sec_query .= " AND (vtiger_crmentity.smownerid in($current_user->id) OR vtiger_crmentity.smownerid IN 
					(
						SELECT vtiger_user2role.userid FROM vtiger_user2role 
						INNER JOIN vtiger_users ON vtiger_users.id=vtiger_user2role.userid 
						INNER JOIN vtiger_role ON vtiger_role.roleid=vtiger_user2role.roleid 
						WHERE vtiger_role.parentrole LIKE '".$current_user_parent_role_seq."::%'
					) 
					OR vtiger_crmentity.smownerid IN 
					(
						SELECT shareduserid FROM vtiger_tmp_read_user_sharing_per 
						WHERE userid=".$current_user->id." AND tabid=".$tabid."
					) 
					OR 
						(";
		
					// Build the query based on the group association of current user.
					if(sizeof($current_user_groups) > 0) {
						$sec_query .= " vtiger_groups.groupid IN (". implode(",", $current_user_groups) .") OR ";
					}
					$sec_query .= " vtiger_groups.groupid IN 
						(
							SELECT vtiger_tmp_read_group_sharing_per.sharedgroupid 
							FROM vtiger_tmp_read_group_sharing_per
							WHERE userid=".$current_user->id." and tabid=".$tabid."
						)";
				$sec_query .= ")
				)";
		}
		return $sec_query;
	}

 	/**
	* Invoked when special actions are performed on the module.
	* @param String Module name
	* @param String Event Type
	*/	
	function vtlib_handler($moduleName, $eventType) {
 					
		require_once('include/utils/utils.php');			
		global $adb;
 		
 		if($eventType == 'module.postinstall') {
			require_once('vtlib/Vtiger/Module.php');
				
			$moduleInstance = Vtiger_Module::getInstance($moduleName);
			
			// fill the settings tables 
			$adb ->query("INSERT INTO `crmnow_pdf_fields` (`pdffieldid`, `pdffieldname`, `pdftablename`, `quotes_g_enabled`, `quotes_i_enabled`, `po_g_enabled`, `po_i_enabled`, `so_g_enabled`, `so_i_enabled`, `invoice_g_enabled`, `invoice_i_enabled`) VALUES 
			(1, 'Position', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1),
			(2, 'OrderCode', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1),
			(3, 'Description', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1),
			(4, 'Qty', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1),
			(5, 'Unit', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1),
			(6, 'UnitPrice', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1),
			(7, 'Discount', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1),
			(8, 'Tax', 'crmnow_pdfcolums', 0, 1, 1, 1, 1, 1, 1, 1),
			(9, 'LineTotal', 'crmnow_pdfcolums', 1, 1, 1, 1, 1, 1, 1, 1)");

			$adb ->query("INSERT INTO `crmnow_pdfcolums_active` (`pdfcolumnactiveid`, `pdfmodulname`, `pdftaxmode`, `position`, `ordercode`, `description`, `qty`, `unit`, `unitprice`, `discount`, `tax`, `linetotal`) VALUES 
			(1, 'Quotes', 'group', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled'),
			(2, 'Quotes', 'individual', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled'),
			(3, 'PurchaseOrder', 'group', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled'),
			(4, 'PurchaseOrder', 'individual', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled'),
			(5, 'SalesOrder', 'group', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled'),
			(6, 'SalesOrder', 'individual', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled'),
			(7, 'Invoice', 'group', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled'),
			(8, 'Invoice', 'individual', '', '', 'disabled', 'disabled', '', 'disabled', '', 'disabled', 'disabled')");

			$adb ->query("INSERT INTO `crmnow_pdfcolums_sel` (`pdfcolumnselid`, `pdfmodul`, `pdftaxmode`, `position`, `ordercode`, `description`, `qty`, `unit`, `unitprice`, `discount`, `tax`, `linetotal`) VALUES 
			(1, 'Quotes', 'group', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked'),
			(2, 'Quotes', 'individual', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked'),
			(3, 'PurchaseOrder', 'group', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked'),
			(4, 'PurchaseOrder', 'individual', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked'),
			(5, 'SalesOrder', 'group', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked'),
			(6, 'SalesOrder', 'individual', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked'),
			(7, 'Invoice', 'group', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked'),
			(8, 'Invoice', 'individual', 'checked', '', 'checked', 'checked', '', 'checked', '', 'checked', 'checked')");

			$adb ->query("INSERT INTO `crmnow_pdfconfiguration` (`pdfid`, `pdfmodul`, `fontid`, `fontsizebody`, `fontsizeheader`, `fontsizefooter`, `fontsizeaddress`, `dateused`, `spaceheadline`, `summaryradio`, `gprodname`, `gproddes`, `gprodcom`, `iprodname`, `iproddes`, `iprodcom`, `pdflang`, `footerradio`, `logoradio`, `pageradio`, `owner`, `ownerphone`, `poname`, `clientid`, `carrier`) VALUES 
			(0, 'Quotes', 0, 8, 8, 7, 9, 1, 0, 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'de_de', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
			(1, 'PurchaseOrder', 0, 8, 8, 7, 9, 1, 0, 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'de_de', 'true', 'true', 'true', 'true', 'true', 'false', 'false', 'false'),
			(2, 'SalesOrder', 0, 8, 8, 7, 9, 1, 0, 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'de_de', 'true', 'true', 'true', 'false', 'false', 'false', 'false', 'false'),
			(3, 'Invoice', 0, 8, 8, 7, 9, 0, 0, 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'de_de', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'false')");

			$adb ->query("INSERT INTO `crmnow_pdffonts` (`fontid`, `tcpdfname`, `namedisplay`) VALUES 
			(0, 'dejavusans', 'Dejavu Sans'),
			(1, 'dejavusansb', 'Dejavu Sans Bold'),
			(2, 'dejavusansi', 'Dejavu Sans Italic'),
			(3, 'dejavusansbi', 'Dejavu Sans Bold Italic'),
			(4, 'dejavusanscondensed', 'Dejavu Sans Condensed'),
			(5, 'dejavusanscondensedb', 'Dejavu Sans Condensed Bold'),
			(6, 'dejavusanscondensedi', 'Dejavu Sans Condensed Italic'),
			(7, 'dejavusanscondensedbi', 'Dejavu Sans Condensed Bold Italic'),
			(8, 'dejavusans-extralight', 'Dejavu Sans Extra Light'),
			(9, 'dejavusansi', 'Dejavu Sans Italic'),
			(10, 'dejavusansmono', 'Dejavu Sans Mono'),
			(11, 'dejavusansmonob', 'Dejavu Sans Mono Bold'),
			(12, 'dejavusansmonoi', 'Dejavu Sans Mono Italic'),
			(13, 'dejavusansmonobi', 'Dejavu Sans Bold Italic'),
			(14, 'dejavuserif', 'Dejavu Serif'),
			(15, 'dejavuserifb', 'Dejavu Serif Bold'),
			(16, 'dejavuserifi', 'Dejavu Serif Italic'),
			(17, 'dejavuserifbi', 'Dejavu Serif Bold Italic'),
			(18, 'dejavuserifcondensed', 'Dejavu Serif Condensed'),
			(19, 'dejavuserifcondensedb', 'Dejavu Serif Condensed Bold'),
			(20, 'dejavuserifcondensedi', 'Dejavu Serif Condensed Italic'),
			(21, 'dejavuserifcondensedbi', 'Dejavu Serif Condensed Bold Italic'),
			(22, 'freemono', 'Free Mono'),
			(23, 'freemonob', 'Free Mono Bold'),
			(24, 'freemonoi', 'Free Mono Italic'),
			(25, 'freemonobi', 'Free Mono Bold Italic'),
			(26, 'freesans', 'Free Sans'),
			(27, 'freesansb', 'Free Sans Bold'),
			(28, 'freesansi', 'Free Sans Italic'),
			(29, 'freesansbi', 'Free Sans Bold Italic'),
			(30, 'freeserif', 'Free Serif'),
			(31, 'freeserifb', 'Free Serif Bold'),
			(32, 'freeserifi', 'Free Serif Italic'),
			(33, 'freeserifbi', 'Free Serif Bold Italic'),
			(34, 'helvetica', 'Helvetica'),
			(35, 'helveticab', 'Helvetica Bold'),
			(36, 'helveticai', 'Helvetica Italic'),
			(37, 'helveticabi', 'Helvetica Bold Italic')");

			$adb ->query("INSERT INTO `crmnow_pdfsettings` (`pdfieldid`, `pdffieldname`, `pdfeditable`, `pdfmodul`) VALUES 
			(1, 'pdflang', 0, 'Quotes'),
			(2, 'fontid', 0, 'Quotes'),
			(3, 'fontsizeheader', 0, 'Quotes'),
			(4, 'fontsizeaddress', 0, 'Quotes'),
			(5, 'fontsizebody', 0, 'Quotes'),
			(6, 'fontsizefooter', 0, 'Quotes'),
			(7, 'logoradio', 0, 'Quotes'),
			(8, 'dateused', 0, 'Quotes'),
			(9, 'spaceheadline', 0, 'Quotes'),
			(10, 'footerradio', 0, 'Quotes'),
			(11, 'pageradio', 0, 'Quotes'),
			(12, 'summaryradio', 0, 'Quotes'),
			(13, 'gprodname', 0, 'Quotes'),
			(14, 'gproddes', 0, 'Quotes'),
			(15, 'gprodcom', 0, 'Quotes'),
			(16, 'iprodname', 0, 'Quotes'),
			(17, 'iproddes', 0, 'Quotes'),
			(18, 'iprodcom', 0, 'Quotes'),
			(19, 'gcolumns', 0, 'Quotes'),
			(20, 'icolumns', 0, 'Quotes'),
			(21, 'owner', 0, 'Quotes'),
			(22, 'ownerphone', 0, 'Quotes'),
			(23, 'pdflang', 0, 'Invoice'),
			(24, 'fontid', 0, 'Invoice'),
			(25, 'fontsizeheader', 0, 'Invoice'),
			(26, 'fontsizeaddress', 0, 'Invoice'),
			(27, 'fontsizebody', 0, 'Invoice'),
			(28, 'fontsizefooter', 0, 'Invoice'),
			(29, 'logoradio', 0, 'Invoice'),
			(30, 'poname', 0, 'Invoice'),
			(31, 'spaceheadline', 0, 'Invoice'),
			(32, 'footerradio', 0, 'Invoice'),
			(33, 'pageradio', 0, 'Invoice'),
			(34, 'summaryradio', 0, 'Invoice'),
			(35, 'gprodname', 0, 'Invoice'),
			(36, 'gproddes', 0, 'Invoice'),
			(37, 'gprodcom', 0, 'Invoice'),
			(38, 'iprodname', 0, 'Invoice'),
			(39, 'iproddes', 0, 'Invoice'),
			(40, 'iprodcom', 0, 'Invoice'),
			(41, 'gcolumns', 0, 'Invoice'),
			(42, 'icolumns', 0, 'Invoice'),
			(43, 'owner', 0, 'Invoice'),
			(44, 'ownerphone', 0, 'Invoice'),
			(45, 'pdflang', 0, 'PurchaseOrder'),
			(46, 'fontid', 0, 'PuchaseOrder'),
			(47, 'fontsizeheader', 0, 'PuchaseOrder'),
			(48, 'fontsizeaddress', 0, 'PuchaseOrder'),
			(49, 'fontsizebody', 0, 'PuchaseOrder'),
			(50, 'fontsizefooter', 0, 'PuchaseOrder'),
			(51, 'logoradio', 0, 'PuchaseOrder'),
			(52, 'dateused', 0, 'PuchaseOrder'),
			(53, 'spaceheadline', 0, 'PuchaseOrder'),
			(54, 'footerradio', 0, 'PuchaseOrder'),
			(55, 'pageradio', 0, 'PuchaseOrder'),
			(56, 'summaryradio', 0, 'PuchaseOrder'),
			(57, 'gprodname', 0, 'PuchaseOrder'),
			(58, 'gproddes', 0, 'PuchaseOrder'),
			(59, 'gprodcom', 0, 'PuchaseOrder'),
			(60, 'iprodname', 0, 'PuchaseOrder'),
			(61, 'iproddes', 0, 'PuchaseOrder'),
			(62, 'iprodcom', 0, 'PuchaseOrder'),
			(63, 'gcolumns', 0, 'PuchaseOrder'),
			(64, 'icolumns', 0, 'PuchaseOrder'),
			(65, 'owner', 0, 'PuchaseOrder'),
			(66, 'ownerphone', 0, 'PuchaseOrder'),
			(67, 'poname', 0, 'PuchaseOrder'),
			(68, 'clientid', 0, 'PuchaseOrder'),
			(69, 'carrier', 0, 'PuchaseOrder'),
			(70, 'pdflang', 0, 'SalesOrder'),
			(71, 'fontid', 0, 'SalesOrder'),
			(72, 'fontsizeheader', 0, 'SalesOrder'),
			(73, 'fontsizeaddress', 0, 'SalesOrder'),
			(74, 'fontsizebody', 0, 'SalesOrder'),
			(75, 'fontsizefooter', 0, 'SalesOrder'),
			(76, 'logoradio', 0, 'SalesOrder'),
			(77, 'dateused', 0, 'SalesOrder'),
			(78, 'spaceheadline', 0, 'SalesOrder'),
			(79, 'footerradio', 0, 'SalesOrder'),
			(80, 'pageradio', 0, 'SalesOrder'),
			(81, 'summaryradio', 0, 'SalesOrder'),
			(82, 'gprodname', 0, 'SalesOrder'),
			(83, 'gproddes', 0, 'SalesOrder'),
			(84, 'gprodcom', 0, 'SalesOrder'),
			(85, 'iprodname', 0, 'SalesOrder'),
			(86, 'iproddes', 0, 'SalesOrder'),
			(87, 'iprodcom', 0, 'SalesOrder'),
			(88, 'gcolumns', 0, 'SalesOrder'),
			(89, 'icolumns', 0, 'SalesOrder'),
			(90, 'owner', 0, 'SalesOrder'),
			(91, 'ownerphone', 0, 'SalesOrder'),
			(92, 'paperf', 0, 'Quotes'),
			(93, 'paperf', 0, 'Invoice'),
			(94, 'paperf', 0, 'PuchaseOrder'),
			(95, 'paperf', 0, 'SalesOrder')
			");
			
			// Mark the module as custom module
			$adb->pquery('UPDATE vtiger_tab SET customized=1 WHERE name=?', array($moduleName));
			
		} else if($eventType == 'module.disabled') {
			$em = new VTEventsManager($adb);
			$em->setHandlerInActive('ServiceContractsHandler');

		} else if($eventType == 'module.enabled') {
			$em = new VTEventsManager($adb);
			$em->setHandlerActive('ServiceContractsHandler');

		} else if($eventType == 'module.preuninstall') {
		// TODO Handle actions when this module is about to be deleted.
		} else if($eventType == 'module.preupdate') {
		// TODO Handle actions before this module is updated.
		} else if($eventType == 'module.postupdate') {
		// TODO Handle actions after this module is updated.
		}
 	}

	/** 
	 * Handle saving related module information.
	 * NOTE: This function has been added to CRMEntity (base class).
	 * You can override the behavior by re-defining it here.
	 */
	//function save_related_module($module, $crmid, $with_module, $with_crmid) {}
	 


	/**
	 * Handle deleting related module information.
	 * NOTE: This function has been added to CRMEntity (base class).
	 * You can override the behavior by re-defining it here.
	 */
	//function delete_related_module($module, $crmid, $with_module, $with_crmid) {}		


	/**
	 * Handle getting related list information.
	 * NOTE: This function has been added to CRMEntity (base class).
	 * You can override the behavior by re-defining it here.
	 */
	//function get_related_list($id, $cur_tab_id, $rel_tab_id, $actions=false) { }
}
?>