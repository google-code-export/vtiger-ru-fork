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
 * $Header$
 * Description:  TODO To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once ('Smarty_setup.php');
require_once ('data/Tracker.php');
require_once ('modules/Receiptcards/Receiptcards.php');
require_once ('modules/Quotes/Quotes.php');
require_once ('modules/SalesOrder/SalesOrder.php');
require_once ('modules/Potentials/Potentials.php');
require_once ('modules/PurchaseOrder/PurchaseOrder.php');
require_once ('include/CustomFieldUtil.php');
require_once ('include/utils/utils.php');

global $app_strings, $mod_strings, $currentModule, $log, $current_user;

$focus = CRMEntity::getInstance($currentModule);
$smarty = new vtigerCRM_Smarty();
//added to fix the issue4600
$searchurl = getBasic_Advance_SearchURL();
$smarty->assign("SEARCH", $searchurl);
//4600 ends

$currencyid = fetchCurrency($current_user->id);
$rate_symbol = getCurrencySymbolandCRate($currencyid);
$rate = $rate_symbol['rate'];
if (isset ($_REQUEST['record']) && $_REQUEST['record'] != '') 
{
		$focus->id = $_REQUEST['record'];
		$focus->mode = 'edit';
		$focus->retrieve_entity_info($_REQUEST['record'], "Receiptcards");
		$focus->name = $focus->column_fields['subject'];
} 

