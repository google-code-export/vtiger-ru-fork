<?php /* Smarty version 2.6.18, created on 2011-03-13 17:59:51
         compiled from CurrencyListView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'CurrencyListView.tpl', 17, false),)), $this); ?>
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
			<form action="index.php" onsubmit="VtigerJS_DialogBox.block();">
			<input type="hidden" name="module" value="Settings">
			<input type="hidden" name="action" value="CurrencyEditView">
			<input type="hidden" name="parenttab" value="<?php echo $this->_tpl_vars['PARENTTAB']; ?>
">
			<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('currency.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
"></td>
				<td class="heading2" valign="bottom" ><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_SETTINGS']; ?>
 </b></td>
			</tr>
			<tr>
				<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_DESCRIPTION']; ?>
</td>
			</tr>
			</table>
			<br>
			<table border=0 cellspacing=0 cellpadding=10 width=100% >
			<tr>
			<td>

			<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
				<tr>
					<td class="big"><strong><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_LIST']; ?>
</strong></td>
                	       		<td class="small" align="right">&nbsp;</td>
				</tr>
			</table>

			<table width="100%" border="0" cellpadding="5" cellspacing="0" class="listTableTopButtons">
	                <tr>
				<td class=small align=right>
					<input type="submit" value="<?php echo $this->_tpl_vars['MOD']['LBL_NEW_CURRENCY']; ?>
" class="crmButton create small">
				</td>
	                </tr>
	                </table>

			<div id="CurrencyListViewContents">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CurrencyListViewEntries.tpl", 'smarty_include_vars' => array()));
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

<div id="currencydiv" style="display:block;position:absolute;width:250px;"></div>

<?php echo '
<script>
	function deleteCurrency(currid)
	{
		$("status").style.display="inline";
		new Ajax.Request(
			\'index.php\',
			{queue: {position: \'end\', scope: \'command\'},
				method: \'post\',
				postBody: \'action=SettingsAjax&file=CurrencyDeleteStep1&return_action=CurrencyListView&return_module=Settings&module=Settings&parenttab=Settings&id=\'+currid,
				onComplete: function(response) {
					$("status").style.display="none";
                                        $("currencydiv").innerHTML= response.responseText;
                                }
                        }
		);
	}

	function transferCurrency(del_currencyid)
	{
		$("status").style.display="inline";
		$("CurrencyDeleteLay").style.display = "none";
		var trans_currencyid=$("transfer_currency_id").options[$("transfer_currency_id").options.selectedIndex].value;
		new Ajax.Request(
			\'index.php\',
			{queue: {position: \'end\', scope: \'command\'},
				method: \'post\',
				postBody: \'module=Settings&action=SettingsAjax&file=CurrencyDelete&ajax=true&delete_currency_id=\'+del_currencyid+\'&transfer_currency_id=\'+trans_currencyid,
				onComplete: function(response) {
					$("status").style.display="none";
					$("CurrencyListViewContents").innerHTML= response.responseText;
				}
			}
		);
	}
</script>

'; ?>
