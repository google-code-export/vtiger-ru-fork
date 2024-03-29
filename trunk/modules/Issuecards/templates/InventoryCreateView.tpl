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
	<td valign=top>
		<img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}">
	</td>

	<td class="showPanelBg" valign=top width=100%>
	     {*<!-- PUBLIC CONTENTS STARTS-->*}
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
		
	     <div class="small" style="padding:20px">
		
		 {if $OP_MODE eq 'edit_view'}   
			 <span class="lvtHeaderText"><font color="purple">[ {$ID} ] </font>{$NAME} -  {$APP.LBL_EDITING} {$SINGLE_MOD|@getTranslatedString:$MODULE} {$APP.LBL_INFORMATION}</span> <br>
			{$UPDATEINFO}	 
		 {/if}
		 {if $OP_MODE eq 'create_view'}
			{if $DUPLICATE neq 'true'}
			<span class="lvtHeaderText">{$APP.LBL_CREATING} {$APP.LBL_NEW} {$SINGLE_MOD|@getTranslatedString:$MODULE}</span> <br>
			{else}
			<span class="lvtHeaderText">{$APP.LBL_DUPLICATING} "{$NAME}" </span> <br>
			{/if}
		 {/if}

		 <hr noshade size=1>
		 <br> 
		
		

		{*<!-- Account details tabs -->*}
		<table border=0 cellspacing=0 cellpadding=0 width=95% align=center>
		   <tr>
			<td>
				<table border=0 cellspacing=0 cellpadding=3 width=100% class="small">
				   <tr>
					<td class="dvtTabCache" style="width:10px" nowrap>&nbsp;</td>

					{if $BLOCKS_COUNT eq 2}	
						<td width=75 style="width:15%" align="center" nowrap class="dvtSelectedCell" id="bi" onclick="fnLoadValues('bi','mi','basicTab','moreTab','inventory','{$MODULE}')"><b>{$APP.LBL_BASIC} {$APP.LBL_INFORMATION}</b></td>
                    				<td class="dvtUnSelectedCell" style="width: 100px;" align="center" nowrap id="mi" onclick="fnLoadValues('mi','bi','moreTab','basicTab','inventory','{$MODULE}')"><b>{$APP.LBL_MORE} {$APP.LBL_INFORMATION} </b></td>
                   				<td class="dvtTabCache" style="width:65%" nowrap>&nbsp;</td>
					{else}
						<td class="dvtSelectedCell" align=center nowrap>{$APP.LBL_BASIC} {$APP.LBL_INFORMATION}</td>
	                                        <td class="dvtTabCache" style="width:65%">&nbsp;</td>
					{/if}
				   <tr>
				</table>
			</td>
		   </tr>
		   <tr>
			<td valign=top align=left >

			    {foreach item=blockInfo key=divName from=$BLOCKS}
			    <!-- Basic and More Information Tab Opened -->
			    <div id="{$divName}">

				<table border=0 cellspacing=0 cellpadding=3 width=100% class="dvtContentSpace">
				   <tr>
					<!--this td is to display the entity details -->
					<td align=left>
					<!-- content cache -->

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
										<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="crmbutton small save" onclick="this.form.action.value='Save';  return validateInventory('{$MODULE}')" type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " style="width:70px" >
                                                                 		<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="crmbutton small cancel" onclick="window.history.back()" type="button" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  " style="width:70px">
									   </div>
									</td>
								   </tr>

								   {foreach key=header item=data from=$blockInfo}
								   <tr>
						         		<td colspan=4 class="detailedViewHeader">
                                             <b>{$header}</b>
								    	</td>
								   </tr>

								   <!-- Here we should include the uitype handlings-->
								   {include file="DisplayFields.tpl"}

								   <tr style="height:25px"><td>&nbsp;</td></tr>
								   {/foreach}

								   <!-- This if is added to restrict display in more tab-->
								   {if $divName eq 'basicTab'}
								   	<!-- Added to display the product details -->
									<!-- This if is added when we want to populate product details from the related entity  for ex. populate product details in new SO page when select Quote -->
									{if $AVAILABLE_PRODUCTS eq true}
										{include file="modules/Issuecards/ProductDetailsEditView.tpl"}
									{else}
										{include file="modules/Issuecards/ProductDetails.tpl"}
									{/if}
								   {/if}

								   <tr>
									<td  colspan=4 style="padding:5px">
									   <div align="center">
										<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="crmbutton small save" onclick="this.form.action.value='Save'; return validateInventory('{$MODULE}')" type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " style="width:70px" >
										<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="crmbutton small cancel" onclick="window.history.back()" type="button" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  " style="width:70px">
										<input type="hidden" name="convert_from" value="{$CONVERT_MODE}">
                                                                                <input type="hidden" name="duplicate_from" value="{$DUPLICATE_FROM}">
									   </div>
									</td>
								   </tr>
								</table>
								<!-- General details - end -->
							</td>
						   </tr>
						</table>
					</td>
				   </tr>
				</table>
							
			    </div>
			    {/foreach}
			</td>
		   </tr>
		</table>
	 </div>
	</td>
	<td align=right valign=top><img src="{'showPanelTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
   </tr>
</table>
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