if (isset ($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
	$smarty->assign("DUPLICATE_FROM", $focus->id);
	$Receiptcards_associated_prod = getReceiptcardsAssociatedProducts($focus);
	$focus->id = "";
	$focus->mode = '';
}
if(empty($_REQUEST['record']) && $focus->mode != 'edit'){
	setObjectValuesFromRequest($focus);
}

global $theme;
$theme_path = "themes/" . $theme . "/";
$image_path = $theme_path . "images/";

$disp_view = getView($focus->mode);
$mode = $focus->mode;
if ($disp_view == 'edit_view')
	$smarty->assign("BLOCKS", getBlocks($currentModule, $disp_view, $mode, $focus->column_fields));
else {
	$bas_block = getBlocks($currentModule, $disp_view, $mode, $focus->column_fields, 'BAS');
	$adv_block = getBlocks($currentModule, $disp_view, $mode, $focus->column_fields, 'ADV');

	$blocks['basicTab'] = $bas_block;
	if (is_array($adv_block))
		$blocks['moreTab'] = $adv_block;

	$smarty->assign("BLOCKS", $blocks);
	$smarty->assign("BLOCKS_COUNT", count($blocks));
}

$smarty->assign("OP_MODE", $disp_view);

$smarty->assign("MODULE", $currentModule);
$smarty->assign("SINGLE_MOD", 'Receiptcards');

$smarty->assign("MOD", $mod_strings);
$smarty->assign("APP", $app_strings);

$log->info("Receiptcards view");

if (isset ($focus->name))
	$smarty->assign("NAME", $focus->name);
else
	$smarty->assign("NAME", "");

if ($focus->mode == 'edit') {
	$smarty->assign("UPDATEINFO", updateInfo($focus->id));
	$associated_prod = getReceiptcardsAssociatedProducts($focus);
	$smarty->assign("ASSOCIATEDPRODUCTS", $associated_prod);
	$smarty->assign("MODE", $focus->mode);
}
elseif (isset ($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
	$associated_prod = $Receiptcards_associated_prod;
	$smarty->assign("AVAILABLE_PRODUCTS", 'true');
	$smarty->assign("MODE", $focus->mode);
}
elseif ((isset ($_REQUEST['product_id']) && $_REQUEST['product_id'] != '') || (isset ($_REQUEST['opportunity_id']) && $_REQUEST['opportunity_id'] != '')) {
	$smarty->assign("ASSOCIATEDPRODUCTS", $associated_prod);
	$InvTotal = getInventoryTotal($_REQUEST['return_module'], $_REQUEST['return_id']);
	$smarty->assign("MODE", $focus->mode);

	//this is to display the Product Details in first row when we create new PO from Product relatedlist
	if ($_REQUEST['return_module'] == 'Products') {
		$smarty->assign("PRODUCT_ID", vtlib_purify($_REQUEST['product_id']));
		$smarty->assign("PRODUCT_NAME", getProductName($_REQUEST['product_id']));
		$smarty->assign("UNIT_PRICE", vtlib_purify($_REQUEST['product_id']));
		$smarty->assign("QTY_IN_STOCK", getPrdQtyInStck($_REQUEST['product_id']));
		$smarty->assign("VAT_TAX", getProductTaxPercentage("VAT", $_REQUEST['product_id']));
		$smarty->assign("SALES_TAX", getProductTaxPercentage("Sales", $_REQUEST['product_id']));
		$smarty->assign("SERVICE_TAX", getProductTaxPercentage("Service", $_REQUEST['product_id']));
	}
}
elseif (isset ($_REQUEST['parent_id']) && $_REQUEST['parent_id'] != '') {

  if ($_REQUEST['parent_type'] == "PurchaseOrder&action=Popup")
  {
     
      $po_focus = new PurchaseOrder();
  		$po_focus->id = $_REQUEST['parent_id'];
  		$po_focus->retrieve_entity_info($_REQUEST['parent_id'], "PurchaseOrder");
  
  		$currencyid = $po_focus->column_fields['currency_id'];
  		$rate = $po_focus->column_fields['conversion_rate'];
  
    	$associated_prod = getReceiptcardsAssociatedProducts($po_focus);
    	
    	$smarty->assign("ASSOCIATEDPRODUCTS", $associated_prod);
    	$smarty->assign("MODE", $focus2->mode);
    	
    	$focus->mode = 'edit';
  } 

  $smarty->assign("PARENT_ID", vtlib_purify($_REQUEST['parent_id']));
		
}








if (isset ($cust_fld)) {
	$smarty->assign("CUSTOMFIELD", $cust_fld);
}

$smarty->assign("ASSOCIATEDPRODUCTS", $associated_prod);

if (isset ($_REQUEST['return_module']))
	$smarty->assign("RETURN_MODULE", vtlib_purify($_REQUEST['return_module']));
else
	$smarty->assign("RETURN_MODULE", "Receiptcards");
if (isset ($_REQUEST['return_action']))
	$smarty->assign("RETURN_ACTION", vtlib_purify($_REQUEST['return_action']));
else
	$smarty->assign("RETURN_ACTION", "index");
if (isset ($_REQUEST['return_id']))
	$smarty->assign("RETURN_ID", vtlib_purify($_REQUEST['return_id']));
if (isset ($_REQUEST['return_viewname']))
	$smarty->assign("RETURN_VIEWNAME", vtlib_purify($_REQUEST['return_viewname']));
$smarty->assign("THEME", $theme);
$smarty->assign("IMAGE_PATH", $image_path);
$smarty->assign("PRINT_URL", "phprint.php?jt=" . session_id() . $GLOBALS['request_string']);
$smarty->assign("ID", $focus->id);

$smarty->assign("CALENDAR_LANG", $app_strings['LBL_JSCALENDAR_LANG']);
$smarty->assign("CALENDAR_DATEFORMAT", parse_calendardate($app_strings['NTC_DATE_FORMAT']));

//in create new Receiptcards, get all available product taxes and shipping & Handling taxes

if ($focus->mode != 'edit') {
	$tax_details = getAllTaxes('available');
	$sh_tax_details = getAllTaxes('available', 'sh');
} else {
	$tax_details = getAllTaxes('available', '', $focus->mode, $focus->id);
	$sh_tax_details = getAllTaxes('available', 'sh', 'edit', $focus->id);
}
$smarty->assign("GROUP_TAXES", $tax_details);
$smarty->assign("SH_TAXES", $sh_tax_details);

$tabid = getTabid("Receiptcards");
$validationData = getDBValidationData($focus->tab_name, $tabid);
$data = split_validationdataArray($validationData);
$category = getParentTab();
$smarty->assign("CATEGORY", $category);

$smarty->assign("VALIDATION_DATA_FIELDNAME", $data['fieldname']);
$smarty->assign("VALIDATION_DATA_FIELDDATATYPE", $data['datatype']);
$smarty->assign("VALIDATION_DATA_FIELDLABEL", $data['fieldlabel']);

global $adb;
// Module Sequence Numbering
$mod_seq_field = getModuleSequenceField($currentModule);
if ($focus->mode != 'edit' && $mod_seq_field != null) {
	$autostr = getTranslatedString('MSG_AUTO_GEN_ON_SAVE');
	$mod_seq_string = $adb->pquery("SELECT prefix, cur_id from vtiger_modentity_num where semodule = ? and active=1", array (
		$currentModule
	));
	$mod_seq_prefix = $adb->query_result($mod_seq_string, 0, 'prefix');
	$mod_seq_no = $adb->query_result($mod_seq_string, 0, 'cur_id');
	if ($adb->num_rows($mod_seq_string) == 0 || $focus->checkModuleSeqNumber($focus->table_name, $mod_seq_field['column'], $mod_seq_prefix . $mod_seq_no))
		echo '<br><font color="#FF0000"><b>' . getTranslatedString('LBL_DUPLICATE') . ' ' . getTranslatedString($mod_seq_field['label']) .
		' - ' . getTranslatedString('LBL_CLICK') . ' <a href="index.php?module=Settings&action=CustomModEntityNo&parenttab=Settings&selmodule=' . $currentModule . '">' . getTranslatedString('LBL_HERE') . '</a> ' . getTranslatedString('LBL_TO_CONFIGURE') . ' ' . getTranslatedString($mod_seq_field['label']) . '</b></font>';
	else
		$smarty->assign("MOD_SEQ_ID", $autostr);
} else {
	$smarty->assign("MOD_SEQ_ID", $focus->column_fields[$mod_seq_field['name']]);
}
// END

$smarty->assign("CURRENCIES_LIST", getAllCurrencies());
if ($focus->mode == 'edit' || $_REQUEST['isDuplicate'] == 'true') {
	$inventory_cur_info = getReceiptcardsInventoryCurrencyInfo($focus->id);
	$smarty->assign("INV_CURRENCY_ID", $inventory_cur_info['currency_id']);
} else {
	$smarty->assign("INV_CURRENCY_ID", $currencyid);
}

$check_button = Button_Check($module);
$smarty->assign("CHECK", $check_button);
$smarty->assign("DUPLICATE",vtlib_purify($_REQUEST['isDuplicate']));
if ($focus->mode == 'edit')
	$smarty->display("modules/Receiptcards/InventoryEditView.tpl");
else
	$smarty->display('modules/Receiptcards/InventoryCreateView.tpl');
	

function getReceiptcardsAssociatedProducts($focus,$seid='')
{
	global $log;
	$log->debug("Entering getReceiptcardsAssociatedProducts(".get_class($focus).",".$seid."='') method ...");
	global $adb;
	$output = '';
	global $theme,$current_user;
	
	$theme_path="themes/".$theme."/";
	$image_path=$theme_path."images/";
	$product_Detail = Array();
	
	// DG 15 Aug 2006
	// Add "ORDER BY sequence_no" to retain add order on all inventoryproductrel items
	
	$query="SELECT case when vtiger_products.productid != '' then vtiger_products.productname else vtiger_service.servicename end as productname,
         		     case when vtiger_products.productid != '' then vtiger_products.productcode else vtiger_service.service_no end as productcode, 
        			   case when vtiger_products.productid != '' then vtiger_products.unit_price else vtiger_service.unit_price end as unit_price,									
 		             case when vtiger_products.productid != '' then vtiger_products.qtyinstock else 'NA' end as qtyinstock,
 		             case when vtiger_products.productid != '' then 'Products' else 'Services' end as entitytype,
                 vtiger_inventoryproductrel.listprice, 
                 vtiger_inventoryproductrel.description AS product_description, 
                 vtiger_inventoryproductrel.* 
                 FROM vtiger_inventoryproductrel 
                 LEFT JOIN vtiger_products 
                        ON vtiger_products.productid=vtiger_inventoryproductrel.productid 
                 LEFT JOIN vtiger_service 
                        ON vtiger_service.serviceid=vtiger_inventoryproductrel.productid 
                 WHERE id=?
                 ORDER BY sequence_no"; 
	$params = array($focus->id);

	$result = $adb->pquery($query, $params);
	$num_rows=$adb->num_rows($result);
	for($i=1;$i<=$num_rows;$i++)
	{
		$hdnProductId = $adb->query_result($result,$i-1,'productid');
		$hdnProductcode = $adb->query_result($result,$i-1,'productcode');
		$productname=$adb->query_result($result,$i-1,'productname');
		$productdescription=$adb->query_result($result,$i-1,'product_description');
		$comment=$adb->query_result($result,$i-1,'comment');
		$qtyinstock=$adb->query_result($result,$i-1,'qtyinstock');
		$qty=$adb->query_result($result,$i-1,'quantity');
		$unitprice=$adb->query_result($result,$i-1,'unit_price');
		$listprice=$adb->query_result($result,$i-1,'listprice');
		$entitytype=$adb->query_result($result,$i-1,'entitytype');
		if (!empty($entitytype)) {
			$product_Detail[$i]['entityType'.$i]=$entitytype;
		}

		if($listprice == '')
			$listprice = $unitprice;
		if($qty =='')
			$qty = 1;

		//calculate productTotal
		$productTotal = $qty*$listprice;

		//Delete link in First column
		if($i != 1)
		{
			$product_Detail[$i]['delRow'.$i]="Del";
		}
		$sub_prod_query = $adb->pquery("SELECT productid from vtiger_inventorysubproductrel WHERE id=? AND sequence_no=?",array($focus->id,$i));
		$subprodid_str='';
		$subprodname_str='';
		
		if($adb->num_rows($sub_prod_query)>0){
			for($j=0;$j<$adb->num_rows($sub_prod_query);$j++){
				$sprod_id = $adb->query_result($sub_prod_query,$j,'productid');
				$sprod_name = getProductName($sprod_id);
				$str_sep = "";
				if($j>0) $str_sep = ":";
				$subprodid_str .= $str_sep.$sprod_id;
				$subprodname_str .= $str_sep." - ".$sprod_name;
			}
		}
		$subprodname_str = str_replace(":","<br>",$subprodname_str);
		
		$product_Detail[$i]['hdnProductId'.$i] = $hdnProductId;
		$product_Detail[$i]['productName'.$i]= from_html($productname);
		/* Added to fix the issue Product Pop-up name display*/
		if($_REQUEST['action'] == 'CreateSOPDF' || $_REQUEST['action'] == 'CreatePDF' || $_REQUEST['action'] == 'SendPDFMail')
			$product_Detail[$i]['productName'.$i]= htmlspecialchars($product_Detail[$i]['productName'.$i]);
		$product_Detail[$i]['hdnProductcode'.$i] = $hdnProductcode;
		$product_Detail[$i]['productDescription'.$i]= from_html($productdescription);
		$product_Detail[$i]['comment'.$i]= $comment;
		$product_Detail[$i]['qty'.$i]=$qty;
		$product_Detail[$i]['listPrice'.$i]=$listprice;
		$product_Detail[$i]['unitPrice'.$i]=$unitprice;
		$product_Detail[$i]['productTotal'.$i]=$productTotal;
		$product_Detail[$i]['subproduct_ids'.$i]=$subprodid_str;
		$product_Detail[$i]['subprod_names'.$i]=$subprodname_str;
		$discount_percent=$adb->query_result($result,$i-1,'discount_percent');
		$discount_amount=$adb->query_result($result,$i-1,'discount_amount');
		$discountTotal = '0.00';
		//Based on the discount percent or amount we will show the discount details

		//To avoid NaN javascript error, here we assign 0 initially to' %of price' and 'Direct Price reduction'(for Each Product)
		$product_Detail[$i]['discount_percent'.$i] = 0;
		$product_Detail[$i]['discount_amount'.$i] = 0;

		if($discount_percent != 'NULL' && $discount_percent != '')
		{
			$product_Detail[$i]['discount_type'.$i] = "percentage";
			$product_Detail[$i]['discount_percent'.$i] = $discount_percent;
			$product_Detail[$i]['checked_discount_percent'.$i] = ' checked';
			$product_Detail[$i]['style_discount_percent'.$i] = ' style="visibility:visible"';
			$product_Detail[$i]['style_discount_amount'.$i] = ' style="visibility:hidden"';
			$discountTotal = $productTotal*$discount_percent/100;
		}
		elseif($discount_amount != 'NULL' && $discount_amount != '')
		{
			$product_Detail[$i]['discount_type'.$i] = "amount";
			$product_Detail[$i]['discount_amount'.$i] = $discount_amount;
			$product_Detail[$i]['checked_discount_amount'.$i] = ' checked';
			$product_Detail[$i]['style_discount_amount'.$i] = ' style="visibility:visible"';
			$product_Detail[$i]['style_discount_percent'.$i] = ' style="visibility:hidden"';
			$discountTotal = $discount_amount;
		}
		else
		{
			$product_Detail[$i]['checked_discount_zero'.$i] = ' checked';
		}
		$totalAfterDiscount = $productTotal-$discountTotal;
		$product_Detail[$i]['discountTotal'.$i] = $discountTotal;
		$product_Detail[$i]['totalAfterDiscount'.$i] = $totalAfterDiscount;

		$taxTotal = '0.00';
		$product_Detail[$i]['taxTotal'.$i] = $taxTotal;

		//Calculate netprice
		$netPrice = $totalAfterDiscount+$taxTotal;
		//if condition is added to call this function when we create PO/SO/Quotes/Invoice from Product module
		$taxtype = getReceiptcardsInventoryTaxType($focus->id);
		
		if($taxtype == 'individual')
		{
			//Add the tax with product total and assign to netprice
			$netPrice = $netPrice+$taxTotal;
		}
		
		$product_Detail[$i]['netPrice'.$i] = $netPrice;

		//First we will get all associated taxes as array
		$tax_details = getTaxDetailsForProduct($hdnProductId,'all');
		//Now retrieve the tax values from the current query with the name
		for($tax_count=0;$tax_count<count($tax_details);$tax_count++)
		{
			$tax_name = $tax_details[$tax_count]['taxname'];
			$tax_label = $tax_details[$tax_count]['taxlabel'];
			$tax_value = '0.00';

			//condition to avoid this function call when create new PO/SO/Quotes/Invoice from Product module
			if($focus->id != '')
			{
				if($taxtype == 'individual')//if individual then show the entered tax percentage
					$tax_value = getInventoryProductTaxValue($focus->id, $hdnProductId, $tax_name);
				else//if group tax then we have to show the default value when change to individual tax
					$tax_value = $tax_details[$tax_count]['percentage'];
			}
			else//if the above function not called then assign the default associated value of the product
				$tax_value = $tax_details[$tax_count]['percentage'];

			$product_Detail[$i]['taxes'][$tax_count]['taxname'] = $tax_name;
			$product_Detail[$i]['taxes'][$tax_count]['taxlabel'] = $tax_label;
			$product_Detail[$i]['taxes'][$tax_count]['percentage'] = $tax_value;
		}

	}

	//set the taxtype
	$product_Detail[1]['final_details']['taxtype'] = $taxtype;

	//Get the Final Discount, S&H charge, Tax for S&H and Adjustment values
	//To set the Final Discount details
	$finalDiscount = '0.00';
	$product_Detail[1]['final_details']['discount_type_final'] = 'zero';

	$subTotal = ($focus->column_fields['hdnSubTotal'] != '')?$focus->column_fields['hdnSubTotal']:'0.00';
	
	$product_Detail[1]['final_details']['hdnSubTotal'] = $subTotal;
	$discountPercent = ($focus->column_fields['hdnDiscountPercent'] != '')?$focus->column_fields['hdnDiscountPercent']:'0.00';
	$discountAmount = ($focus->column_fields['hdnDiscountAmount'] != '')?$focus->column_fields['hdnDiscountAmount']:'0.00';

	//To avoid NaN javascript error, here we assign 0 initially to' %of price' and 'Direct Price reduction'(For Final Discount)
	$product_Detail[1]['final_details']['discount_percentage_final'] = 0;
	$product_Detail[1]['final_details']['discount_amount_final'] = 0;

	if($focus->column_fields['hdnDiscountPercent'] != '0')
	{
		$finalDiscount = ($subTotal*$discountPercent/100);
		$product_Detail[1]['final_details']['discount_type_final'] = 'percentage';
		$product_Detail[1]['final_details']['discount_percentage_final'] = $discountPercent;
		$product_Detail[1]['final_details']['checked_discount_percentage_final'] = ' checked';
		$product_Detail[1]['final_details']['style_discount_percentage_final'] = ' style="visibility:visible"';
		$product_Detail[1]['final_details']['style_discount_amount_final'] = ' style="visibility:hidden"';
	}
	elseif($focus->column_fields['hdnDiscountAmount'] != '0')
	{
		$finalDiscount = $focus->column_fields['hdnDiscountAmount'];
		$product_Detail[1]['final_details']['discount_type_final'] = 'amount';
		$product_Detail[1]['final_details']['discount_amount_final'] = $discountAmount;
		$product_Detail[1]['final_details']['checked_discount_amount_final'] = ' checked';
		$product_Detail[1]['final_details']['style_discount_amount_final'] = ' style="visibility:visible"';
		$product_Detail[1]['final_details']['style_discount_percentage_final'] = ' style="visibility:hidden"';
	}
	$product_Detail[1]['final_details']['discountTotal_final'] = $finalDiscount;

	//To set the Final Tax values
	//we will get all taxes. if individual then show the product related taxes only else show all taxes
	//suppose user want to change individual to group or vice versa in edit time the we have to show all taxes. so that here we will store all the taxes and based on need we will show the corresponding taxes
	
	$taxtotal = '0.00';
	//First we should get all available taxes and then retrieve the corresponding tax values
	$tax_details = getAllTaxes('available','','edit',$focus->id);

	for($tax_count=0;$tax_count<count($tax_details);$tax_count++)
	{
		$tax_name = $tax_details[$tax_count]['taxname'];
		$tax_label = $tax_details[$tax_count]['taxlabel'];

		//if taxtype is individual and want to change to group during edit time then we have to show the all available taxes and their default values 
		//Also taxtype is group and want to change to individual during edit time then we have to provide the asspciated taxes and their default tax values for individual products
		if($taxtype == 'group')
			$tax_percent = $adb->query_result($result,0,$tax_name);
		else
			$tax_percent = $tax_details[$tax_count]['percentage'];//$adb->query_result($result,0,$tax_name);
		
		if($tax_percent == '' || $tax_percent == 'NULL')
			$tax_percent = '0.00';
		$taxamount = ($subTotal-$finalDiscount)*$tax_percent/100;
		$taxtotal = $taxtotal + $taxamount;
		$product_Detail[1]['final_details']['taxes'][$tax_count]['taxname'] = $tax_name;
		$product_Detail[1]['final_details']['taxes'][$tax_count]['taxlabel'] = $tax_label;
		$product_Detail[1]['final_details']['taxes'][$tax_count]['percentage'] = $tax_percent;
		$product_Detail[1]['final_details']['taxes'][$tax_count]['amount'] = $taxamount;
	}
	$product_Detail[1]['final_details']['tax_totalamount'] = $taxtotal;
	
	//To set the Shipping & Handling charge
	$shCharge = ($focus->column_fields['hdnS_H_Amount'] != '')?$focus->column_fields['hdnS_H_Amount']:'0.00';
	$product_Detail[1]['final_details']['shipping_handling_charge'] = $shCharge;

	//To set the Shipping & Handling tax values
	//calculate S&H tax
	$shtaxtotal = '0.00';
	//First we should get all available taxes and then retrieve the corresponding tax values
	$shtax_details = getAllTaxes('available','sh','edit',$focus->id);
	
	//if taxtype is group then the tax should be same for all products in vtiger_inventoryproductrel table
	for($shtax_count=0;$shtax_count<count($shtax_details);$shtax_count++)
	{
		$shtax_name = $shtax_details[$shtax_count]['taxname'];
		$shtax_label = $shtax_details[$shtax_count]['taxlabel'];
		$shtax_percent = '0.00';
		//if condition is added to call this function when we create PO/SO/Quotes/Invoice from Product module
		$shtax_percent = getInventorySHTaxPercent($focus->id,$shtax_name);
		$shtaxamount = $shCharge*$shtax_percent/100;
		$shtaxtotal = $shtaxtotal + $shtaxamount;
		$product_Detail[1]['final_details']['sh_taxes'][$shtax_count]['taxname'] = $shtax_name;
		$product_Detail[1]['final_details']['sh_taxes'][$shtax_count]['taxlabel'] = $shtax_label;
		$product_Detail[1]['final_details']['sh_taxes'][$shtax_count]['percentage'] = $shtax_percent;
		$product_Detail[1]['final_details']['sh_taxes'][$shtax_count]['amount'] = $shtaxamount;
	}
	$product_Detail[1]['final_details']['shtax_totalamount'] = $shtaxtotal;

	//To set the Adjustment value
	$adjustment = ($focus->column_fields['txtAdjustment'] != '')?$focus->column_fields['txtAdjustment']:'0.00';
	$product_Detail[1]['final_details']['adjustment'] = $adjustment;

	//To set the grand total
	$grandTotal = ($focus->column_fields['hdnGrandTotal'] != '')?$focus->column_fields['hdnGrandTotal']:'0.00';
	$product_Detail[1]['final_details']['grandTotal'] = $grandTotal;

	$log->debug("Exiting getReceiptcardsAssociatedProducts method ...");

	return $product_Detail;

}


?>
