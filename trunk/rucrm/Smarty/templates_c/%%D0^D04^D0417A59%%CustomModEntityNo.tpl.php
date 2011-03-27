<?php /* Smarty version 2.6.18, created on 2011-03-13 18:17:56
         compiled from Settings/CustomModEntityNo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/CustomModEntityNo.tpl', 124, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function getModuleEntityNoInfo(form) {
	var module = form.selmodule.value;

	$("status").style.display="inline";
	new Ajax.Request(
    	\'index.php\',
        {queue: {position: \'end\', scope: \'command\'},
        	method: \'post\',
            postBody: \'module=Settings&action=SettingsAjax&file=CustomModEntityNo&ajax=true&selmodule=\' + encodeURIComponent(module),
            onComplete: function(response) {
				$("status").style.display="none";

				var restext = response.responseText;
				$(\'customentity_infodiv\').innerHTML = restext;
            }
        }
    );
}
function updateModEntityNoSetting(button, form) {
	var module = form.selmodule.value;
	var recprefix = form.recprefix.value;
    var recnumber = form.recnumber.value;
	var mode = \'UPDATESETTINGS\';

	if(recnumber == \'\') {
		alert("Start sequence cannot be empty!");
		return;
	}

	if(recnumber.match(/[^0-9]+/) != null) {
		alert("Start sequence should be numeric.");
		return;
	}

	$("status").style.display="inline";
	button.disabled = true;

	new Ajax.Request(
    	\'index.php\',
        {queue: {position: \'end\', scope: \'command\'},
        	method: \'post\',
            postBody: \'module=Settings&action=SettingsAjax&file=CustomModEntityNo&ajax=true\' + 
					\'&selmodule=\' + encodeURIComponent(module) +
					\'&recprefix=\' + encodeURIComponent(recprefix) +
                    \'&recnumber=\' + encodeURIComponent(recnumber) +
					\'&mode=\' + encodeURIComponent(mode),

            onComplete: function(response) {
				$("status").style.display="none";

				var restext = response.responseText;
				$(\'customentity_infodiv\').innerHTML = restext;
            }
        }
    );
}
function updateModEntityExisting(button, form) {
	var module = form.selmodule.value;
	var recprefix = form.recprefix.value;
    var recnumber = form.recnumber.value;
	var mode = \'UPDATEBULKEXISTING\';

	if(recnumber == \'\') {
		alert("Start sequence cannot be empty!");
		return;
	}

	if(recnumber.match(/[^0-9]+/) != null) {
		alert("Start sequence should be numeric.");
		return;
	}

	VtigerJS_DialogBox.progress();
	button.disabled = true;

	new Ajax.Request(
    	\'index.php\',
        {queue: {position: \'end\', scope: \'command\'},
        	method: \'post\',
            postBody: \'module=Settings&action=SettingsAjax&file=CustomModEntityNo&ajax=true\' + 
					\'&selmodule=\' + encodeURIComponent(module) +
					\'&mode=\' + encodeURIComponent(mode),

            onComplete: function(response) {
				VtigerJS_DialogBox.hideprogress();

				var restext = response.responseText;
				$(\'customentity_infodiv\').innerHTML = restext;
            }
        }
    );
}
</script>
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
		<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
		<tr>
			<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('settingsInvNumber.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_CUSTOMIZE_MODENT_NUMBER']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_CUSTOMIZE_MODENT_NUMBER']; ?>
"></td>
			<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_CUSTOMIZE_MODENT_NUMBER']; ?>
</b></td>
		</tr>
		<tr>
			<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_CUSTOMIZE_MODENT_NUMBER_DESCRIPTION']; ?>
</td>
		</tr>
		</table>				
		<br>
		<form method="POST" action="javascript:;" onsubmit="VtigerJS_DialogBox.block();">
		<table border="0" cellpadding="10" cellspacing="0" width="100%">
		<tr>
			<td>
				<table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td class="small" align="right">
					<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_CF_TEXT']; ?>

		            <select name="selmodule" class="small" onChange="getModuleEntityNoInfo(this.form)">
                		<?php $_from = $this->_tpl_vars['MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sel_value'] => $this->_tpl_vars['value']):
?>
		                <?php if ($this->_tpl_vars['SELMODULE'] == $this->_tpl_vars['sel_value']): ?>
                	    	<?php $this->assign('selected_val', 'selected'); ?>
		                <?php else: ?>
                        	<?php $this->assign('selected_val', ""); ?>
                        <?php endif; ?>
                        <?php $this->assign('MODULE_LABEL', $this->_tpl_vars['value']); ?>
						<?php if ($this->_tpl_vars['APP'][$this->_tpl_vars['value']] != ''): ?>		
							<?php $this->assign('MODULE_LABEL', $this->_tpl_vars['APP'][$this->_tpl_vars['value']]); ?>
						<?php endif; ?>
	                    <option value="<?php echo $this->_tpl_vars['sel_value']; ?>
" <?php echo $this->_tpl_vars['selected_val']; ?>
><?php echo $this->_tpl_vars['MODULE_LABEL']; ?>
</option>
        		        <?php endforeach; endif; unset($_from); ?>
			        </select>
					</td>
				</tr>
				</table>

				<div id='customentity_infodiv' class="listRow">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'Settings/CustomModEntityNoInfo.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>				
				</div>

			<table border="0" cellpadding="5" cellspacing="0" width="100%">
			<tr>
				<td class="small" align="right" nowrap="nowrap"><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
</a></td>
			</tr>
			</table>
			</td>
		</tr>
		</table>
		</form>

		<!-- End of Display -->
		
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

<br>
