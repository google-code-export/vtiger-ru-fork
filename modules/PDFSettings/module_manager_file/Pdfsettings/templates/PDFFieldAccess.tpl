<script language="JavaScript" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/menu.js"></script>
<script type="text/javascript" src="include/js/ajaxtab.js"></script>
<script type="text/javascript" src="modules/Pdfsettings/tab-view.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/{php} echo $_SESSION['authenticated_user_language'];{/php}.lang.js"></script>
<script language="JavaScript" type="text/javascript" src="modules/Pdfsettings/language/{php} echo $_SESSION['authenticated_user_language'];{/php}.lang.js"></script>
<link rel="stylesheet" href="themes/softed/tab-view.css" type="text/css">
<link rel="stylesheet" href="themes/softed/style.css" type="text/css">
<br>
<form enctype="multipart/form-data" action="index.php?module=Pdfsettings&action=UpdatePDFSettings&parenttab=Tools" id="pdfsettings" name="pdfsettings" onsubmit="return checkvalues(pdfsettings); window.close();" method="post" >
	<input type="hidden" name="module" value="Pdfsettings">
	<input type="hidden" name="parenttab" value="Tools">
	<input type="hidden" name="fld_module" id="fld_module" value="{$MODULEVIEW }">
	<input type="hidden" name="action" id="action" value="UpdatePDFSettings">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
		<tr>
	        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
				<br>
				<div align='left'>
					<table border=0 cellspacing=0 cellpadding=5 width="100%" class="settingsSelUITopLine">
							<tr>
								<td width=50 rowspan=2 valign="top"><img src="modules/Pdfsettings/pdfconfig.gif" alt="{$MOD.LBL_MODULE_NAME}" width="48" height="48" border=0 title="{$MOD.LBL_MODULE_NAME}"></td>
								<td colspan=2 class=heading2 valign=bottom><b>{$MOD.LBL_PDF_CONFIGURATOR}</b></td>
								<td rowspan=2 class="small" align=right>&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" class="small">{$MOD.LBL_PDFCONFIGURATOR_DESCRIPTION}</td>
							</tr>
					</table>
					{if $MODULEVIEW==1} 
						<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
						<tr>
							<td class="small" align=right>
								<input id="edit" name="edit" class="crmButton small edit" title="{$APP.LBL_EDIT_BUTTON}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" onclick="enableFields(pdfsettings);" type="button"  value="  {$APP.LBL_EDIT_BUTTON_LABEL}  ">
							</td>
						</tr>
						</table>
					{/if} 
					<table width="100%" border="0" cellpadding="5" cellspacing="0" class="listTableTopButtons">
			                <tr>
				        		<td  style="padding-left:5px;" class="big">{$CMOD.LBL_SELECT_SCREEN}&nbsp; 
									<select name="displaymodul" id="displaymodul" class="detailedViewTextBox" style="width:30%;"  onchange="tableswitch(this.value);">
										{foreach item=module from=$FIELD_INFO}
											{if $module == $DEF_MODULE}
												<option selected value='{$module}'>{$APP.$module}</option>
											{else}		
												<option value='{$module}' >{$APP.$module}</option>
											{/if} 
										{/foreach}
									</select>
						    	</td>
			                </tr>
					</table>
					<!-- Quotes start here -->
					<div id="Quotes" style="display:box" class="box">
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
							<tr>
								<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
									<br>
									<div align=center>
										<!-- DISPLAY -->
										<table border=0 cellspacing=0 cellpadding=5 width="100%" >
											<tr>
												<td>
													<div id="configurationtabs">
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" >
																<tr>
																	<td valign="top" align="left" class="bigtxt">{$MOD.LBL_PDFCONFIGURATOR_QUOTES}</td>
																</tr>
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top"  class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_LANGUAGES}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="50%">
																								<select class="detailedViewTextBox" style="width:30%;" id="Quotes_pdflang_qv" name="Quotes_pdflang_qv" {$CHANGEPERMISSION.Quotes.pdflang}>
																									{html_options values=$LANGUAGEKEYS.Quotes output=$LANGUAGES.Quotes selected=$LANGSELECTED.Quotes}
																								</select>
																							</td>
																							{if $MODULEVIEW == 1} 
																							<td class="smalltxt" align="right" >
																								<input type="checkbox" id="Quotes_pdflang_perm"  name="Quotes_pdflang_perm" {$EDITPERMISSION.Quotes.pdflang} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top"  class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PAPERFORMAT}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="50%">
																								<select class="detailedViewTextBox" style="width:30%;" id="Quotes_paperf_qv" name="Quotes_paperf_qv" {$CHANGEPERMISSION.Quotes.paperf}>
																									{html_options values=$PAPERFORMAT.Quotes output=$PAPERFORMAT.Quotes selected=$PAPERSELECTED.Quotes}
																								</select>
																							</td>
																							{if $MODULEVIEW== 1} 
																							<td class="smalltxt" align="right" >
																								<input type="checkbox" id="Quotes_paperf_perm"  name="Quotes_paperf_perm" {$EDITPERMISSION.Quotes.paperf} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_FONTS}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" width="100%">
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td  class="smalltxt" width="80%">
																								<select id="Quotes_fontid_qv" name="Quotes_fontid_qv" class="detailedViewTextBox"  style="width:40%;" {$CHANGEPERMISSION.Quotes.fontid}>
																									{html_options selected=$SELECTEDFONTID.Quotes size=1 values=$FONTIDS.Quotes output=$FONTLIST.Quotes }
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" width="20%">
																								<input type="checkbox" name="Quotes_fontid_perm" id="Quotes_fontid_perm" {$EDITPERMISSION.Quotes.fontid} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" class="listRow">
																			<tr>
																				<td align="left" valign="top" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_FONTSSIZE}</td>
																			</tr>
																			<tr>
																				<td align='left'>
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_FONTSSIZE_HEADER}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="Quotes_fontsizeheader_perm" name="Quotes_fontsizeheader_perm" {$EDITPERMISSION.Quotes.fontsizeheader} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_FONTSSIZE_ADDRESS}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="Quotes_fontsizeaddress_perm" name="Quotes_fontsizeaddress_perm" {$EDITPERMISSION.Quotes.fontsizeaddress} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_FONTSSIZE_BODY}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="Quotes_fontsizebody_perm" name="Quotes_fontsizebody_perm"{$EDITPERMISSION.Quotes.fontsizebody} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_FONTSSIZE_FOOTER}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="Quotes_fontsizefooter_perm" name="Quotes_fontsizefooter_perm" {$EDITPERMISSION.Quotes.fontsizefooter} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																						</tr>
																						<tr valign="top">
																								<td class="smalltxt">
																									<select name="Quotes_fontsizeheader_qv" class="detailedViewTextBox"  style="width:25%;" id="Quotes_fontsizeheader_qv" {$CHANGEPERMISSION.Quotes.fontsizeheader}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEHEADER.Quotes}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="Quotes_fontsizeaddress_qv" class="detailedViewTextBox"  style="width:25%;" id="Quotes_fontsizeaddress_qv" {$CHANGEPERMISSION.Quotes.fontsizeaddress}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEADDRESS.Quotes}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="Quotes_fontsizebody_qv" class="detailedViewTextBox"  style="width:25%;" id="Quotes_fontsizebody_qv" {$CHANGEPERMISSION.Quotes.fontsizebody}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEBODY.Quotes}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="Quotes_fontsizefooter_qv" class="detailedViewTextBox" style="width:25%;" id="Quotes_fontsizefooter_qv"{$CHANGEPERMISSION.Quotes.fontsizefooter}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEFOOTER.Quotes}
																									</select>
																								</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PRINT_LOGO}&nbsp;&nbsp;
																					<input type="checkbox" id="Quotes_logoradio_qc" name="Quotes_logoradio_qc" {$LOGORADIO.Quotes} {$CHANGEPERMISSION.Quotes.logoradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="Quotes_logoradio_perm" name="Quotes_logoradio_perm" {$EDITPERMISSION.Quotes.logoradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DATE}
																					<select name="Quotes_dateused_qv" class="detailedViewTextBox"  style="width:20%;" id="Quotes_dateused_qv" {$CHANGEPERMISSION.Quotes.dateused}>
																						{html_options values=$DATEUSED.Quotes output= $DATEUSEDNAME selected=$DATEUSEDSELECTED.Quotes}
																					</select>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="Quotes_dateused_perm" id="Quotes_dateused_perm" {$EDITPERMISSION.Quotes.dateused} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_OWNER}
																					<input type="checkbox" id="Quotes_owner_qc" name="Quotes_owner_qc" {$OWNER.Quotes} {$CHANGEPERMISSION.Quotes.owner}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="Quotes_owner_perm" name="Quotes_owner_perm" {$EDITPERMISSION.Quotes.owner} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_OWNER_PH}
																					<input type="checkbox" id="Quotes_ownerphone_qc" name="Quotes_ownerphone_qc" {$OWNERPHONE.Quotes} {$CHANGEPERMISSION.Quotes.ownerphone}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="Quotes_ownerphone_perm" name="Quotes_ownerphone_perm" {$EDITPERMISSION.Quotes.ownerphone} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_SPACE_HEADER}&nbsp;&nbsp;
																					<select name="Quotes_spaceheadline_qv" class="detailedViewTextBox"   style="width:7%;" id="Quotes_spaceheadline_qv" {$CHANGEPERMISSION.Quotes.spaceheadline}>
																						{html_options values=$HEADERSPACE output=$HEADERSPACE selected=$HEADERSPACESELECTED}
																					</select>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="Quotes_spaceheadline_perm" id="Quotes_spaceheadline_perm"  {$EDITPERMISSION.Quotes.spaceheadline} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PRINT_FOOTER}&nbsp;&nbsp;
																					<input type="checkbox" name="Quotes_footerradio_qc" id="Quotes_footerradio_qc" {$FOOTERRADIO.Quotes} {$CHANGEPERMISSION.Quotes.footerradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="Quotes_footerradio_perm" id="Quotes_footerradio_perm"  {$EDITPERMISSION.Quotes.footerradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PRINT_FOOTERPAGE}&nbsp;&nbsp;
																					<input type="checkbox" name="Quotes_pageradio_qc" id="Quotes_pageradio_qc" {$FOOTERPAGERADIO.Quotes} {$CHANGEPERMISSION.Quotes.pageradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_pageradio_perm" id="Quotes_pageradio_perm"  {$EDITPERMISSION.Quotes.pageradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_SUMMARY}&nbsp;&nbsp;
																					<input type="checkbox" name="Quotes_summaryradio_qc" id="Quotes_summaryradio_qc" {$SUMMARYRADIO.Quotes} {$CHANGEPERMISSION.Quotes.summaryradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_summaryradio_perm" id="Quotes_summaryradio_perm"  {$EDITPERMISSION.Quotes.summaryradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%">
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td  valign="top" class="smalltxt">{$PDFLANGUAGEARRAYQUOTES.TAX_GROUP}</td>
																			</tr>
																			<tr valign="top">
																				<td width="80%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr >
																							{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.Quotes} 
																								<td  class="bigtxt" valign="top" id="Quotes.{$grouptax.taxtype}.{$checkboxtype}">
																									{if ($grouptax.selected == 'checked="checked"' and $grouptax.enabled == '1')}
																										{$PDFLANGUAGEARRAYQUOTES.$checkboxtype}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td  class="smalltxt" align="right">
																								<input type="checkbox" name="Quotes_gcolumns_perm" id="Quotes_gcolumns_perm"  {$EDITPERMISSION.Quotes.gcolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="qcheckboxes_group"  valign="top" class="smalltxt" width="20%">
																					{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.Quotes}
																						{if $grouptax.enabled == '1'}
																							<input type="checkbox" name="Quotes.{$grouptax.taxtype}.{$checkboxtype}" id="{$checkboxtype}" {$grouptax.active} {$grouptax.selected} {$CHANGEPERMISSION.Quotes.gcolumns} onclick="preview(this,'Quotes.{$grouptax.taxtype}.{$checkboxtype}','{$PDFLANGUAGEARRAYQUOTES.$checkboxtype}');">&nbsp;{$PDFLANGUAGEARRAYQUOTES.$checkboxtype}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT_NAME} 
																					<input type="checkbox" name="Quotes_gprodname_qc"  id="Quotes_gprodname_qc"  {$GPRODDETAILS.Quotes.0} {$CHANGEPERMISSION.Quotes.gprodname}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_gprodname_perm" id="Quotes_gprodname_perm"  {$EDITPERMISSION.Quotes.gprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="Quotes_gproddes_qc"  id="Quotes_gproddes_qc"  {$GPRODDETAILS.Quotes.1} {$CHANGEPERMISSION.Quotes.gproddes}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_gproddes_perm" id="Quotes_gproddes_perm"  {$EDITPERMISSION.Quotes.gproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="Quotes_gprodcom_qc"  id="Quotes_gprodcom_qc"  {$GPRODDETAILS.Quotes.2} {$CHANGEPERMISSION.Quotes.gprodcom}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_gprodcom_perm" id="Quotes_gprodcom_perm"  {$EDITPERMISSION.Quotes.gprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td valign="top" class="smalltxt">{$PDFLANGUAGEARRAYQUOTES.TAX_INDIVIDUAL}hugo</td>
																			</tr>
																			<tr valign="top">
																				<td width="80%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr >
																							{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.Quotes}
																								<td  class="bigtxt" valign="top" id="Quotes.{$indivitax.taxtype}.{$checkboxtypei}">
																									{if ($indivitax.selected == 'checked="checked"' and $indivitax.enabled == '1')}
																										{$PDFLANGUAGEARRAYQUOTES.$checkboxtypei}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td class="smalltxt" align="right">
																								<input type="checkbox" name="Quotes_icolumns_perm" id="Quotes_icolumns_perm"  {$EDITPERMISSION.Quotes.icolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="Quotes_checkboxes_individual"  valign="top" class="smalltxt" width="20%">
																					{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.Quotes}
																						{if $indivitax.enabled == '1'}
																							<input type="checkbox" name="Quotes.{$indivitax.taxtype}.{$checkboxtypei}" id="{$checkboxtypei}" {$indivitax.active} {$indivitax.selected} {$CHANGEPERMISSION.Quotes.icolumns} onclick="preview(this,'Quotes.{$indivitax.taxtype}.{$checkboxtypei}','{$PDFLANGUAGEARRAYQUOTES.$checkboxtypei}');">&nbsp;{$PDFLANGUAGEARRAYQUOTES.$checkboxtypei}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT_NAME}
																					<input type="checkbox" name="Quotes_iprodname_qc"  id="Quotes_iprodname_qc"  {$IPRODDETAILS.Quotes.0} {$CHANGEPERMISSION.Quotes.iprodname}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_iprodname_perm" id="Quotes_iprodname_perm"  {$EDITPERMISSION.Quotes.iprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="Quotes_iproddes_qc"  id="Quotes_iproddes_qc"  {$IPRODDETAILS.Quotes.1} {$CHANGEPERMISSION.Quotes.iproddes}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_iproddes_perm" id="Quotes_iproddes_perm" {$EDITPERMISSION.Quotes.iproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEQUOTES.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="Quotes_iprodcom_qc"  id="Quotes_iprodcom_qc"  {$IPRODDETAILS.Quotes.2} {$CHANGEPERMISSION.Quotes.iprodcom}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Quotes_iprodcom_perm" id="Quotes_iprodcom_perm"  {$EDITPERMISSION.Quotes.iprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
													</div>
												</td>
											</tr>
										</table>
										<br><br><br>
										<table>
											<tr>
											{if $MODULEVIEW==1} 
												<td class="small" align='left' nowrap width="100%">
													<input class="crmButton small save" id="saveg" name="saveg" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit" action="index.php?module=Pdfsettings&action=UpdatePDFSettings&parenttab=Tools"   value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
													<input class="crmButton small cancel" id="cancelg" name="cancelg" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="disableFields(pdfsettings);" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
												</td>
											{else}
												<td class="small" align='left' nowrap width="100%">
												<input class="crmButton small save" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit" name="buttonsave" value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
												<input class="crmButton small cancel" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="self.close();" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
												</td>
											{/if}
											</tr>
										</table>
										<script type="text/javascript">
											initTabs('configurationtabs',Array(pdfconfig_arr.TAB_GENERAL,pdfconfig_arr.TAB_GROUP,pdfconfig_arr.TAB_INDIVIDUAL),0,750,515);
										</script>
									</div>
								</td>
							</tr>
						</table>
						<br>
						<br>
						<table border=0 cellspacing=0 cellpadding=5 width="100%" >
							<tr><td class="small" ><div align=right><a href="#top">{$MOD.LBL_SCROLL}</a></div></td></tr>
						</table>
					</div>
					<!-- Invoice start here -->
					<div id="Invoice" style="display:none" class="box">
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
							<tr>
								<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
								<br>
									<div align=center>
										<!-- DISPLAY -->
										<table border=0 cellspacing=0 cellpadding=5 width="100%" >
											<tr>
												<td>
													<div id="configurationtabs_invoice">
														<div class="dhtmlgoodies_aTab">
															<table border=0 cellspacing=0 cellpadding=10 width="100%" >
																<tr>
																	<td valign="top"  align="left"  class="bigtxt">{$MOD.LBL_PDFCONFIGURATOR_INVOICES}</td>
																</tr>
																<tr>
																	<td  align="left" >
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_LANGUAGES}</td>
																			</tr>
																			<tr>
																				<td class="small" align="left" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt"  align="left" width="50%" >
																								<select class="detailedViewTextBox" style="width:30%;" name="Invoice_pdflang_iv" id="Invoice_pdflang_iv" {$CHANGEPERMISSION.Invoice.pdflang}>
																									{html_options values=$LANGUAGEKEYS.Invoice output=$LANGUAGES.Invoice selected=$LANGSELECTED.Invoice}
																								</select>
																							</td>
																							{if $MODULEVIEW==1}
																							<td class="smalltxt" align="right"  width="50%" >
																								<input type="checkbox" name="Invoice_pdflang_perm" id="Invoice_pdflang_perm" {$EDITPERMISSION.Invoice.pdflang} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top"  class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PAPERFORMAT}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="50%">
																								<select class="detailedViewTextBox" style="width:30%;" id="Invoice_paperf_iv" name="Invoice_paperf_iv" {$CHANGEPERMISSION.Invoice.paperf}>
																									{html_options values=$PAPERFORMAT.Invoice output=$PAPERFORMAT.Invoice selected=$PAPERSELECTED.Invoice}
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" >
																								<input type="checkbox" id="Invoice_paperf_perm"  name="Invoice_paperf_perm" {$EDITPERMISSION.Invoice.paperf} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_FONTS}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="80%">
																								<select name="Invoice_fontid_iv" class="detailedViewTextBox" id="Invoice_fontid_iv" style="width:40%;" >
																									{html_options  selected=$SELECTEDFONTID.Invoice values=$FONTIDS.Invoice output=$FONTLIST.Invoice}
																								</select>
																							</td>
																							{if $MODULEVIEW==1}
																							<td class="smalltxt" align="right" width="20%">
																								<input type="checkbox" name="Invoice_fontid_perm" id="Invoice_fontid_perm" {$EDITPERMISSION.Invoice.fontid} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" class="listRow">
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_FONTSSIZE}</td>
																			</tr>
																			<tr>
																				<td>
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_FONTSSIZE_HEADER}</b>
																							{if $MODULEVIEW==1}
																								<input type="checkbox" name="Invoice_fontsizeheader_perm" id="Invoice_fontsizeheader_perm" {$EDITPERMISSION.Invoice.fontsizeheader} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_FONTSSIZE_ADDRESS}</b>
																							{if $MODULEVIEW==1}
																								<input type="checkbox" name="Invoice_fontsizeaddress_perm" id="Invoice_fontsizeaddress_perm" {$EDITPERMISSION.Invoice.fontsizeaddress} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_FONTSSIZE_BODY}</b>
																							{if $MODULEVIEW==1}
																								<input type="checkbox" name="Invoice_fontsizebody_perm" id="Invoice_fontsizebody_perm"  {$EDITPERMISSION.Invoice.fontsizebody} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_FONTSSIZE_FOOTER}</b>
																							{if $MODULEVIEW==1}
																								<input type="checkbox" name="Invoice_fontsizefooter_perm" id="Invoice_fontsizefooter_perm"  {$EDITPERMISSION.Invoice.fontsizefooter} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																						</tr>
																						<tr valign="top">
																							<td class="smalltxt">
																								<select name="Invoice_fontsizeheader_iv" class="detailedViewTextBox"  style="width:25%;" id="Invoice_fontsizeheader_iv" >
																									{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEHEADER.Invoice}
																								</select>
																							</td>
																							<td  class="smalltxt">
																								<select name="Invoice_fontsizeaddress_iv" class="detailedViewTextBox"  style="width:25%;" id="Invoice_fontsizeaddress_iv" >
																									{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEADDRESS.Invoice}
																								</select>
																							</td>
																							<td  class="smalltxt">
																								<select name="Invoice_fontsizebody_iv" class="detailedViewTextBox"  style="width:25%;" id="Invoice_fontsizebody_iv" >
																									{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEBODY.Invoice}
																								</select>
																							</td>
																							<td  class="smalltxt">
																								<select name="Invoice_fontsizefooter_iv" class="detailedViewTextBox" style="width:25%;" id="Invoice_fontsizefooter_iv">
																									{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEFOOTER.Invoice}
																								</select>
																							</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td  align="left" >
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PRINT_LOGO}&nbsp;&nbsp;
																					<input type="checkbox" name="Invoice_logoradio_ic" id="Invoice_logoradio_ic" {$LOGORADIO.Invoice} > {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_logoradio_perm" id="Invoice_logoradio_perm"  {$EDITPERMISSION.Invoice.logoradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_OWNER}
																					<input type="checkbox" id="Invoice_owner_ic" name="Invoice_owner_ic" {$OWNER.Invoice} {$CHANGEPERMISSION.Invoice.owner}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="Invoice_owner_perm" name="Invoice_owner_perm" {$EDITPERMISSION.Invoice.owner} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEQUOTES.LBL_OWNER_PH}
																					<input type="checkbox" id="Invoice_ownerphone_ic" name="Invoice_ownerphone_ic" {$OWNERPHONE.Invoice} {$CHANGEPERMISSION.Invoice.ownerphone}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="Invoice_ownerphone_perm" name="Invoice_ownerphone_perm" {$EDITPERMISSION.Invoice.ownerphone} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_PONAME}&nbsp;&nbsp;
																					<input type="checkbox" name="Invoice_poname_ic" id="Invoice_poname_perm"  {$PONAME.Invoice} {$CHANGEPERMISSION.Invoice.poname}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" name="Invoice_poname_perm" id="Invoice_poname_perm"  {$EDITPERMISSION.Invoice.poname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CLIENTID}&nbsp;&nbsp;
																					<input type="checkbox" name="Invoice_clientid_ic" id="Invoice_clientid_perm"  {$CLIENTID.Invoice} {$CHANGEPERMISSION.Invoice.clientid}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" name="Invoice_clientid_perm" id="Invoice_clientid_perm"  {$EDITPERMISSION.Invoice.clientid} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_SPACE_HEADER}&nbsp;&nbsp;
																					<select name="Invoice_spaceheadline_iv" class="detailedViewTextBox"   style="width:7%;" id="Invoice_spaceheadline_iv" >
																						{html_options values=$HEADERSPACE output=$HEADERSPACE selected=$HEADERSPACESELECTED}
																					</select>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" name="Invoice_spaceheadline_perm" id="Invoice_spaceheadline_perm"  {$EDITPERMISSION.Invoice.spaceheadline} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PRINT_FOOTER}&nbsp;&nbsp;
																					<input type="checkbox" name="Invoice_footerradio_ic" id="Invoice_footerradio_ic" {$FOOTERRADIO.Invoice} > {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" name="Invoice_footerradio_perm" id="Invoice_footerradio_perm"  {$EDITPERMISSION.Invoice.footerradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PRINT_FOOTERPAGE}&nbsp;&nbsp;
																					<input type="checkbox" name="Invoice_pageradio_ic" id="Invoice_pageradio_ic" {$FOOTERPAGERADIO.Invoice} > {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" name="Invoice_pageradio_perm" id="Invoice_pageradio_perm" {$EDITPERMISSION.Invoice.pageradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td  align="left" >
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_SUMMARY}&nbsp;&nbsp;
																					<input type="checkbox" name="Invoice_summaryradio_ic" id="Invoice_summaryradio_ic" {$SUMMARYRADIO.Invoice} > {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_summaryradio_perm" id="Invoice_summaryradio_perm"  {$EDITPERMISSION.Invoice.summaryradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab">
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td  align="left" >
																		<table border=0 cellspacing=0 cellpadding=0 width="100%">
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td  valign="top" class="smalltxt">{$PDFLANGUAGEARRAYINVOICES.TAX_GROUP}</td>
																			</tr>
																			<tr valign="top">
																				<td width="80%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr>
																							{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.Invoice} 
																								<td  class="bigtxt" valign="top" id="Invoice.{$grouptax.taxtype}.{$checkboxtype}">
																									{if ($grouptax.selected == 'checked="checked"' and $grouptax.enabled == '1')}
																										{$PDFLANGUAGEARRAYINVOICES.$checkboxtype}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td class="smalltxt" align="right">
																								<input type="checkbox" name="Invoice_gcolumns_perm" id="Invoice_gcolumns_perm"  {$EDITPERMISSION.Invoice.gcolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="Invoice_checkboxes_group"  valign="top" class="smalltxt" width="20%">
																					{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.Invoice}
																						{if $grouptax.enabled == '1'}
																							<input type="checkbox" name="Invoice.{$grouptax.taxtype}.{$checkboxtype}" id="{$checkboxtype}"  {$grouptax.active} {$grouptax.selected} onclick="preview(this,'Invoice.{$grouptax.taxtype}.{$checkboxtype}','{$PDFLANGUAGEARRAYINVOICES.$checkboxtype}');">&nbsp;{$PDFLANGUAGEARRAYINVOICES.$checkboxtype}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td  align="left" >
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT_NAME} 
																					<input type="checkbox" name="Invoice_gprodname_ic"  id="Invoice_gprodname_ic"  {$GPRODDETAILS.Invoice.0}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_gprodname_perm" id="Invoice_gprodname_perm"  {$EDITPERMISSION.Invoice.gprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="Invoice_gproddes_ic"  id="Invoice_gproddes_ic"  {$GPRODDETAILS.Invoice.1}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_gproddes_perm" id="Invoice_gproddes_perm"  {$EDITPERMISSION.Invoice.gproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="Invoice_gprodcom_ic"  id="Invoice_gprodcom_ic"  {$GPRODDETAILS.Invoice.2}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_gprodcom_perm" id="Invoice_gprodcom_perm" {$EDITPERMISSION.Invoice.gprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab">
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td  align="left" >
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td valign="top" class="smalltxt">{$PDFLANGUAGEARRAYINVOICES.TAX_INDIVIDUAL}</td>
																			</tr>
																			<tr valign="top">
																				<td width="85%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr >
																							{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.Invoice}
																								<td class="bigtxt" valign="top" id="Invoice.{$indivitax.taxtype}.{$checkboxtypei}">
																									{if ($indivitax.selected == 'checked="checked"' and $indivitax.enabled == '1')}
																										{$PDFLANGUAGEARRAYINVOICES.$checkboxtypei}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td class="smalltxt" align="right">
																								<input type="checkbox" name="Invoice_icolumns_perm" id="Invoice_icolumns_perm" {$EDITPERMISSION.Invoice.icolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="Invoice_checkboxes_individual"  valign="top" class="smalltxt" width="15%">
																					{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.Invoice}
																						{if $indivitax.enabled == '1'}
																							<input type="checkbox" name="Invoice.{$indivitax.taxtype}.{$checkboxtypei}" id="{$checkboxtypei}" {$indivitax.active} {$indivitax.selected} onclick="preview(this,'Invoice.{$indivitax.taxtype}.{$checkboxtypei}','{$PDFLANGUAGEARRAYINVOICES.$checkboxtypei}');">&nbsp;{$PDFLANGUAGEARRAYINVOICES.$checkboxtypei}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td  align="left" >
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT_NAME}
																					<input type="checkbox" name="Invoice_iprodname_ic"  id="Invoice_iprodname_ic"  {$IPRODDETAILS.Invoice.0}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_iprodname_perm" id="Invoice_iprodname_perm" {$EDITPERMISSION.Invoice.iprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="Invoice_iproddes_ic"  id="Invoice_iproddes_ic"  {$IPRODDETAILS.Invoice.1}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_iproddes_perm" id="Invoice_iproddes_perm" {$EDITPERMISSION.Invoice.iproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEINVOICES.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="Invoice_iprodcom_ic"  id="Invoice_iprodcom_ic"  {$IPRODDETAILS.Invoice.2}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="Invoice_iprodcom_perm" id="Invoice_iprodcom_perm" {$EDITPERMISSION.Invoice.iprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
													</div>
												</td>
											</tr>
										</table>
										<br><br><br>
										<table>
											<tr>
											{if $MODULEVIEW==1}
												<td class="small" align='left' nowrap>
													<input class="crmButton small save" id="savei" name="savei" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit"  value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
													<input class="crmButton small cancel" id="canceli" name="canceli" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="disableFields(pdfsettings);" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
												</td>
											{else}
												<input class="crmButton small save" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit" name="buttonsave" value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
												<input class="crmButton small cancel" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="self.close();" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
											{/if}
											</tr>
										</table>
										<script type="text/javascript">
											initTabs('configurationtabs_invoice',Array(pdfconfig_arr.TAB_GENERAL,pdfconfig_arr.TAB_GROUP,pdfconfig_arr.TAB_INDIVIDUAL),0,750,530);
										</script>
									</div>
									<br>
								</td>
							</tr>
						</table>
						<br>
						<br>
						<table border=0 cellspacing=0 cellpadding=5 width="100%" >
							<tr><td class="small" ><div align=right><a href="#top">{$MOD.LBL_SCROLL}</a></div></td></tr>
						</table>
					</div>
					<!-- Sales Order start here -->
					<div id="SalesOrder" style="display:none" class="box">
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
							<tr>
								<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
									<br>
									<div align=center>
										<!-- DISPLAY -->
										<table border=0 cellspacing=0 cellpadding=5 width="100%" >
											<tr>
												<td>
													<div id="configurationtabs_so">
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" >
																<tr>
																	<td valign="top" align="left" class="bigtxt">{$MOD.LBL_PDFCONFIGURATOR_SO}</td>
																</tr>
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top"  class="smalltxt">{$PDFMODULLANGUAGESO.LBL_LANGUAGES}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="50%">
																								<select class="detailedViewTextBox" style="width:30%;" id="SalesOrder_pdflang_sv" name="SalesOrder_pdflang_sv" {$CHANGEPERMISSION.SalesOrder.pdflang}>
																									{html_options values=$LANGUAGEKEYS.SalesOrder output=$LANGUAGES.SalesOrder selected=$LANGSELECTED.SalesOrder}
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" >
																								<input type="checkbox" id="SalesOrder_pdflang_perm"  name="SalesOrder_pdflang_perm" {$EDITPERMISSION.SalesOrder.pdflang} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top"  class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PAPERFORMAT}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="50%">
																								<select class="detailedViewTextBox" style="width:30%;" id="SalesOrder_paperf_sv" name="SalesOrder_paperf_sv" {$CHANGEPERMISSION.SalesOrder.paperf}>
																									{html_options values=$PAPERFORMAT.SalesOrder output=$PAPERFORMAT.SalesOrder selected=$PAPERSELECTED.SalesOrder}
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" >
																								<input type="checkbox" id="SalesOrder_paperf_perm"  name="SalesOrder_paperf_perm" {$EDITPERMISSION.SalesOrder.paperf} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_FONTS}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" width="100%">
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td  class="smalltxt" width="80%">
																								<select id="SalesOrder_fontid_sv" name="SalesOrder_fontid_sv" class="detailedViewTextBox"  style="width:40%;" {$CHANGEPERMISSION.SalesOrder.fontid}>
																									{html_options selected=$SELECTEDFONTID.SalesOrder size=1 values=$FONTIDS.SalesOrder output=$FONTLIST.SalesOrder }
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" width="20%">
																								<input type="checkbox" name="SalesOrder_fontid_perm" id="SalesOrder_fontid_perm" {$EDITPERMISSION.SalesOrder.fontid} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" class="listRow">
																			<tr>
																				<td align="left" valign="top" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_FONTSSIZE}</td>
																			</tr>
																			<tr>
																				<td align='left'>
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_FONTSSIZE_HEADER}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="SalesOrder_fontsizeheader_perm" name="SalesOrder_fontsizeheader_perm" {$EDITPERMISSION.SalesOrder.fontsizeheader} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_FONTSSIZE_ADDRESS}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="SalesOrder_fontsizeaddress_perm" name="SalesOrder_fontsizeaddress_perm" {$EDITPERMISSION.SalesOrder.fontsizeaddress} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_FONTSSIZE_BODY}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="SalesOrder_fontsizebody_perm" name="SalesOrder_fontsizebody_perm"{$EDITPERMISSION.SalesOrder.fontsizebody} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_FONTSSIZE_FOOTER}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="SalesOrder_fontsizefooter_perm" name="SalesOrder_fontsizefooter_perm" {$EDITPERMISSION.SalesOrder.fontsizefooter} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																						</tr>
																						<tr valign="top">
																								<td class="smalltxt">
																									<select name="SalesOrder_fontsizeheader_sv" class="detailedViewTextBox"  style="width:25%;" id="SalesOrder_fontsizeheader_sv" {$CHANGEPERMISSION.SalesOrder.fontsizeheader}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEHEADER.SalesOrder}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="SalesOrder_fontsizeaddress_sv" class="detailedViewTextBox"  style="width:25%;" id="SalesOrder_fontsizeaddress_sv" {$CHANGEPERMISSION.SalesOrder.fontsizeaddress}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEADDRESS.SalesOrder}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="SalesOrder_fontsizebody_sv" class="detailedViewTextBox"  style="width:25%;" id="SalesOrder_fontsizebody_sv" {$CHANGEPERMISSION.SalesOrder.fontsizebody}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEBODY.SalesOrder}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="SalesOrder_fontsizefooter_sv" class="detailedViewTextBox" style="width:25%;" id="SalesOrder_fontsizefooter_sv"{$CHANGEPERMISSION.SalesOrder.fontsizefooter}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEFOOTER.SalesOrder}
																									</select>
																								</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PRINT_LOGO}&nbsp;&nbsp;
																					<input type="checkbox" id="SalesOrder_logoradio_sc" name="SalesOrder_logoradio_sc" {$LOGORADIO.SalesOrder} {$CHANGEPERMISSION.SalesOrder.logoradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="SalesOrder_logoradio_perm" name="SalesOrder_logoradio_perm" {$EDITPERMISSION.SalesOrder.logoradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_DATE}
																					<select name="SalesOrder_dateused_sv" class="detailedViewTextBox"  style="width:20%;" id="SalesOrder_dateused_sv" {$CHANGEPERMISSION.SalesOrder.dateused}>
																						{html_options values=$DATEUSED.SalesOrder output= $DATEUSEDNAME selected=$DATEUSEDSELECTED.SalesOrder}
																					</select>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="SalesOrder_dateused_perm" id="SalesOrder_dateused_perm" {$EDITPERMISSION.SalesOrder.dateused} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_OWNER}
																					<input type="checkbox" id="SalesOrder_owner_sc" name="SalesOrder_owner_sc" {$OWNER.SalesOrder} {$CHANGEPERMISSION.SalesOrder.owner}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="SalesOrder_owner_perm" name="SalesOrder_owner_perm" {$EDITPERMISSION.SalesOrder.owner} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_OWNER_PH}
																					<input type="checkbox" id="SalesOrder_ownerphone_sc" name="SalesOrder_ownerphone_sc" {$OWNERPHONE.SalesOrder} {$CHANGEPERMISSION.SalesOrder.ownerphone}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="SalesOrder_ownerphone_perm" name="SalesOrder_ownerphone_perm" {$EDITPERMISSION.SalesOrder.ownerphone} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_CUSTSIGN}
																					<input type="checkbox" id="SalesOrder_clientid_sc" name="SalesOrder_clientid_sc" {$CLIENTID.SalesOrder} {$CHANGEPERMISSION.SalesOrder.clientid}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="SalesOrder_clientid_perm" name="SalesOrder_clientid_perm" {$EDITPERMISSION.SalesOrder.clientid} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_SPACE_HEADER}&nbsp;&nbsp;
																					<select name="SalesOrder_spaceheadline_sv" class="detailedViewTextBox"   style="width:7%;" id="SalesOrder_spaceheadline_sv" {$CHANGEPERMISSION.SalesOrder.spaceheadline}>
																						{html_options values=$HEADERSPACE output=$HEADERSPACE selected=$HEADERSPACESELECTED}
																					</select>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="SalesOrder_spaceheadline_perm" id="SalesOrder_spaceheadline_perm"  {$EDITPERMISSION.SalesOrder.spaceheadline} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PRINT_FOOTER}&nbsp;&nbsp;
																					<input type="checkbox" name="SalesOrder_footerradio_sc" id="SalesOrder_footerradio_sc" {$FOOTERRADIO.SalesOrder} {$CHANGEPERMISSION.SalesOrder.footerradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="SalesOrder_footerradio_perm" id="SalesOrder_footerradio_perm"  {$EDITPERMISSION.SalesOrder.footerradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PRINT_FOOTERPAGE}&nbsp;&nbsp;
																					<input type="checkbox" name="SalesOrder_pageradio_sc" id="SalesOrder_pageradio_sc" {$FOOTERPAGERADIO.SalesOrder} {$CHANGEPERMISSION.SalesOrder.pageradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_pageradio_perm" id="SalesOrder_pageradio_perm"  {$EDITPERMISSION.SalesOrder.pageradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_SUMMARY}&nbsp;&nbsp;
																					<input type="checkbox" name="SalesOrder_summaryradio_sc" id="SalesOrder_summaryradio_sc" {$SUMMARYRADIO.SalesOrder} {$CHANGEPERMISSION.SalesOrder.summaryradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_summaryradio_perm" id="SalesOrder_summaryradio_perm"  {$EDITPERMISSION.SalesOrder.summaryradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%">
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td  valign="top" class="smalltxt">{$PDFLANGUAGEARRAYSO.TAX_GROUP}</td>
																			</tr>
																			<tr valign="top">
																				<td width="80%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr >
																							{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.SalesOrder} 
																								<td  class="bigtxt" valign="top" id="SalesOrder.{$grouptax.taxtype}.{$checkboxtype}">
																									{if ($grouptax.selected == 'checked="checked"' and $grouptax.enabled == '1')}
																										{$PDFLANGUAGEARRAYSO.$checkboxtype}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td  class="smalltxt" align="right">
																								<input type="checkbox" name="SalesOrder_gcolumns_perm" id="SalesOrder_gcolumns_perm"  {$EDITPERMISSION.SalesOrder.gcolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="qcheckboxes_group"  valign="top" class="smalltxt" width="20%">
																					{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.SalesOrder}
																						{if $grouptax.enabled == '1'}
																							<input type="checkbox" name="SalesOrder.{$grouptax.taxtype}.{$checkboxtype}" id="{$checkboxtype}" {$grouptax.active} {$grouptax.selected} {$CHANGEPERMISSION.SalesOrder.gcolumns} onclick="preview(this,'SalesOrder.{$grouptax.taxtype}.{$checkboxtype}','{$PDFLANGUAGEARRAYSO.$checkboxtype}');">&nbsp;{$PDFLANGUAGEARRAYSO.$checkboxtype}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT_NAME} 
																					<input type="checkbox" name="SalesOrder_gprodname_sc"  id="SalesOrder_gprodname_sc"  {$GPRODDETAILS.SalesOrder.0} {$CHANGEPERMISSION.SalesOrder.gprodname}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_gprodname_perm" id="SalesOrder_gprodname_perm"  {$EDITPERMISSION.SalesOrder.gprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="SalesOrder_gproddes_sc"  id="SalesOrder_gproddes_sc"  {$GPRODDETAILS.SalesOrder.1} {$CHANGEPERMISSION.SalesOrder.gproddes}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_gproddes_perm" id="SalesOrder_gproddes_perm"  {$EDITPERMISSION.SalesOrder.gproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="SalesOrder_gprodcom_sc"  id="SalesOrder_gprodcom_sc"  {$GPRODDETAILS.SalesOrder.2} {$CHANGEPERMISSION.SalesOrder.gprodcom}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_gprodcom_perm" id="SalesOrder_gprodcom_perm"  {$EDITPERMISSION.SalesOrder.gprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td valign="top" class="smalltxt">{$PDFLANGUAGEARRAYSO.TAX_INDIVIDUAL}</td>
																			</tr>
																			<tr valign="top">
																				<td width="80%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr >
																							{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.SalesOrder}
																								<td  class="bigtxt" valign="top" id="SalesOrder.{$indivitax.taxtype}.{$checkboxtypei}">
																									{if ($indivitax.selected == 'checked="checked"' and $indivitax.enabled == '1')}
																										{$PDFLANGUAGEARRAYSO.$checkboxtypei}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td class="smalltxt" align="right">
																								<input type="checkbox" name="SalesOrder_icolumns_perm" id="SalesOrder_icolumns_perm"  {$EDITPERMISSION.SalesOrder.icolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="SalesOrder_checkboxes_individual"  valign="top" class="smalltxt" width="20%">
																					{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.SalesOrder}
																						{if $indivitax.enabled == '1'}
																							<input type="checkbox" name="SalesOrder.{$indivitax.taxtype}.{$checkboxtypei}" id="{$checkboxtypei}" {$indivitax.active} {$indivitax.selected} {$CHANGEPERMISSION.SalesOrder.icolumns} onclick="preview(this,'SalesOrder.{$indivitax.taxtype}.{$checkboxtypei}','{$PDFLANGUAGEARRAYSO.$checkboxtypei}');">&nbsp;{$PDFLANGUAGEARRAYSO.$checkboxtypei}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT_NAME}
																					<input type="checkbox" name="SalesOrder_iprodname_sc"  id="SalesOrder_iprodname_sc"  {$IPRODDETAILS.SalesOrder.0} {$CHANGEPERMISSION.SalesOrder.iprodname}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_iprodname_perm" id="SalesOrder_iprodname_perm"  {$EDITPERMISSION.SalesOrder.iprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="SalesOrder_iproddes_sc"  id="SalesOrder_iproddes_sc"  {$IPRODDETAILS.SalesOrder.1} {$CHANGEPERMISSION.SalesOrder.iproddes}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_iproddes_perm" id="SalesOrder_iproddes_perm" {$EDITPERMISSION.SalesOrder.iproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGESO.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="SalesOrder_iprodcom_sc"  id="SalesOrder_iprodcom_sc"  {$IPRODDETAILS.SalesOrder.2} {$CHANGEPERMISSION.SalesOrder.iprodcom}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="SalesOrder_iprodcom_perm" id="SalesOrder_iprodcom_perm"  {$EDITPERMISSION.SalesOrder.iprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
													</div>
												</td>
											</tr>
										</table>
										<br><br><br>
										<table>
											<tr>
											{if $MODULEVIEW==1} 
												<td class="small" align='left' nowrap width="100%">
													<input class="crmButton small save" id="saveso" name="saveso" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit" action="index.php?module=Pdfsettings&action=UpdatePDFSettings&parenttab=Tools"   value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
													<input class="crmButton small cancel" id="cancelso" name="cancelso" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="disableFields(pdfsettings);" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
												</td>
											{else}
												<td class="small" align='left' nowrap width="100%">
												<input class="crmButton small save" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit" name="buttonsave" value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
												<input class="crmButton small cancel" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="self.close();" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
												</td>
											{/if}
											</tr>
										</table>
										<script type="text/javascript">
											initTabs('configurationtabs_so',Array(pdfconfig_arr.TAB_GENERAL,pdfconfig_arr.TAB_GROUP,pdfconfig_arr.TAB_INDIVIDUAL),0,750,545);
										</script>
									</div>
								</td>
							</tr>
						</table>
						<br>
						<br>
						<table border=0 cellspacing=0 cellpadding=5 width="100%" >
							<tr><td class="small" ><div align=right><a href="#top">{$MOD.LBL_SCROLL}</a></div></td></tr>
						</table>
					</div>
					<!-- Purchase Order start here -->
					<div id="PurchaseOrder" style="display:none" class="box">
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
							<tr>
								<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
									<br>
									<div align=center>
										<!-- DISPLAY -->
										<table border=0 cellspacing=0 cellpadding=5 width="100%" >
											<tr>
												<td>
													<div id="configurationtabs_po">
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" >
																<tr>
																	<td valign="top" align="left" class="bigtxt">{$MOD.LBL_PDFCONFIGURATOR_PO}</td>
																</tr>
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top"  class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_LANGUAGES}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="50%">
																								<select class="detailedViewTextBox" style="width:30%;" id="PurchaseOrder_pdflang_pv" name="PurchaseOrder_pdflang_pv" {$CHANGEPERMISSION.PurchaseOrder.pdflang}>
																									{html_options values=$LANGUAGEKEYS.PurchaseOrder output=$LANGUAGES.PurchaseOrder selected=$LANGSELECTED.PurchaseOrder}
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" >
																								<input type="checkbox" id="PurchaseOrder_pdflang_perm"  name="PurchaseOrder_pdflang_perm" {$EDITPERMISSION.PurchaseOrder.pdflang} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top"  class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PAPERFORMAT}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" >
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td class="smalltxt" width="50%">
																								<select class="detailedViewTextBox" style="width:30%;" id="PurchaseOrder_paperf_pv" name="PurchaseOrder_paperf_pv" {$CHANGEPERMISSION.PurchaseOrder.paperf}>
																									{html_options values=$PAPERFORMAT.PurchaseOrder output=$PAPERFORMAT.PurchaseOrder selected=$PAPERSELECTED.PurchaseOrder}
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" >
																								<input type="checkbox" id="PurchaseOrder_paperf_perm"  name="PurchaseOrder_paperf_perm" {$EDITPERMISSION.PurchaseOrder.paperf} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_FONTS}</td>
																			</tr>
																			<tr>
																				<td class="small" valign="top" width="100%">
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr valign="top">
																							<td  class="smalltxt" width="80%">
																								<select id="PurchaseOrder_fontid_pv" name="PurchaseOrder_fontid_pv" class="detailedViewTextBox"  style="width:40%;" {$CHANGEPERMISSION.PurchaseOrder.fontid}>
																									{html_options selected=$SELECTEDFONTID.PurchaseOrder size=1 values=$FONTIDS.PurchaseOrder output=$FONTLIST.PurchaseOrder }
																								</select>
																							</td>
																							{if $MODULEVIEW==1} 
																							<td class="smalltxt" align="right" width="20%">
																								<input type="checkbox" name="PurchaseOrder_fontid_perm" id="PurchaseOrder_fontid_perm" {$EDITPERMISSION.PurchaseOrder.fontid} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" class="listRow">
																			<tr>
																				<td align="left" valign="top" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_FONTSSIZE}</td>
																			</tr>
																			<tr>
																				<td align='left'>
																					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
																						<tr>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_FONTSSIZE_HEADER}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="PurchaseOrder_fontsizeheader_perm" name="PurchaseOrder_fontsizeheader_perm" {$EDITPERMISSION.PurchaseOrder.fontsizeheader} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_FONTSSIZE_ADDRESS}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="PurchaseOrder_fontsizeaddress_perm" name="PurchaseOrder_fontsizeaddress_perm" {$EDITPERMISSION.PurchaseOrder.fontsizeaddress} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_FONTSSIZE_BODY}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="PurchaseOrder_fontsizebody_perm" name="PurchaseOrder_fontsizebody_perm"{$EDITPERMISSION.PurchaseOrder.fontsizebody} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																							<td valign="top" class="smalltxt"><b>{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_FONTSSIZE_FOOTER}</b>
																							{if $MODULEVIEW==1} 
																								<input type="checkbox" id="PurchaseOrder_fontsizefooter_perm" name="PurchaseOrder_fontsizefooter_perm" {$EDITPERMISSION.PurchaseOrder.fontsizefooter} >{$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							{/if}
																							</td>
																						</tr>
																						<tr valign="top">
																								<td class="smalltxt">
																									<select name="PurchaseOrder_fontsizeheader_pv" class="detailedViewTextBox"  style="width:25%;" id="PurchaseOrder_fontsizeheader_pv" {$CHANGEPERMISSION.PurchaseOrder.fontsizeheader}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEHEADER.PurchaseOrder}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="PurchaseOrder_fontsizeaddress_pv" class="detailedViewTextBox"  style="width:25%;" id="PurchaseOrder_fontsizeaddress_pv" {$CHANGEPERMISSION.PurchaseOrder.fontsizeaddress}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEADDRESS.PurchaseOrder}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="PurchaseOrder_fontsizebody_pv" class="detailedViewTextBox"  style="width:25%;" id="PurchaseOrder_fontsizebody_pv" {$CHANGEPERMISSION.PurchaseOrder.fontsizebody}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEBODY.PurchaseOrder}
																									</select>
																								</td>
																								<td  class="smalltxt">
																									<select name="PurchaseOrder_fontsizefooter_pv" class="detailedViewTextBox" style="width:25%;" id="PurchaseOrder_fontsizefooter_pv"{$CHANGEPERMISSION.PurchaseOrder.fontsizefooter}>
																										{html_options values=$FONTSIZEAVAILABLE output=$FONTSIZEAVAILABLE selected=$FONTSIZEFOOTER.PurchaseOrder}
																									</select>
																								</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PRINT_LOGO}&nbsp;&nbsp;
																					<input type="checkbox" id="PurchaseOrder_logoradio_pc" name="PurchaseOrder_logoradio_pc" {$LOGORADIO.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.logoradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="PurchaseOrder_logoradio_perm" name="PurchaseOrder_logoradio_perm" {$EDITPERMISSION.PurchaseOrder.logoradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_DATE}
																					<select name="PurchaseOrder_dateused_pv" class="detailedViewTextBox"  style="width:20%;" id="PurchaseOrder_dateused_pv" {$CHANGEPERMISSION.PurchaseOrder.dateused}>
																						{html_options values=$DATEUSED.PurchaseOrder output= $DATEUSEDNAME selected=$DATEUSEDSELECTED.PurchaseOrder}
																					</select>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="PurchaseOrder_dateused_perm" id="PurchaseOrder_dateused_perm" {$EDITPERMISSION.PurchaseOrder.dateused} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_OWNER}
																					<input type="checkbox" id="PurchaseOrder_owner_pc" name="PurchaseOrder_owner_pc" {$OWNER.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.owner}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="PurchaseOrder_owner_perm" name="PurchaseOrder_owner_perm" {$EDITPERMISSION.PurchaseOrder.owner} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_OWNER_PH}
																					<input type="checkbox" id="PurchaseOrder_ownerphone_pc" name="PurchaseOrder_ownerphone_pc" {$OWNERPHONE.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.ownerphone}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="PurchaseOrder_ownerphone_perm" name="PurchaseOrder_ownerphone_perm" {$EDITPERMISSION.PurchaseOrder.ownerphone} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_REQUISITION}
																					<input type="checkbox" id="PurchaseOrder_poname_pc" name="PurchaseOrder_poname_pc" {$PONAME.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.poname}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="PurchaseOrder_poname_perm" name="PurchaseOrder_poname_perm" {$EDITPERMISSION.PurchaseOrder.poname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_CARRIER}
																					<input type="checkbox" id="PurchaseOrder_carrier_pc" name="PurchaseOrder_carrier_pc" {$CARRIER.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.carrier}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="PurchaseOrder_carrier_perm" name="PurchaseOrder_carrier_perm" {$EDITPERMISSION.PurchaseOrder.carrier} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_VENDORID}
																					<input type="checkbox" id="PurchaseOrder_clientid_pc" name="PurchaseOrder_clientid_pc" {$CLIENTID.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.clientid}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1} 
																				<td class="smalltxt" width="20%" align="right">
																					<input type="checkbox" id="PurchaseOrder_clientid_perm" name="PurchaseOrder_clientid_perm" {$EDITPERMISSION.PurchaseOrder.clientid} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_SPACE_HEADER}&nbsp;&nbsp;
																					<select name="PurchaseOrder_spaceheadline_pv" class="detailedViewTextBox"   style="width:7%;" id="PurchaseOrder_spaceheadline_pv" {$CHANGEPERMISSION.PurchaseOrder.spaceheadline}>
																						{html_options values=$HEADERSPACE output=$HEADERSPACE selected=$HEADERSPACESELECTED}
																					</select>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="PurchaseOrder_spaceheadline_perm" id="PurchaseOrder_spaceheadline_perm"  {$EDITPERMISSION.PurchaseOrder.spaceheadline} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PRINT_FOOTER}&nbsp;&nbsp;
																					<input type="checkbox" name="PurchaseOrder_footerradio_pc" id="PurchaseOrder_footerradio_pc" {$FOOTERRADIO.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.footerradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt"  width="20%" align="right">
																					<input type="checkbox" name="PurchaseOrder_footerradio_perm" id="PurchaseOrder_footerradio_perm"  {$EDITPERMISSION.PurchaseOrder.footerradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top"  width="80%" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PRINT_FOOTERPAGE}&nbsp;&nbsp;
																					<input type="checkbox" name="PurchaseOrder_pageradio_pc" id="PurchaseOrder_pageradio_pc" {$FOOTERPAGERADIO.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.pageradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_pageradio_perm" id="PurchaseOrder_pageradio_perm"  {$EDITPERMISSION.PurchaseOrder.pageradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_SUMMARY}&nbsp;&nbsp;
																					<input type="checkbox" name="PurchaseOrder_summaryradio_pc" id="PurchaseOrder_summaryradio_pc" {$SUMMARYRADIO.PurchaseOrder} {$CHANGEPERMISSION.PurchaseOrder.summaryradio}> {$APP.yes}
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_summaryradio_perm" id="PurchaseOrder_summaryradio_perm"  {$EDITPERMISSION.PurchaseOrder.summaryradio} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%">
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td  valign="top" class="smalltxt">{$PDFLANGUAGEARRAYPO.TAX_GROUP}</td>
																			</tr>
																			<tr valign="top">
																				<td width="80%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr >
																							{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.PurchaseOrder} 
																								<td  class="bigtxt" valign="top" id="PurchaseOrder.{$grouptax.taxtype}.{$checkboxtype}">
																									{if ($grouptax.selected == 'checked="checked"' and $grouptax.enabled == '1')}
																										{$PDFLANGUAGEARRAYPO.$checkboxtype}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td  class="smalltxt" align="right">
																								<input type="checkbox" name="PurchaseOrder_gcolumns_perm" id="PurchaseOrder_gcolumns_perm"  {$EDITPERMISSION.PurchaseOrder.gcolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="qcheckboxes_group"  valign="top" class="smalltxt" width="20%">
																					{foreach key =checkboxtype item =grouptax from=$COLUMNCONFIGURATIONGROUP.PurchaseOrder}
																						{if $grouptax.enabled == '1'}
																							<input type="checkbox" name="PurchaseOrder.{$grouptax.taxtype}.{$checkboxtype}" id="{$checkboxtype}" {$grouptax.active} {$grouptax.selected} {$CHANGEPERMISSION.PurchaseOrder.gcolumns} onclick="preview(this,'PurchaseOrder.{$grouptax.taxtype}.{$checkboxtype}','{$PDFLANGUAGEARRAYPO.$checkboxtype}');">&nbsp;{$PDFLANGUAGEARRAYPO.$checkboxtype}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT_NAME} 
																					<input type="checkbox" name="PurchaseOrder_gprodname_pc"  id="PurchaseOrder_gprodname_pc"  {$GPRODDETAILS.PurchaseOrder.0} {$CHANGEPERMISSION.PurchaseOrder.gprodname}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_gprodname_perm" id="PurchaseOrder_gprodname_perm"  {$EDITPERMISSION.PurchaseOrder.gprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="PurchaseOrder_gproddes_pc"  id="PurchaseOrder_gproddes_pc"  {$GPRODDETAILS.PurchaseOrder.1} {$CHANGEPERMISSION.PurchaseOrder.gproddes}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_gproddes_perm" id="PurchaseOrder_gproddes_perm"  {$EDITPERMISSION.PurchaseOrder.gproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="PurchaseOrder_gprodcom_pc"  id="PurchaseOrder_gprodcom_pc"  {$GPRODDETAILS.PurchaseOrder.2} {$CHANGEPERMISSION.PurchaseOrder.gprodcom}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_gprodcom_perm" id="PurchaseOrder_gprodcom_perm"  {$EDITPERMISSION.PurchaseOrder.gprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
														<div class="dhtmlgoodies_aTab"> 
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_CONFIGURATOR_ROWS}</td>
																			</tr>
																		</table><br>
																		<table border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr valign="top">
																				<td valign="top" class="smalltxt">{$PDFLANGUAGEARRAYPO.TAX_INDIVIDUAL}</td>
																			</tr>
																			<tr valign="top">
																				<td width="80%">
																					<table border=0 cellspacing=0 cellpadding=3 frame="below" width="100%" class="tableHeading">
																						<tr >
																							{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.PurchaseOrder}
																								<td  class="bigtxt" valign="top" id="PurchaseOrder.{$indivitax.taxtype}.{$checkboxtypei}">
																									{if ($indivitax.selected == 'checked="checked"' and $indivitax.enabled == '1')}
																										{$PDFLANGUAGEARRAYPO.$checkboxtypei}
																									{/if}
																								</td>
																								<td>&nbsp;</td>
																							{/foreach}
																							{if $MODULEVIEW==1}
																							<td class="smalltxt" align="right">
																								<input type="checkbox" name="PurchaseOrder_icolumns_perm" id="PurchaseOrder_icolumns_perm"  {$EDITPERMISSION.PurchaseOrder.icolumns} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																							</td>
																							{/if}
																						</tr>
																					</table>
																				</td>
																				<td id="PurchaseOrder_checkboxes_individual"  valign="top" class="smalltxt" width="20%">
																					{foreach key =checkboxtypei item =indivitax from=$COLUMNCONFIGURATIONINDIVIDUAL.PurchaseOrder}
																						{if $indivitax.enabled == '1'}
																							<input type="checkbox" name="PurchaseOrder.{$indivitax.taxtype}.{$checkboxtypei}" id="{$checkboxtypei}" {$indivitax.active} {$indivitax.selected} {$CHANGEPERMISSION.PurchaseOrder.icolumns} onclick="preview(this,'PurchaseOrder.{$indivitax.taxtype}.{$checkboxtypei}','{$PDFLANGUAGEARRAYPO.$checkboxtypei}');">&nbsp;{$PDFLANGUAGEARRAYPO.$checkboxtypei}<br>
																						{/if}
																					{/foreach}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<table border=0 cellspacing=0 cellpadding=10 width="100%" class="listRow">
																<tr>
																	<td align="left">
																		<table align="" border=0 cellspacing=0 cellpadding=0 width="100%" >
																			<tr>
																				<td valign="top" class="smalltxt">{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT}
																				</td>
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT_NAME}
																					<input type="checkbox" name="PurchaseOrder_iprodname_pc"  id="PurchaseOrder_iprodname_pc"  {$IPRODDETAILS.PurchaseOrder.0} {$CHANGEPERMISSION.PurchaseOrder.iprodname}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_iprodname_perm" id="PurchaseOrder_iprodname_perm"  {$EDITPERMISSION.PurchaseOrder.iprodname} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT_DESCRIPTION}
																					<input type="checkbox" name="PurchaseOrder_iproddes_pc"  id="PurchaseOrder_iproddes_pc"  {$IPRODDETAILS.PurchaseOrder.1} {$CHANGEPERMISSION.PurchaseOrder.iproddes}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_iproddes_perm" id="PurchaseOrder_iproddes_perm" {$EDITPERMISSION.PurchaseOrder.iproddes} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																			<tr>
																				<td valign="top" class="smalltxt">
																					{$PDFMODULLANGUAGEPO.LBL_PDF_DESCRIPTION_CONTENT_COMMENT}
																					<input type="checkbox" name="PurchaseOrder_iprodcom_pc"  id="PurchaseOrder_iprodcom_pc"  {$IPRODDETAILS.PurchaseOrder.2} {$CHANGEPERMISSION.PurchaseOrder.iprodcom}>
																				</td>
																				{if $MODULEVIEW==1}
																				<td class="smalltxt" align="right">
																					<input type="checkbox" name="PurchaseOrder_iprodcom_perm" id="PurchaseOrder_iprodcom_perm"  {$EDITPERMISSION.PurchaseOrder.iprodcom} > {$MOD.LBL_PDFCONFIGURATOR_ENABLE}
																				</td>
																				{/if}
																			</tr>
																		</table>
																	</td>
													            </tr>
													        </table>
														</div>
													</div>
												</td>
											</tr>
										</table>
										<br><br><br>
										<table>
											<tr>
											{if $MODULEVIEW==1} 
												<td class="small" align='left' nowrap width="100%">
													<input class="crmButton small save" id="savepo" name="savepo" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit" action="index.php?module=Pdfsettings&action=UpdatePDFSettings&parenttab=Tools"   value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
													<input class="crmButton small cancel" id="cancelpo" name="cancelpo" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="disableFields(pdfsettings);" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
												</td>
											{else}
												<td class="small" align='left' nowrap width="100%">
												<input class="crmButton small save" title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"  type="submit" name="buttonsave" value=" {$APP.LBL_SAVE_BUTTON_LABEL}  ">&nbsp;
												<input class="crmButton small cancel" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" onclick="self.close();" type="button"  value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
												</td>
											{/if}
											</tr>
										</table>
										<script type="text/javascript">
											initTabs('configurationtabs_po',Array(pdfconfig_arr.TAB_GENERAL,pdfconfig_arr.TAB_GROUP,pdfconfig_arr.TAB_INDIVIDUAL),0,750,560);
										</script>
									</div>
								</td>
							</tr>
						</table>
						<br>
						<br>
						<table border=0 cellspacing=0 cellpadding=5 width="100%" >
							<tr><td class="small" ><div align=right><a href="#top">{$MOD.LBL_SCROLL}</a></div></td></tr>
						</table>
					</div>
					<br />
				</div>
			</td>
		</tr>
	</table>
</form>
<script>
{literal}

function tableswitch(modules)
{
	var option=['Quotes','Invoice','SalesOrder','PurchaseOrder'];
	for(var i=0; i<option.length; i++) { 
		obj=document.getElementById(option[i]);
		obj.style.display=(option[i]==modules) && !(obj.style.display=="block")? "block" : "none"; 
	}
}
</script>
<script>
function preview(checkbox,id,columnname)
{
//alert("checkbox:  "+ checkbox.checked+"  ID:  " + id +"  Columnname: "+columnname+ "   inner HTML: "+document.getElementById(id).innerHTML);
//alert("ID:  "+ document.getElementById(id).name+" Wert in der Checkbox:  " + document.getElementById(id).checked);
	if(checkbox.checked == true)
	{
		document.getElementById(id).innerHTML=columnname;
		document.getElementById(id).checked='true';
		if (document.getElementById) { // DOM3 = IE5,6,7, NS6
			document.getElementById(id).style.display = 'block';
		}
		else {
			if (document.layers) { // Netscape 4
				document.id.display = 'block';
			}
			else { // IE 4
				document.all.id.style.display = 'block';
			}
		}
	}
	else
	{
		document.getElementById(id).innerHTML=' ';
		document.getElementById(id).checked='false';
		if (document.getElementById) { // DOM3 = IE5, NS6
			document.getElementById(id).style.display = 'none';
		}
		else {
			if (document.layers) { // Netscape 4
				document.id.display = 'none';
			}
			else { // IE 4
					document.all.id.style.display = 'none';
			}
		}
	}
}

function checkvalues(form) {
    var isError = false;
    var errorMessage = "";
 	//check for errors
	var qgprodname = document.getElementById('Quotes_gprodname_qc').checked;
	var qgproddes = document.getElementById('Quotes_gproddes_qc').checked;
	var qgprodcom = document.getElementById('Quotes_gprodcom_qc').checked;
	var qiprodname = document.getElementById('Quotes_iprodname_qc').checked;
	var qiproddes = document.getElementById('Quotes_iproddes_qc').checked;
	var qiprodcom = document.getElementById('Quotes_iprodcom_qc').checked;
	var igprodname = document.getElementById('Invoice_gprodname_ic').checked;
	var igproddes = document.getElementById('Invoice_gproddes_ic').checked;
	var igprodcom = document.getElementById('Invoice_gprodcom_ic').checked;
	var iiprodname = document.getElementById('Invoice_iprodname_ic').checked;
	var iiproddes = document.getElementById('Invoice_iproddes_ic').checked;
	var iiprodcom = document.getElementById('Invoice_iprodcom_ic').checked;
	var sgprodname = document.getElementById('SalesOrder_gprodname_sc').checked;
	var sgproddes = document.getElementById('SalesOrder_gproddes_sc').checked;
	var sgprodcom = document.getElementById('SalesOrder_gprodcom_sc').checked;
	var siprodname = document.getElementById('SalesOrder_iprodname_sc').checked;
	var siproddes = document.getElementById('SalesOrder_iproddes_sc').checked;
	var siprodcom = document.getElementById('SalesOrder_iprodcom_sc').checked;
	var pgprodname = document.getElementById('PurchaseOrder_gprodname_pc').checked;
	var pgproddes = document.getElementById('PurchaseOrder_gproddes_pc').checked;
	var pgprodcom = document.getElementById('PurchaseOrder_gprodcom_pc').checked;
	var piprodname = document.getElementById('PurchaseOrder_iprodname_pc').checked;
	var piproddes = document.getElementById('PurchaseOrder_iproddes_pc').checked;
	var piprodcom = document.getElementById('PurchaseOrder_iprodcom_pc').checked;

	//it is not allowd to disable product name, description and comment together
	if( (qiprodname == false) & (qiproddes == false) & (qiprodcom == false)) {
		alert(pdfconfig_arr.ITEM_INDIVIDUAL_REQUIRED_QUOTES);
        form.displaymodul.focus();
		return false;
	}
	else if( (qgprodname == false) & (qgproddes == false) & (qgprodcom == false)) {
		alert(pdfconfig_arr.ITEM_GROUP_REQUIRED_QUOTES);
        form.displaymodul.focus();
		return false;
	}
	else if( (iiprodname == false) & (iiproddes == false) & (iiprodcom == false)) {
		alert(pdfconfig_arr.ITEM_INDIVIDUAL_REQUIRED_INV);
        form.displaymodul.focus();
		return false;
	}
	else if ( (igprodname == false) & (igproddes == false) & (igprodcom == false)) {
		alert(pdfconfig_arr.ITEM_GROUP_REQUIRED_INV);
        form.displaymodul.focus();
		return false;
	}
	else if( (siprodname == false) & (siproddes == false) & (siprodcom == false)) {
		alert(pdfconfig_arr.ITEM_INDIVIDUAL_REQUIRED_SO);
        form.displaymodul.focus();
		return false;
	}
	else if ( (sgprodname == false) & (sgproddes == false) & (sgprodcom == false)) {
		alert(pdfconfig_arr.ITEM_GROUP_REQUIRED_SO);
        form.displaymodul.focus();
		return false;
	}
	else if( (piprodname == false) & (piproddes == false) & (piprodcom == false)) {
		alert(pdfconfig_arr.ITEM_INDIVIDUAL_REQUIRED_PO);
        form.displaymodul.focus();
		return false;
	}
	else if ( (pgprodname == false) & (pgproddes == false) & (pgprodcom == false)) {
		alert(pdfconfig_arr.ITEM_GROUP_REQUIRED_PO);
        form.displaymodul.focus();
		return false;
	}
	return true;
}
function enableFields(form_id)
{
	var f = form_id.getElementsByTagName('select');
	for(var i=0;i<f.length;i++){
		f[i].removeAttribute('disabled');
	}
	var g = document.getElementsByTagName('input');
	for(var i=0;i<g.length;i++){
		if(g[i].getAttribute('type')=='checkbox'){
		var t = g[i].innerHTML;
		if (g[i].id != 'Description' & g[i].id != 'Qty' & g[i].id != 'UnitPrice' & g[i].id != 'LineTotal' & g[i].id != 'Tax')
			g[i].removeAttribute('disabled');
		}
	}
	document.getElementById('edit').style.visibility='hidden';
	document.getElementById('saveg').style.visibility='visible'; 
	document.getElementById('cancelg').style.visibility='visible';
	document.getElementById('savei').style.visibility='visible'; 
	document.getElementById('canceli').style.visibility='visible';
	document.getElementById('saveso').style.visibility='visible'; 
	document.getElementById('cancelso').style.visibility='visible';
	document.getElementById('savepo').style.visibility='visible'; 
	document.getElementById('cancelpo').style.visibility='visible';
}
function disableFields(form_id)
{
	var f = form_id.getElementsByTagName('select');
	for(var i=0;i<f.length;i++){
		if (f[i]!=document.getElementById('displaymodul'))
		f[i].setAttribute('disabled',true)
	}
	var g = document.getElementsByTagName('input');
	for(var i=0;i<g.length;i++){
		if(g[i].getAttribute('type')=='checkbox'){
			g[i].setAttribute('disabled',true)
		}
	}
	document.getElementById('edit').style.visibility='visible';
	document.getElementById('saveg').style.visibility='hidden'; 
	document.getElementById('cancelg').style.visibility='hidden';
	document.getElementById('savei').style.visibility='hidden'; 
	document.getElementById('canceli').style.visibility='hidden';
	document.getElementById('saveso').style.visibility='hidden'; 
	document.getElementById('cancelso').style.visibility='hidden';
	document.getElementById('savepo').style.visibility='hidden'; 
	document.getElementById('cancelpo').style.visibility='hidden';
}

function setinitial(allmenues)
{
	var option=['Quotes','Invoice','SalesOrder','PurchaseOrder']; // nach belieben fortsetzen ...
	for(var i=0; i<allmenues.length; i++) { 
		obj=allmenues.options[i];
		if (obj.selected==true)  tableswitch(option[i]);
	}
}


</script>
{/literal}
{if $MODULEVIEW ==1}
{literal}
<script>window.onload = function() {eval(disableFields(document.getElementById('pdfsettings')));}; </script>
{/literal}
{/if}
{if $MODULEVIEW !=1}
{literal}
<script>window.onload = function() {eval(setinitial(document.getElementById('displaymodul')));}</script>
{/literal}
{/if}
