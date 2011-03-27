<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:06
         compiled from com_vtiger_workflow/ListWorkflows.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'com_vtiger_workflow/ListWorkflows.tpl', 18, false),array('modifier', 'getTranslatedString', 'com_vtiger_workflow/ListWorkflows.tpl', 41, false),array('modifier', 'to_html', 'com_vtiger_workflow/ListWorkflows.tpl', 122, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'com_vtiger_workflow/Header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="modules/<?php echo $this->_tpl_vars['module']->name; ?>
/resources/jquery-1.2.6.js" type="text/javascript" charset="utf-8"></script>
<script src="modules/<?php echo $this->_tpl_vars['module']->name; ?>
/resources/json2.js" type="text/javascript" charset="utf-8"></script>
<script src="modules/<?php echo $this->_tpl_vars['module']->name; ?>
/resources/functional.js" type="text/javascript" charset="utf-8"></script>
<script src="modules/<?php echo $this->_tpl_vars['module']->name; ?>
/resources/workflowlistscript.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	fn.addStylesheet('modules/<?php echo $this->_tpl_vars['module']->name; ?>
/resources/style.css');
</script>
<!--New workflow popup-->
<div id="new_workflow_popup" class="layerPopup" style="display:none;">
	<table width="100%" cellspacing="0" cellpadding="5" border="0" class="layerHeadingULine">
		<tr>
			<td width="80%" align="left" class="layerPopupHeading">
				<?php echo $this->_tpl_vars['MOD']['LBL_CREATE_WORKFLOW']; ?>

				</td>
			<td width="20%" align="right">
				<a href="javascript:void(0);" id="new_workflow_popup_close">
					<img border="0" align="middle" src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
"/>
				</a>
			</td>
		</tr>
	</table>
	
	<form action="index.php" method="post" accept-charset="utf-8" onsubmit="VtigerJS_DialogBox.block();">
		<div class="popup_content">
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr align="left">
					<td><input type="radio" name="source" value="from_module" checked="true" class="workflow_creation_mode">
						<?php echo $this->_tpl_vars['MOD']['LBL_FOR_MODULE']; ?>
</td>
					<td><input type="radio" name="source" value="from_template" class="workflow_creation_mode">
						<?php echo $this->_tpl_vars['MOD']['LBL_FROM_TEMPLATE']; ?>
</td>
				</tr>
			</table>
			<table width="100%" cellpadding="5" cellspacing="0" border="0">
				<tr align="left">
					<td width='10%' nowrap="nowrap"><?php echo $this->_tpl_vars['MOD']['LBL_CREATE_WORKFLOW_FOR']; ?>
</td>
					<td>
						<select name="module_name" id="module_list" class="small">
<?php $_from = $this->_tpl_vars['moduleNames']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['moduleName']):
?>
							<option value="<?php echo $this->_tpl_vars['moduleName']; ?>
" <?php if ($this->_tpl_vars['moduleName'] == $this->_tpl_vars['listModule']): ?>selected="selected"<?php endif; ?>>
								<?php echo getTranslatedString($this->_tpl_vars['moduleName'], $this->_tpl_vars['moduleName']); ?>

							</option>
<?php endforeach; endif; unset($_from); ?>
						</select>
					</td>
				</tr>
				<tr align="left" id="template_select_field" style="display:none;">
					<td><?php echo $this->_tpl_vars['MOD']['LBL_CHOOSE_A_TEMPLATE']; ?>
</td>
					<td>
						<span id="template_list_busyicon"><b><?php echo $this->_tpl_vars['MOD']['LBL_LOADING']; ?>
</b><img src="<?php echo vtiger_imageurl('vtbusy.gif', $this->_tpl_vars['THEME']); ?>
" border="0"></span>
						<span id="template_list_foundnone" style='display:none;'><b><?php echo $this->_tpl_vars['MOD']['LBL_NO_TEMPLATES']; ?>
</b></span>
						<select id="template_list" name="template_id" class="small"></select>						
					</td>
				</tr>
			</table>
			<input type="hidden" name="save_type" value="new" id="save_type_new">
			<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']->name; ?>
" id="save_module">
			<input type="hidden" name="action" value="editworkflow" id="save_action">
			<table width="100%" cellspacing="0" cellpadding="5" border="0" class="layerPopupTransport">
				<tr><td align="center">
					<input type="submit" class="crmButton small save" value="<?php echo $this->_tpl_vars['APP']['LBL_CREATE_BUTTON_LABEL']; ?>
" name="save" id='new_workflow_popup_save'/> 
					<input type="button" class="crmButton small cancel" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
 " name="cancel" id='new_workflow_popup_cancel'/>
				</td></tr>
			</table>
		</div>
	</form>
</div>
<!--Done Popups-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'SetMenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="view">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'com_vtiger_workflow/ModuleTitle.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<table class="tableHeading" width="100%" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td class="big" nowrap="nowrap">
				<strong><span id="module_info"></span></strong>
			</td>
			<td class="small" align="right">
				<form action="index.php" method="get" accept-charset="utf-8" id="filter_modules" onsubmit="VtigerJS_DialogBox.block();" style="display: inline;">
					<b><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE']; ?>
: </b>
					<select class="importBox" name="list_module" id='pick_module'>
						<option value="All"><?php echo $this->_tpl_vars['APP']['LBL_ALL']; ?>
</a>
							<option value="All" disabled="disabled" >-----------------------------</a>
<?php $_from = $this->_tpl_vars['moduleNames']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['moduleName']):
?>
						<option value="<?php echo $this->_tpl_vars['moduleName']; ?>
