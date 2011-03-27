<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:59
         compiled from modules/CustomerPortal/AdvancedSettings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'modules/CustomerPortal/AdvancedSettings.tpl', 24, false),)), $this); ?>
<script language="JavaScript" type="text/javascript" src="modules/<?php echo $this->_tpl_vars['MODULE']; ?>
/<?php echo $this->_tpl_vars['MODULE']; ?>
.js"></script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'Buttons_List.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form  method="post" name="new" id="form">
<input type="hidden" name="module" value="CustomerPortal">
<input type="hidden" name="action" value="AdvancedSettings">
<input type="hidden" name="return_action" value="AdvancedSettings">
<input type="hidden" name="mode" value="save">

<table border=0 cellspacing=0 cellpadding=0 width="98%" align=center>
    <tr>
        <td valign=top><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
		<td class="showPanelBg" valign="top" width="100%" style="padding:10px;">
		<div class="small" style="width:100%;position:relative;">
			<table border=0 cellspacing=1 cellpadding=0 width="100%" class="lvtBg">
			<tr>
				<td>
					<table border=0 cellspacing=0 cellpadding=2 width="100%" class="small"> 
					<tr>
						<td style="padding-right:20px" nowrap align=right></td>
					</tr>
					</table>
					
					<table border=0 cellspacing=0 cellpadding=0 width="95%" class="small">
					<!-- Tab Links -->
					<tr><td>
						<table border=0 cellspacing=0 cellpadding=3 width="100%" class="small">
						<tr>
							<td class="dvtTabCache" style="width:10px" nowrap></td>
							<td class="dvtUnSelectedCell" align="left" nowrap><a href="index.php?module=CustomerPortal&action=ListView&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['MOD']['LBL_BASIC_SETTINGS']; ?>
</a></td>
							<td class="dvtTabCache" style="width:10px"></td>
							<td class="dvtSelectedCell" align="left" nowrap><?php echo $this->_tpl_vars['MOD']['LBL_ADVANCED_SETTINGS']; ?>
</a></td>
							<td class="dvtTabCache" width="100%">&nbsp;</td>
						</tr>
						</table>
					</td></tr>
					
					<!-- Acutal Contents -->				
					<tr><td>
						<table border=0 cellspacing=0 cellpadding=10 width="100%" class="dvtContentSpace" style='border-bottom: 0'>
						<tr>
							<td>
								<div>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/CustomerPortal/AdvancedSettingsContents.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
								</div>
							</td>
						</tr>
						</table>
					</td></tr>
					
					<!-- Tab Links -->
					<tr><td>
						<table border=0 cellspacing=0 cellpadding=3 width="100%" class="small">
						<tr>
							<td class="dvtTabCacheBottom" style="width:10px" nowrap></td>
							<td class="dvtUnSelectedCell" align="left" nowrap><a href="index.php?module=CustomerPortal&action=ListView&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['MOD']['LBL_BASIC_SETTINGS']; ?>
</a></td>
							<td class="dvtTabCacheBottom" style="width:10px"></td>
							<td class="dvtSelectedCellBottom" align="left" nowrap><?php echo $this->_tpl_vars['MOD']['LBL_ADVANCED_SETTINGS']; ?>
</a></td>
							<td class="dvtTabCacheBottom" width="100%">&nbsp;</td>
						</tr>
						</table>
					</td></tr>
					
					</table>
										
				</td>
			</tr>
			</table>
		</div>
		</td>
	</tr>
</table>
</form>