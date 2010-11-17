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

require_once('modules/Receiptcards/Receiptcards.php');
global $mod_strings;

require_once('include/logging.php');
$log = LoggerManager::getLogger('receiptcards_delete');

$focus = new Receiptcards();

if(!isset($_REQUEST['record']))
	die($mod_strings['ERR_DELETE_RECORD']);

if($_REQUEST['module'] == $_REQUEST['return_module'])
{
    $focus->id = $_REQUEST['record'];
    deleteReceiptcardsInventoryProductDetails($focus, false);
   
    $focus->mark_deleted($_REQUEST['record']);
}
	

if(isset($_REQUEST['parenttab']) && $_REQUEST['parenttab'] != "") $parenttab = $_REQUEST['parenttab'];

header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']."&parenttab=".$parenttab);
?>
