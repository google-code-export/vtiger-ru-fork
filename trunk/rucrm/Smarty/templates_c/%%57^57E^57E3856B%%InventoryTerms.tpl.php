<?php /* Smarty version 2.6.18, created on 2011-03-13 18:17:52
         compiled from Settings/InventoryTerms.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/InventoryTerms.tpl', 17, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/menu.js"></script>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
<br>
<form action="index.php" method="post" name="tandc" onsubmit="VtigerJS_DialogBox.block();">
<input type="hidden" name="module" value="Settings">
<input type="hidden" name="action">
<input type="hidden" name="inv_terms_mode">
<input type="hidden" name="parenttab" value="Settings">
	<div align=center>
				
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "SetMenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
				<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('terms.gif', $this->_tpl_vars['THEME']); ?>
" width="48" height="48" border=0></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['INVENTORYTERMSANDCONDITIONS']; ?>
 </b></td>
				</tr>
				<tr>
					<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_INVEN_TANDC_DESC']; ?>
 </td>
				</tr>
				</table>
				
				<br>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
				
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
					<tr>
						<td class="big"><strong><?php echo $this->_tpl_vars['MOD']['LBL_TANDC_TEXT']; ?>
 </strong></td>
						<?php if ($this->_tpl_vars['INV_TERMS_MODE'] == 'view'): ?>
						<td class="small" align=right>
							<input class="crmButton small edit" title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" onclick="this.form.action.value='OrganizationTermsandConditions';this.form.inv_terms_mode.value='edit'" type="submit" name="Edit" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"> </td>

						<?php else: ?>
							<td  class="small" align=right> 
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="this.form.action.value='savetermsandconditions';">
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="crmButton small cancel" onclick="window.history.back()" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
							
						</td>
						<?php endif; ?>
					</tr>
					</table>
					
					<?php if ($this->_tpl_vars['INV_TERMS_MODE'] == 'view'): ?>
						<table border=0 cellspacing=0 cellpadding=5 width=100% >
						<tr>
						<td class="listRow small" valign=top style="padding:20px">
							<?php echo $this->_tpl_vars['INV_TERMSANDCONDITIONS']; ?>
 </td> 
					  </tr>
					</table>
						<?php else: ?>
							<table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">
							<tr>
								<td class="colHeader small" valign=top>Type the text below and click Save button </td>
					  		</tr>
							<tr>
								<td class="listTableRow small" valign=top>
								<textarea class=small name="inventory_tandc" style="width:95%; height:200px;text-align:left;"><?php echo $this->_tpl_vars['INV_TERMSANDCONDITIONS']; ?>
</textarea>

								</td>
							</tr>
							</table>	
						<?php endif; ?>
					<table border=0 cellspacing=0 cellpadding=5 width=100% >
					<tr>
					  <td class="small" nowrap align=right><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
</a></td>
					</tr>
					</table>
				</td>
				</tr>
				</table>
			
			
			
			</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
		
	</div>
	</form>
</td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
   </tr>
</tbody>
</table>