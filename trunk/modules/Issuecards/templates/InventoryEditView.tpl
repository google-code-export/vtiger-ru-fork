{*<!--

/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/

-->*}

{*<!-- module header -->*}

<link rel="stylesheet" type="text/css" media="all" href="jscalendar/calendar-win2k-cold-1.css">
<script type="text/javascript" src="jscalendar/calendar.js"></script>
<script type="text/javascript" src="jscalendar/lang/calendar-{$CALENDAR_LANG}.js"></script>
<script type="text/javascript" src="jscalendar/calendar-setup.js"></script>
<script type="text/javascript" src="include/js/Inventory.js"></script>
<script type="text/javascript" src="modules/Services/Services.js"></script>
<script type="text/javascript">

function sensex_info()
{ldelim}
        var Ticker = $('tickersymbol').value;
        if(Ticker!='')
        {ldelim}
                $("vtbusy_info").style.display="inline";
                new Ajax.Request(
                      'index.php',
                      {ldelim}queue: {ldelim}position: 'end', scope: 'command'{rdelim},
                                method: 'post',
                                postBody: 'module={$MODULE}&action=Tickerdetail&tickersymbol='+Ticker,
                                onComplete: function(response) {ldelim}
                                        $('autocom').innerHTML = response.responseText;
                                        $('autocom').style.display="block";
                                        $("vtbusy_info").style.display="none";
                                {rdelim}
                        {rdelim}
                );
        {rdelim}
{rdelim}

</script>

		{include file='Buttons_List1.tpl'}	

{*<!-- Contents -->*}
<table border=0 cellspacing=0 cellpadding=0 width=98% align=center>
   <tr>
	<td valign=top><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>

	<td class="showPanelBg" valign=top width=100%>
		{*<!-- PUBLIC CONTENTS STARTS-->*}
		<div class="small" style="padding:20px">
		
			{if $OP_MODE eq 'edit_view'}
			   	{assign var="USE_ID_VALUE" value=$MOD_SEQ_ID}
		  		{if $USE_ID_VALUE eq ''} {assign var="USE_ID_VALUE" value=$ID} {/if}			
			   
				<span class="lvtHeaderText"><font color="purple">[ {$USE_ID_VALUE} ] </font>{$NAME} - {$APP.LBL_EDITING} {$MOD[$SINGLE_MOD]} {$APP.LBL_INFORMATION}</span> <br>
				{$UPDATEINFO}	 
			{/if}
			{if $OP_MODE eq 'create_view'}
				<span class="lvtHeaderText">{$APP.LBL_CREATING} {$MOD[$SINGLE_MOD]}</span> <br>
			{/if}

			<hr noshade size=1>
			<br> 
		
			<form id="frmEditView" name="EditView" method="POST" action="index.php" onSubmit="settotalnoofrows();calcTotal();VtigerJS_DialogBox.block();">
      	    <input type="hidden" name="hidImagePath" id="hidImagePath" value="{$IMAGE_PATH}"/>
           	<input type="hidden" name="convertmode">
    		<input type="hidden" name="pagenumber" value="{$smarty.request.start|@vtlib_purify}">
            <input type="hidden" name="module" value="{$MODULE}">
            <input type="hidden" name="record" value="{$ID}">
            <input type="hidden" name="mode" value="{$MODE}">
            <input type="hidden" name="action">
            <input type="hidden" name="parenttab" value="{$CATEGORY}">
            <input type="hidden" name="return_module" value="{$RETURN_MODULE}">
            <input type="hidden" name="return_id" value="{$RETURN_ID}">
            <input type="hidden" name="return_action" value="{$RETURN_ACTION}">
            <input type="hidden" name="return_viewname" value="{$RETURN_VIEWNAME}">

			{*<!-- Account details tabs -->*}
			<table border=0 cellspacing=0 cellpadding=0 width=95% align=center>
			   <tr>
				<td>
					<table border=0 cellspacing=0 cellpadding=3 width=100% class="small">
					   <tr>
						<td class="dvtTabCache" style="width:10px" nowrap>&nbsp;</td>
                                        	<td class="dvtSelectedCell" align=center nowrap>{$MOD[$SINGLE_MOD]} {$APP.LBL_INFORMATION}</td>
	                                        <td class="dvtTabCache" style="width:10px">&nbsp;</td>
                	                        <td class="dvtTabCache" style="width:100%">&nbsp;</td>
					   </tr>
					</table>
				</td>
			   </tr>
			   <tr>
				<td valign=top align=left >
					<table border=0 cellspacing=0 cellpadding=3 width=100% class="dvtContentSpace">
					   <tr>

						<td align=left style="padding:10px;border-right:1px #CCCCCC;" width=80%>
							{*<!-- content cache -->*}
					
							<table border=0 cellspacing=0 cellpadding=0 width=100%>
							   <tr>
								<td id ="autocom"></td>
							   </tr>
							   <tr>
								<td style="padding:10px">
								<!-- General details -->
									<table border=0 cellspacing=0 cellpadding=0 width=100% class="small">
									   <tr>
										<td  colspan=4 style="padding:5px">
										   <div align="center">
											<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="crmbutton small save" onclick="this.form.action.value='Save'; displaydeleted(); return validateInventory('{$MODULE}')" type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " style="width:70px" >
											<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="crmbutton small cancel" onclick="window.history.back()" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}  " style="width:70px">
										   </div>
										</td>
									   </tr>

									   <!-- included to handle the edit fields based on ui types -->
									   {foreach key=header item=data from=$BLOCKS}
									      <tr>
        									  <td colspan=4 class="detailedViewHeader">
        										  <b>{$header}</b>
        									  </td>
									      </tr>

										<!-- Handle the ui types display -->
										{include file="DisplayFields.tpl"}

									      <tr style="height:25px"><td>&nbsp;</td></tr>

									   {/foreach}


									   <!-- Added to display the Product Details in Inventory-->
									   <tr>
										<td colspan=4>
											{include file="modules/Issuecards/ProductDetailsEditView.tpl"}
										</td>
									   </tr>

									   <tr>
										<td  colspan=4 style="padding:5px">
											<div align="center">
												<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="crmbutton small save" onclick="this.form.action.value='Save';  displaydeleted();return validateInventory('{$MODULE}')" type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " style="width:70px" >
												<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="crmbutton small cancel" onclick="window.history.back()" type="button" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  " style="width:70px">
											</div>
										</td>
									   </tr>
									</table>
								</td>
							   </tr>
							</table>
						</td>
						<!-- Inventory Actions - ends -->
					   </tr>
					</table>
				</td>
			   </tr>
			</table>
		</div>
	</td>
   </tr>
