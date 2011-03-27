<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:47
         compiled from com_vtiger_workflow/ErrorMessageBox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'com_vtiger_workflow/ErrorMessageBox.tpl', 9, false),)), $this); ?>
<div id="error_message_box" class="layerPopup"  style="display:none; z-index: 100000220">
	<table width="100%" cellspacing="0" cellpadding="5" border="0" class="layerHeadingULine">
		<tr>
			<td width="60%" align="left" class="layerPopupHeading">
				<?php echo $this->_tpl_vars['MOD']['LBL_VALIDATION_ERROR']; ?>

			</td>
			<td width="40%" align="right">
				<a href="javascript:void(0);" id="error_message_box_close">
					<img border="0" align="middle" src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
"/>
				</a>
			</td>
		</tr>
	</table>
	<div class="popup_content" style='text-align: left;'>		
		<ol style="list-style-type: none;">
			<li id="empty_fields_message" style="display:none">
				<b><font color="red">*</font> <?php echo $this->_tpl_vars['MOD']['LBL_VALIDATION_MISSING_MANDATORY_FIELDS']; ?>
</b>
			</li>
			<li id="invalid_date_range_message" style="display:none">
				<b><font color="red">*</font> <?php echo $this->_tpl_vars['MOD']['LBL_VALIDATION_INVALID_DATE_RANGE']; ?>
</b>
			</li>
		</ol>
	</div>
</div>
	