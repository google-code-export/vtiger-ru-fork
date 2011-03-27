<?php /* Smarty version 2.6.18, created on 2011-03-13 17:59:44
         compiled from Settings/TaxConfig.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/TaxConfig.tpl', 33, false),array('modifier', 'cat', 'Settings/TaxConfig.tpl', 119, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/menu.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/Inventory.js"></script>

<?php echo '
<style>
	
	.tax_delete{
		text-decoration:none;
	}
	
	.tax_delete td{
			
	}
	
</style>
'; ?>

<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody>
   <tr>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<br>
	<div align=center>

			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'SetMenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<!-- DISPLAY -->
<?php if ($this->_tpl_vars['EDIT_MODE'] == 'true'): ?>
	<?php $this->assign('formname', 'EditTax'); ?>
	<?php $this->assign('shformname', 'SHEditTax'); ?>
<?php else: ?>
	<?php $this->assign('formname', 'ListTax'); ?>
	<?php $this->assign('shformname', 'SHListTax'); ?>
<?php endif; ?>


<!-- This table is used to display the Tax Configuration values-->
<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
   <tr>
	<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('taxConfiguration.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
"></td>
	<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > 
		<?php if ($this->_tpl_vars['EDIT_MODE'] == 'true'): ?>
			<strong><?php echo $this->_tpl_vars['MOD']['LBL_EDIT']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_TAX_SETTINGS']; ?>
 </strong>
		<?php else: ?>
			<strong><?php echo $this->_tpl_vars['MOD']['LBL_TAX_SETTINGS']; ?>
 </strong>
		<?php endif; ?>
		</b>
	</td>
   </tr>
   <tr>
	<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_TAX_DESC']; ?>
</td>
   </tr>
</table>

<br>
<table border=0 cellspacing=0 cellpadding=10 width=100%>
   <tr>
	<td style="border-right:1px dotted #CCCCCC;" valign="top">
		<!-- if EDIT_MODE is true then Textbox will be displayed else the value will be displayed-->
		<form name="<?php echo $this->_tpl_vars['formname']; ?>
" method="POST" action="index.php" onsubmit="VtigerJS_DialogBox.block();">
		<input type="hidden" name="module" value="Settings">
		<input type="hidden" name="action" value="">
		<input type="hidden" name="parenttab" value="Settings">
		<input type="hidden" name="save_tax" value="">
		<input type="hidden" name="edit_tax" value="">
		<input type="hidden" name="add_tax_type" value="">

		<!-- Table to display the Product Tax Add and Edit Buttons - Starts -->
		<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
		   <tr>
			<td class="big" colspan="3"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_TAX_SETTINGS']; ?>
 </strong></td>
		   </tr>
		   <tr>
			<td>&nbsp;</td>
			<td id="td_add_tax" class="small" colspan="2" align="right" nowrap>
				<?php if ($this->_tpl_vars['EDIT_MODE'] != 'true'): ?>
					<input title="<?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
" accessKey="<?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
" onclick="fnAddTaxConfigRow('');" type="button" name="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
" class="crmButton small edit">
				<?php endif; ?>
			</td>
			<td class="small" align=right nowrap>
			<?php if ($this->_tpl_vars['EDIT_MODE'] == 'true'): ?>	
				<input class="crmButton small save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
"  onclick="this.form.action.value='TaxConfig'; this.form.save_tax.value='true'; this.form.parenttab.value='Settings'; return validateTaxes('tax_count');" type="submit" name="button2" value=" <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
  ">&nbsp;
				<input class="crmButton small cancel" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" onclick="this.form.action.value='TaxConfig'; this.form.module.value='Settings'; this.form.save_tax.value='false'; this.form.parenttab.value='Settings';" type="submit" name="button22" value="  <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
  ">
			<?php elseif ($this->_tpl_vars['TAX_COUNT'] > 0): ?>
				<input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" onclick="this.form.action.value='TaxConfig'; this.form.add_tax_type.value=''; this.form.edit_tax.value='true'; this.form.parenttab.value='Settings';" type="submit" name="button" value="  <?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
  " class="crmButton small edit">
			<?php endif; ?>
			</td>
		   </tr>
		</table>
		<!-- Table to display the Product Tax Add and Edit Buttons - Ends -->

		<!-- Table to display the List of Product Tax values - Starts -->
		<table id="add_tax" border=0 cellspacing=0 cellpadding=5 width=100% class="listRow">
		   <?php if ($this->_tpl_vars['TAX_COUNT'] == 0): ?>
			<tr><td><?php echo $this->_tpl_vars['MOD']['LBL_NO_TAXES_AVAILABLE']; ?>
. <?php echo $this->_tpl_vars['MOD']['LBL_PLEASE']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
.</td></tr>
		   <?php else: ?>
			<?php $_from = $this->_tpl_vars['TAX_VALUES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['count'] => $this->_tpl_vars['tax']):
?>

				<!-- To set the color coding for the taxes which are active and inactive-->
				<?php if ($this->_tpl_vars['tax']['deleted'] == 0): ?>
				   <tr><!-- set color to taxes which are active now-->
				<?php else: ?>
				   <tr><!-- set color to taxes which are disabled now-->
				<?php endif; ?>
				
				<!--assinging tax label name for javascript validation-->
				<?php $this->assign('tax_label', ((is_array($_tmp='taxlabel_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['tax']['taxname']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['tax']['taxname']))); ?> 
        
				<td width=35% class="cellLabel small" >
					<?php if ($this->_tpl_vars['EDIT_MODE'] == 'true'): ?>
						<input name="<?php echo $this->_tpl_vars['tax']['taxlabel']; ?>
" id=<?php echo $this->_tpl_vars['tax_label']; ?>
 type="text" value="<?php echo $this->_tpl_vars['tax']['taxlabel']; ?>
" class="detailedViewTextBox small">
					<?php else: ?>
						<?php echo $this->_tpl_vars['tax']['taxlabel']; ?>

					<?php endif; ?>
				</td>
				<td width=55% class="cellText small">
					<?php if ($this->_tpl_vars['EDIT_MODE'] == 'true'): ?>
						<input name="<?php echo $this->_tpl_vars['tax']['taxname']; ?>
" id="<?php echo $this->_tpl_vars['tax']['taxname']; ?>
" type="text" value="<?php echo $this->_tpl_vars['tax']['percentage']; ?>
" class="detailedViewTextBox small">&nbsp;%
					<?php else: ?>
						<?php echo $this->_tpl_vars['tax']['percentage']; ?>
&nbsp;%
					<?php endif; ?>
				</td>
				<td width=10% class="cellText small">
						<?php if ($this->_tpl_vars['tax']['deleted'] == 0): ?>
							<a href="index.php?module=Settings&action=TaxConfig&parenttab=Settings&disable=true&taxname=<?php echo $this->_tpl_vars['tax']['taxname']; ?>
"><img src="<?php echo vtiger_imageurl('enabled.gif', $this->_tpl_vars['THEME']); ?>
" border="0" align="absmiddle" alt="<?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
"></a>
						<?php else: ?>
							<a href="index.php?module=Settings&action=TaxConfig&parenttab=Settings&enable=true&taxname=<?php echo $this->_tpl_vars['tax']['taxname']; ?>
"><img src="<?php echo vtiger_imageurl('disabled.gif', $this->_tpl_vars['THEME']); ?>
" border="0" align="absmiddle" alt="<?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_DISABLE']; ?>
"></a>
						<?php endif; ?>
				</td>
			   </tr>
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['EDIT_MODE'] == 'true'): ?>
				<input type="hidden" id="tax_count" value="<?php echo $this->_tpl_vars['count']; ?>
">
			<?php endif; ?>
		   <?php endif; ?>
		</table>
		<!-- Table to display the List of Product Tax values - Ends -->
		</form>
	</td>

	<!-- Shipping Tax Config Table Starts Here -->
	<td width="50%" valign="top">
		<form name="<?php echo $this->_tpl_vars['shformname']; ?>
" method="POST" action="index.php">
		<input type="hidden" name="module" value="Settings">
		<input type="hidden" name="action" value="">
		<input type="hidden" name="parenttab" value="Settings">
		<input type="hidden" name="sh_save_tax" value="">
		<input type="hidden" name="sh_edit_tax" value="">
		<input type="hidden" name="sh_add_tax_type" value="">

		<!-- Table to display the S&H Tax Add and Edit Buttons - Starts -->
		<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
		   <tr>
        		<td class="big" colspan="3"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SHIPPING_HANDLING_TAX_SETTINGS']; ?>
</strong></td>
		   </tr>
		   <tr>
			<td>&nbsp;</td>
        		<td id="td_sh_add_tax" class="small" colspan="2" align="right" nowrap>
				<?php if ($this->_tpl_vars['SH_EDIT_MODE'] != 'true'): ?>
					<input title="<?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
" accessKey="<?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
" onclick="fnAddTaxConfigRow('sh');" type="button" name="button" value="  <?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
  " class="crmButton small edit">
				<?php endif; ?>
			</td>
			<td class="small" align=right nowrap>
				<?php if ($this->_tpl_vars['SH_EDIT_MODE'] == 'true'): ?>
					<input class="crmButton small save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
"  onclick="this.form.action.value='TaxConfig'; this.form.sh_save_tax.value='true'; this.form.parenttab.value='Settings'; return validateTaxes('sh_tax_count');" type="submit" name="button2" value=" <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
  ">
					&nbsp;
					<input class="crmButton small cancel" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" onclick="this.form.action.value='TaxConfig'; this.form.module.value='Settings'; this.form.sh_save_tax.value='false'; this.form.parenttab.value='Settings';" type="submit" name="button22" value="  <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
  ">
				<?php elseif ($this->_tpl_vars['SH_TAX_COUNT'] > 0): ?>
					<input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" onclick="this.form.action.value='TaxConfig'; this.form.sh_add_tax_type.value=''; this.form.sh_edit_tax.value='true'; this.form.parenttab.value='Settings';" type="submit" name="button" value="  <?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
  " class="crmButton small edit">
				<?php endif; ?>
			</td>
		   </tr>
		</table>
		<!-- Table to display the S&H Tax Add and Edit Buttons - Ends -->

		<!-- Table to display the List of S&H Tax Values - Starts -->
		<table id="sh_add_tax" border=0 cellspacing=0 cellpadding=5 width=100% class="listRow">
		   <?php if ($this->_tpl_vars['SH_TAX_COUNT'] == 0): ?>
			<tr><td><?php echo $this->_tpl_vars['MOD']['LBL_NO_TAXES_AVAILABLE']; ?>
. <?php echo $this->_tpl_vars['MOD']['LBL_PLEASE']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_ADD_TAX_BUTTON']; ?>
.</td></tr>
		   <?php else: ?>
		   	<?php $_from = $this->_tpl_vars['SH_TAX_VALUES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['count'] => $this->_tpl_vars['tax']):
?>

			<!-- To set the color coding for the taxes which are active and inactive-->
			<?php if ($this->_tpl_vars['tax']['deleted'] == 0): ?>
			   <tr><!-- set color to taxes which are active now-->
			<?php else: ?>
			   <tr><!-- set color to taxes which are disabled now-->
			<?php endif; ?>

			<?php $this->assign('tax_label', ((is_array($_tmp='taxlabel_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['tax']['taxname']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['tax']['taxname']))); ?> 
			<td width=35% class="cellLabel small">
			 	<?php if ($this->_tpl_vars['SH_EDIT_MODE'] == 'true'): ?>
			 	
					<input name="<?php echo $this->_tpl_vars['tax']['taxlabel']; ?>
" id="<?php echo $this->_tpl_vars['tax_label']; ?>
" type="text" value="<?php echo $this->_tpl_vars['tax']['taxlabel']; ?>
" class="detailedViewTextBox small">
			 	<?php else: ?> 
					<?php echo $this->_tpl_vars['tax']['taxlabel']; ?>

				<?php endif; ?>
			</td>
			<td width=55% class="cellText small">
				<?php if ($this->_tpl_vars['SH_EDIT_MODE'] == 'true'): ?>
					<input name="<?php echo $this->_tpl_vars['tax']['taxname']; ?>
" id="<?php echo $this->_tpl_vars['tax']['taxname']; ?>
" type="text" value="<?php echo $this->_tpl_vars['tax']['percentage']; ?>
" class="detailedViewTextBox small">
					&nbsp;% 
				<?php else: ?> 
					<?php echo $this->_tpl_vars['tax']['percentage']; ?>
&nbsp;% 
				<?php endif; ?>
			</td>
			<td width=10% class="cellText small"> 
				<?php if ($this->_tpl_vars['tax']['deleted'] == 0): ?>
						<a href="index.php?module=Settings&action=TaxConfig&parenttab=Settings&sh_disable=true&sh_taxname=<?php echo $this->_tpl_vars['tax']['taxname']; ?>
"><img src="<?php echo vtiger_imageurl('enabled.gif', $this->_tpl_vars['THEME']); ?>
" border="0" align="absmiddle" alt="<?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
"></a>
					<?php else: ?>
						<a href="index.php?module=Settings&action=TaxConfig&parenttab=Settings&sh_enable=true&sh_taxname=<?php echo $this->_tpl_vars['tax']['taxname']; ?>
"><img src="<?php echo vtiger_imageurl('disabled.gif', $this->_tpl_vars['THEME']); ?>
" border="0" align="absmiddle" alt="<?php echo $this->_tpl_vars['MOD']['LBL_DISABLE']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_DISABLE']; ?>
"></a>
					<?php endif; ?>
			</td>
		   </tr>
		   <?php endforeach; endif; unset($_from); ?>
		   <?php if ($this->_tpl_vars['SH_EDIT_MODE'] == 'true'): ?>
			<input type="hidden" id="sh_tax_count" value="<?php echo $this->_tpl_vars['count']; ?>
">
		   <?php endif; ?>
		<?php endif; ?>
		</table>
		<!-- Table to display the List of S&H Tax Values - Ends -->
	        </form>
	</td>
	<!-- Shipping Tax Ends Here -->
   </tr>
</table>

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
	</div>

</td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
   </tr>
</tbody>
</table>
<script>
	var tax_labelarr = {SAVE_BUTTON:'<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
',
                                CANCEL_BUTTON:'<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
',
                                TAX_NAME:'<?php echo $this->_tpl_vars['APP']['LBL_TAX_NAME']; ?>
',
                                TAX_VALUE:'<?php echo $this->_tpl_vars['APP']['LBL_TAX_VALUE']; ?>
'};
</script>