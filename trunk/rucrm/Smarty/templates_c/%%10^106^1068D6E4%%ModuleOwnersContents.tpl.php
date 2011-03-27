<?php /* Smarty version 2.6.18, created on 2011-03-13 18:17:33
         compiled from Settings/ModuleOwnersContents.tpl */ ?>
<form name="support_owners" method="POST" action="index.php" onsubmit="VtigerJS_DialogBox.block();">
	<input type="hidden" name="module" value="Settings">
	<input type="hidden" name="parenttab" value="Settings">
	<input type="hidden" name="action" value="SettingsAjax">
	<input type="hidden" name="file" value="ListModuleOwners">
<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
<tr>
	<td class="big"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MODULES_AND_OWNERS']; ?>
</strong></td>
	<td class="small" align=right>
<div align="right">
<?php if ($this->_tpl_vars['MODULE_MODE'] != 'edit'): ?>
		<input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="crmButton small edit" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
" onClick="assignmodulefn('edit');">
<?php else: ?>
		<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onClick="assignmodulefn('save');" >&nbsp;
						<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="crmButton small cancel" onclick="this.form.action.value='ListModuleOwners'; this.form.parenttab.value='Settings';" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" >
<?php endif; ?>
</div>
</td>
</tr>
					
</table>
	<table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">	
	<tr>
		<td class="colHeader small" width="2%">#</td>
		<td class="colHeader small" width="30%"><?php echo $this->_tpl_vars['MOD']['LBL_MODULE']; ?>
</td>
		<td class="colHeader small" width="65%"><?php echo $this->_tpl_vars['MOD']['LBL_OWNER']; ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['MODULE_MODE'] != 'edit'): ?>
	<?php $_from = $this->_tpl_vars['USER_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modulelists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modulelists']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['modules']):
        $this->_foreach['modulelists']['iteration']++;
?>
	<tr>
		<td class="listTableRow small" valign="top"><?php echo $this->_foreach['modulelists']['iteration']; ?>
</td>
		<td class="listTableRow small" valign="top"><?php echo $this->_tpl_vars['APP'][$this->_tpl_vars['modules']['0']]; ?>
</td>
		<td class="listTableRow small" valign="top"><a href="index.php?module=Users&action=DetailView&record=<?php echo $this->_tpl_vars['modules']['1']; ?>
"><?php echo $this->_tpl_vars['modules']['2']; ?>
</a></td>	
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
	<?php $_from = $this->_tpl_vars['USER_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modulelists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modulelists']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['modules']):
        $this->_foreach['modulelists']['iteration']++;
?>
	<tr>
		<td class="listTableRow small" valign="top"><?php echo $this->_foreach['modulelists']['iteration']; ?>
</td>
		<td class="listTableRow small" valign="top"><?php echo $this->_tpl_vars['APP'][$this->_tpl_vars['modules']['0']]; ?>
</td>
		<td class="listTableRow small" valign="top"><?php echo $this->_tpl_vars['modules']['1']; ?>
</td>	
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	</table>
</form>