</table>
<input name='search_url' id="search_url" type='hidden' value='{$SEARCH}'>
</form>

<!-- This div is added to get the left and top values to show the tax details-->
<div id="tax_container" style="display:none; position:absolute; z-index:1px;"></div>

<script>	
        var fieldname = new Array({$VALIDATION_DATA_FIELDNAME})

        var fieldlabel = new Array({$VALIDATION_DATA_FIELDLABEL})

        var fielddatatype = new Array({$VALIDATION_DATA_FIELDDATATYPE})

	var product_labelarr = {ldelim}CLEAR_COMMENT:'{$APP.LBL_CLEAR_COMMENT}',
				DISCOUNT:'{$APP.LBL_DISCOUNT}',
				TOTAL_AFTER_DISCOUNT:'{$APP.LBL_TOTAL_AFTER_DISCOUNT}',
				TAX:'{$APP.LBL_TAX}',
				ZERO_DISCOUNT:'{$APP.LBL_ZERO_DISCOUNT}',
				PERCENT_OF_PRICE:'{$APP.LBL_OF_PRICE}',
				DIRECT_PRICE_REDUCTION:'{$APP.LBL_DIRECT_PRICE_REDUCTION}'{rdelim};

	var ProductImages=new Array();
	var count=0;
	function delRowEmt(imagename)
	{ldelim}
		ProductImages[count++]=imagename;
		multi_selector.current_element.disabled = false;
		multi_selector.count--;
	{rdelim}
	function displaydeleted()
	{ldelim}
		if(ProductImages.length > 0)
			document.EditView.del_file_list.value=ProductImages.join('###');
	{rdelim}
</script>

<!-- vtlib customization: Help information assocaited with the fields -->
{if $FIELDHELPINFO}
<script type='text/javascript'>
{literal}var fieldhelpinfo = {}; {/literal}
{foreach item=FIELDHELPVAL key=FIELDHELPKEY from=$FIELDHELPINFO}
	fieldhelpinfo["{$FIELDHELPKEY}"] = "{$FIELDHELPVAL}";
{/foreach}
</script>
{/if}
<!-- END -->