" <?php if ($this->_tpl_vars['moduleName'] == $this->_tpl_vars['listModule']): ?>selected="selected"<?php endif; ?>>
							<?php echo getTranslatedString($this->_tpl_vars['moduleName'], $this->_tpl_vars['moduleName']); ?>

						</option>
<?php endforeach; endif; unset($_from); ?>
					</select>
					<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']->name; ?>
">
					<input type="hidden" name="action" value="workflowlist">
				</form>

			</td>
		</tr>
	</table>

	<table class="listTableTopButtons" width="100%" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td class="small"> <span id="status_message"></span> </td>
			<td class="small" align="right">
				<input type="button" class="crmButton create small" 
					value="<?php echo $this->_tpl_vars['MOD']['LBL_NEW_WORKFLOW']; ?>
" id='new_workflow'/>
			</td>
		</tr>
	</table>
	<table class="listTable" width="100%" border="0" cellspacing="0" cellpadding="5" id='expressionlist'>
		<tr>
			<td class="colHeader small" width="20%">
				Module
			</td>
			<td class="colHeader small" width="65">
				Description
			</td>
			<td class="colHeader small" width="15%">
				Tools
			</td>
		</tr>
<?php $_from = $this->_tpl_vars['workflows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['workflow']):
?>
		<tr>
			<td class="listTableRow small"><?php echo getTranslatedString($this->_tpl_vars['workflow']->moduleName, $this->_tpl_vars['workflow']->moduleName); ?>
</td>
			<td class="listTableRow small"><?php echo to_html($this->_tpl_vars['workflow']->description); ?>
</td>
			<td class="listTableRow small">
				<a href="<?php echo $this->_tpl_vars['module']->editWorkflowUrl($this->_tpl_vars['workflow']->id); ?>
">
					<img border="0" title="Edit" alt="Edit" \
						style="cursor: pointer;" id="expressionlist_editlink_<?php echo $this->_tpl_vars['workflow']->id; ?>
" \
						src="<?php echo vtiger_imageurl('editfield.gif', $this->_tpl_vars['THEME']); ?>
"/>
				</a>
				<a href="<?php echo $this->_tpl_vars['module']->deleteWorkflowUrl($this->_tpl_vars['workflow']->id); ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['APP']['SURE_TO_DELETE']; ?>
');">
					<img border="0" title="Delete" alt="Delete"\
			 			src="<?php echo vtiger_imageurl('delete.gif', $this->_tpl_vars['THEME']); ?>
" \
						style="cursor: pointer;" id="expressionlist_deletelink_<?php echo $this->_tpl_vars['workflow']->id; ?>
" />
				</a>
			</td>
		</tr>
<?php endforeach; endif; unset($_from); ?>
	</table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'com_vtiger_workflow/Footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
