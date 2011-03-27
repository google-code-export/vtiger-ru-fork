<?php /* Smarty version 2.6.18, created on 2011-03-13 18:17:56
         compiled from Settings/CustomModEntityNoInfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getTranslatedString', 'Settings/CustomModEntityNoInfo.tpl', 16, false),)), $this); ?>

<table width="100%"  border="0" cellspacing="0" cellpadding="5">

<tr>
	<td nowrap class="small cellLabel">
		<strong><?php echo getTranslatedString($this->_tpl_vars['SELMODULE']); ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NUMBERING']; ?>
</strong>
	</td>
	<td width="100%" class="small cellText">
		 <b><?php echo $this->_tpl_vars['STATUSMSG']; ?>
</b>
	</td>
	<td width="80%" nowrap class="small cellText" align=right>
		<b><?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NUMBERING_FIX_MISSING']; ?>
</b>
		<input type="button" class="crmbutton small create" value="<?php echo $this->_tpl_vars['APP']['LBL_APPLY_BUTTON_LABEL']; ?>
" onclick="updateModEntityExisting(this, this.form);"/>
	</td>
</tr>

<tr>
	<td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_USE_PREFIX']; ?>
</strong></td>
    <td width="80%" colspan=2 class="small cellText">
	<input type="text" name="recprefix" class="small" style="width:30%" value="<?php echo $this->_tpl_vars['MODNUM_PREFIX']; ?>
"  />
	</td>
</tr>
<tr>
	<td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_START_SEQ']; ?>
<font color='red'>*</font></strong></td>
	<td width="80%" colspan=2 class="small cellText">
	<input type="text" name="recnumber" class="small" style="width:30%" value="<?php echo $this->_tpl_vars['MODNUM']; ?>
"  />
	</td>
</tr>

<tr>
	<td width="20%" nowrap colspan="3" align ="center">
		<input type="button" name="Button" class="crmbutton small save" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="updateModEntityNoSetting(this, this.form);" />
		<input type="button" name="Button" class="crmbutton small cancel" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" onclick="history.back(-1);" /></td>
	</td>
</tr>
</table>
