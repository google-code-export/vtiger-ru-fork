<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:06
         compiled from com_vtiger_workflow/ModuleTitle.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'com_vtiger_workflow/ModuleTitle.tpl', 4, false),)), $this); ?>
<table width="100%" cellspacing="0" cellpadding="5" border="0" class="settingsSelUITopLine"><tbody>
	<tr>
		<td width="50" valign="top" rowspan="2">
			<img width="48" height="48" border="0" src="<?php echo vtiger_imageurl('settingsWorkflow.png', $this->_tpl_vars['THEME']); ?>
"/>
		</td>
		<td valign="bottom" class="heading2">
			<b><a href="index.php?module=Settings&amp;action=index&amp;parenttab=Settings">Settings</a> > 
				<a href="index.php?module=<?php echo $this->_tpl_vars['module']->name; ?>
&amp;action=workflowlist&amp;parenttab=Settings"><?php echo $this->_tpl_vars['MODULE_NAME']; ?>
</a> > <?php echo $this->_tpl_vars['PAGE_NAME']; ?>
 </b>
		</td>
	</tr>
	<tr>
		<td valign="top" class="small"><?php echo $this->_tpl_vars['PAGE_TITLE']; ?>
</td>
	</tr>
</tbody></table>
<br>