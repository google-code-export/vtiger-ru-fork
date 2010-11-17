<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the 
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
 ********************************************************************************/
/*********************************************************************************
 * $Header: /cvsroot/vtigercrm/vtiger_crm/modules/Receiptcards/Save.php,v 1.8 2005/11/17 09:43:48 jerrydgeorge Exp $
 * Description:  Saves an Account record and then redirects the browser to the 
 * defined return URL.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/logging.php');
require_once('include/database/PearDatabase.php');

function recalculateIssuecardsStock()
{
    global $adb;

    if ($_REQUEST["module"] == "Issuecards")
    {
        $sql = "UPDATE vtiger_products SET qtyinstock = 0";
        $adb->query($sql);
    }
    
    $sql_i = "SELECT vtiger_inventoryproductrel.productid, sum(vtiger_inventoryproductrel.quantity) AS qty
              FROM vtiger_issuecards 
             INNER JOIN vtiger_crmentity 
                ON vtiger_crmentity.crmid = vtiger_issuecards.issuecardid
             INNER JOIN vtiger_inventoryproductrel
                ON vtiger_inventoryproductrel.id = vtiger_issuecards.issuecardid
             WHERE vtiger_crmentity.deleted = 0 GROUP BY productid";
    $result_i = $adb->query($sql_i);
    
    while($row = $adb->fetchByAssoc($result_i))
    {
    	  $sql_u = "UPDATE vtiger_products SET qtyinstock = qtyinstock - ".$row['qty']." WHERE productid = ".$row['productid'];
    	  $adb->query($sql_u);
    }

}

recalculateIssuecardsStock();


if (file_exists("modules/Receiptcards/RecalculateStock.php") && $_REQUEST["module"] == "Issuecards")
{
    require_once("modules/Receiptcards/RecalculateStock.php");
}

?>
