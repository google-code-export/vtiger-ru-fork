<?php /* Smarty version 2.6.18, created on 2011-03-14 09:21:35
         compiled from RelatedLists.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'RelatedLists.tpl', 59, false),)), $this); ?>
<script language="JavaScript" type="text/javascript" src="modules/PriceBooks/PriceBooks.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/ListView.js"></script>
<?php echo '
<script>

function editProductListPrice(id,pbid,price)
{
        $("status").style.display="inline";
        new Ajax.Request(
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: \'action=ProductsAjax&file=EditListPrice&return_action=CallRelatedList&return_module=PriceBooks&module=Products&record=\'+id+\'&pricebook_id=\'+pbid+\'&listprice=\'+price,
                        onComplete: function(response) {
                                        $("status").style.display="none";
                                        $("editlistprice").innerHTML= response.responseText;
                        }
                }
        );
}

function gotoUpdateListPrice(id,pbid,proid)
{
        $("status").style.display="inline";
        $("roleLay").style.display = "none";
        var listprice=$("list_price").value;
                new Ajax.Request(
                        \'index.php\',
                        {queue: {position: \'end\', scope: \'command\'},
                                method: \'post\',
                                postBody: \'module=Products&action=ProductsAjax&file=UpdateListPrice&ajax=true&return_action=CallRelatedList&return_module=PriceBooks&record=\'+id+\'&pricebook_id=\'+pbid+\'&product_id=\'+proid+\'&list_price=\'+listprice,
                                onComplete: function(response) {
                                        $("status").style.display="none";
										$("RLContents").update(response.responseText);
                                }
                        }
                );
}
'; ?>

</script>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'Buttons_List1.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- Contents -->
<div id="editlistprice" style="position:absolute;width:300px;"></div>
<table border=0 cellspacing=0 cellpadding=0 width=98% align=center>
<tr>
	<td valign=top><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
	<td class="showPanelBg" valign=top width=100%>
		<!-- PUBLIC CONTENTS STARTS-->
		<div class="small" style="padding:20px">
 	        	
			 <span class="lvtHeaderText"><font color="purple">[ <?php echo $this->_tpl_vars['MOD_SEQ_ID']; ?>
 ] </font><?php echo $this->_tpl_vars['NAME']; ?>
 -  <?php echo $this->_tpl_vars['SINGLE_MOD']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_INFORMATION']; ?>
</span> <br>
			 <?php echo $this->_tpl_vars['UPDATEINFO']; ?>

			 </span>&nbsp;&nbsp;<span id="vtbusy_info" style="display:none;" valign="bottom"><img src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
vtbusy.gif" border="0"></span><span id="vtbusy_info" style="visibility:hidden;" valign="bottom"><img src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
vtbusy.gif" border="0"></span>

			 <hr noshade size=1>
			 <br> 
		
			<!-- Account details tabs -->
			<table border=0 cellspacing=0 cellpadding=0 width=95% align=center>
			<tr>
				<td>
					<table border=0 cellspacing=0 cellpadding=3 width=100% class="small">
						<tr>
							<?php if ($this->_tpl_vars['OP_MODE'] == 'edit_view'): ?>
		                                                <?php $this->assign('action', 'EditView'); ?>
                		                        <?php else: ?>
                                		                <?php $this->assign('action', 'DetailView'); ?>
		                                        <?php endif; ?>
							<td class="dvtTabCache" style="width:10px" nowrap>&nbsp;</td>
							<?php if ($this->_tpl_vars['MODULE'] == 'Calendar'): ?>
                                                	<td class="dvtUnSelectedCell" align=center nowrap><a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&module=<?php echo $this->_tpl_vars['MODULE']; ?>
&record=<?php echo $this->_tpl_vars['ID']; ?>
&activity_mode=<?php echo $this->_tpl_vars['ACTIVITY_MODE']; ?>
&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['SINGLE_MOD']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_INFORMATION']; ?>
</a></td>
		                                        <?php else: ?>
                		                        <td class="dvtUnSelectedCell" align=center nowrap><a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&module=<?php echo $this->_tpl_vars['MODULE']; ?>
&record=<?php echo $this->_tpl_vars['ID']; ?>
&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['SINGLE_MOD']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_INFORMATION']; ?>
</a></td>
                                		        <?php endif; ?>
							<td class="dvtTabCache" style="width:10px">&nbsp;</td>
							<td class="dvtSelectedCell" align=center nowrap><?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_INFORMATION']; ?>
</td>
							<td class="dvtTabCache" style="width:100%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign=top align=left >
		                	<table border=0 cellspacing=0 cellpadding=3 width=100% class="dvtContentSpace" style="border-bottom:0;">
						<tr>
							<td align=left>
							<!-- content cache -->
								<table border=0 cellspacing=0 cellpadding=0 width=100%>
									<tr>
										<td style="padding:10px">
										   <!-- General details -->
												<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'RelatedListsHidden.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
												<div id="RLContents">
					                                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'RelatedListContents.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                        						        </div>
												</form>
										   
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table border=0 cellspacing=0 cellpadding=3 width=100% class="small">
						<tr>
							<?php if ($this->_tpl_vars['OP_MODE'] == 'edit_view'): ?>
		                                                <?php $this->assign('action', 'EditView'); ?>
                		                        <?php else: ?>
                                		                <?php $this->assign('action', 'DetailView'); ?>
		                                        <?php endif; ?>
							<td class="dvtTabCacheBottom" style="width:10px" nowrap>&nbsp;</td>
							<?php if ($this->_tpl_vars['MODULE'] == 'Calendar'): ?>
                                                	<td class="dvtUnSelectedCell" align=center nowrap><a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&module=<?php echo $this->_tpl_vars['MODULE']; ?>
&record=<?php echo $this->_tpl_vars['ID']; ?>
&activity_mode=<?php echo $this->_tpl_vars['ACTIVITY_MODE']; ?>
&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['SINGLE_MOD']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_INFORMATION']; ?>
</a></td>
		                                        <?php else: ?>
                		                        <td class="dvtUnSelectedCell" align=center nowrap><a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&module=<?php echo $this->_tpl_vars['MODULE']; ?>
&record=<?php echo $this->_tpl_vars['ID']; ?>
&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['SINGLE_MOD']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_INFORMATION']; ?>
</a></td>
                                		        <?php endif; ?>
							<td class="dvtTabCacheBottom" style="width:10px">&nbsp;</td>
							<td class="dvtSelectedCellBottom" align=center nowrap><?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_INFORMATION']; ?>
</td>
							<td class="dvtTabCacheBottom" style="width:100%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>
		</div>
	<!-- PUBLIC CONTENTS STOPS-->
	</td>
	<td align=right valign=top><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
</tr>
</table>

<?php if ($this->_tpl_vars['MODULE'] == 'Leads' || $this->_tpl_vars['MODULE'] == 'Contacts' || $this->_tpl_vars['MODULE'] == 'Accounts' || $this->_tpl_vars['MODULE'] == 'Campaigns' || $this->_tpl_vars['MODULE'] == 'Vendors'): ?>
<form name="SendMail" onsubmit="VtigerJS_DialogBox.block();"><div id="sendmail_cont" style="z-index:100001;position:absolute;width:300px;"></div></form>
<?php endif; ?>

<script>
function OpenWindow(url)
{
	openPopUp('xAttachFile',this,url,'attachfileWin',380,375,'menubar=no,toolbar=no,location=no,status=no,resizable=no');	
}
</script>