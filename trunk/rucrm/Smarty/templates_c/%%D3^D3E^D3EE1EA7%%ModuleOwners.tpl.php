<?php /* Smarty version 2.6.18, created on 2011-03-13 18:17:33
         compiled from Settings/ModuleOwners.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/ModuleOwners.tpl', 17, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/menu.js"></script>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
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
			<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
			<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('assign.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
"></td>
				<td class="heading2" valign="bottom" ><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_MODULE_OWNERS']; ?>
 </b></td>
			</tr>
			<tr>
				<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_MODULE_OWNERS_DESCRIPTION']; ?>
</td>
			</tr>
			</table>
			<br>
			<table border=0 cellspacing=0 cellpadding=10 width=100% >
			<tr>
			<td>

					<div id="module_list_owner">	
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'Settings/ModuleOwnersContents.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
	
	<table border=0 cellspacing=0 cellpadding=5 width=100% >
	<tr><td class="small" nowrap align=right><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
</a></td></tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</form>
	</table>
		
	</div>

</td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
   </tr>
</tbody>
</table>

	
<?php echo '
<script>
function assignmodulefn(mode)
{
	$("status").style.display="inline";
	var urlstring =\'\';
	for(i = 0;i < document.support_owners.elements.length;i++)
	{
		if(document.support_owners.elements[i].name != \'button\')
		urlstring +=\'&\'+document.support_owners.elements[i].name+\'=\'+document.support_owners.elements[i].value;
	}
	new Ajax.Request(
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: urlstring+\'&list_module_mode=\'+mode+\'&file_mode=ajax\',
                        onComplete: function(response) {
                                $("status").style.display="none";
				$("module_list_owner").innerHTML=response.responseText;
                        }
                }
        );
}
</script>
'; ?>
