<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:01
         compiled from MailScanner/MailScannerInfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'MailScanner/MailScannerInfo.tpl', 36, false),array('modifier', 'decode_html', 'MailScanner/MailScannerInfo.tpl', 97, false),array('modifier', 'addslashes', 'MailScanner/MailScannerInfo.tpl', 97, false),array('modifier', 'to_html', 'MailScanner/MailScannerInfo.tpl', 97, false),)), $this); ?>

<script language="JAVASCRIPT" type="text/javascript">
<?php echo '
function performScanNow(app_key, scannername) {
	$(\'status\').style.display = \'inline\';
	new Ajax.Request(
		\'index.php\',
		{queue: {position: \'end\', scope: \'command\'},
			method: \'post\',
			postBody: \'module=Settings&action=SettingsAjax&file=MailScanner\' + 
					  \'&mode=scannow&service=MailScanner&app_key=\' + encodeURIComponent(app_key)+ \'&scannername=\' + encodeURIComponent(scannername),
			onComplete: function(response) {
				$(\'status\').style.display = \'none\';
			}
		}
	);
}
'; ?>

</script>

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
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('mailScanner.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SCANNER']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SCANNER']; ?>
"></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SCANNER']; ?>
</b></td>
				</tr>
				<tr>
					<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SCANNER_DESCRIPTION']; ?>
</td>
				</tr>
				</table>
				
				<br>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				
				<tr>
					<td>
						<table border=0 cellspacing=0 cellpadding=2 width=100% class="tableHeading">
						<tr>
							<td class="big" width="70%"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MAILBOX']; ?>
</strong></td>
							<td width="30%" nowrap align="right">
								<a href="index.php?module=Settings&action=MailScanner&parenttab=Settings&mode=edit&scannername="><img src="<?php echo vtiger_imageurl('btnL3Add.gif', $this->_tpl_vars['THEME']); ?>
" border="0" /></a>
							</td>								
						</tr>
						</table>
					</td>
				</tr>
				
				<?php $_from = $this->_tpl_vars['SCANNERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['SCANNER']):
?>				
				
				<?php $this->assign('SCANNERINFO', $this->_tpl_vars['SCANNER']->getAsMap()); ?>				
				<tr>
				<td>

				<form action="index.php" method="post" id="form" onsubmit="VtigerJS_DialogBox.block();">
				<input type='hidden' name='module' value='Settings'>
				<input type='hidden' name='action' value='MailScanner'>
				<input type='hidden' name='mode' value='edit'>
				<input type='hidden' name='scannername' value='<?php echo $this->_tpl_vars['SCANNERINFO']['scannername']; ?>
'>
				<input type='hidden' name='return_action' value='MailScanner'>
				<input type='hidden' name='return_module' value='Settings'>
				<input type='hidden' name='parenttab' value='Settings'>
		
								<input type='hidden' name='xmode' value=''>
				<input type='hidden' name='file' value=''>
		
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
				<tr>
				<td class="big" width="70%"><strong><?php echo $this->_tpl_vars['SCANNERINFO']['scannername']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_INFORMATION']; ?>
</strong></td>
				<td width="30%" nowrap align="right">
					<?php if ($this->_tpl_vars['SCANNERINFO']['isvalid'] == true): ?>

					<?php if ($this->_tpl_vars['SCANNERINFO']['rules'] != false): ?>
					<input type="button" class="crmbutton small delete" value="<?php echo $this->_tpl_vars['MOD']['LBL_SCAN_NOW']; ?>
" 
						onclick="performScanNow('<?php echo $this->_tpl_vars['APP_KEY']; ?>
','<?php echo to_html(addslashes(decode_html($this->_tpl_vars['SCANNERINFO']['scannername']))); ?>
')" />
					<?php endif; ?>

					<input type="submit" class="crmbutton small cancel" onclick="this.form.mode.value='folder'" value="<?php echo $this->_tpl_vars['MOD']['LBL_SELECT']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_FOLDERS']; ?>
" />
					<input type="submit" class="crmbutton small create" onclick="this.form.mode.value='rule'" value="<?php echo $this->_tpl_vars['MOD']['LBL_SETUP']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_RULE']; ?>
" />
					<?php endif; ?>
					<input type="submit" class="crmbutton small edit" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT']; ?>
" />
					
					<input type="submit" class="crmbutton small delete" onclick="if(confirm(alert_arr.ARE_YOU_SURE)){with(this.form) {action.value='SettingsAjax';file.value='MailScanner';mode.value='Ajax';xmode.value='remove';}}else return false;" value="<?php echo $this->_tpl_vars['MOD']['LBL_DELETE']; ?>
" />
				</td>
				</tr>
				</table>
				
				<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
				<tr>
	         	    <td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
						<tr>
                            <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SCANNER']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
</strong></td>
                            <td width="80%" class="small cellText"><?php echo $this->_tpl_vars['SCANNERINFO']['scannername']; ?>
</td>
                        </tr>
                        <tr>
                            <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SERVER']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
</strong></td>
                            <td width="80%" class="small cellText"><?php echo $this->_tpl_vars['SCANNERINFO']['server']; ?>
</td>
                        </tr>
                        <tr>
							<td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PROTOCOL']; ?>
</strong></td>
			                <td width="80%" class="small cellText"><?php echo $this->_tpl_vars['SCANNERINFO']['protocol']; ?>
</td>
						</tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong></td>
               				<td width="80%" class="small cellText"><?php echo $this->_tpl_vars['SCANNERINFO']['username']; ?>
</td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SSL']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_TYPE']; ?>
</strong></td>
               				<td width="80%" class="small cellText"><?php echo $this->_tpl_vars['SCANNERINFO']['ssltype']; ?>
</td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SSL']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_METHOD']; ?>
</strong></td>
               				<td width="80%" class="small cellText"><?php echo $this->_tpl_vars['SCANNERINFO']['sslmethod']; ?>
</td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_CONNECT']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_URL_CAPS']; ?>
</strong></td>
               				<td width="80%" class="small cellText"><?php echo $this->_tpl_vars['SCANNERINFO']['connecturl']; ?>
</td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_STATUS']; ?>
</strong></td>
               				<td width="80%" class="small cellText">
								<?php if ($this->_tpl_vars['SCANNERINFO']['isvalid'] == true): ?><font color=green><b><?php echo $this->_tpl_vars['MOD']['LBL_ENABLED']; ?>
</b></font>
								<?php elseif ($this->_tpl_vars['SCANNERINFO']['isvalid'] == false): ?><font color=red><b><?php echo $this->_tpl_vars['MOD']['LBL_DISABLED']; ?>
</b></font><?php endif; ?>
							</td>
                        </tr></table>
				    </td>
            	</tr>
				</table>	
				
				<?php if ($this->_tpl_vars['SCANNERINFO']['isvalid']): ?>
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
					<tr>
					<td class="big" width="70%"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SCANNING']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_INFORMATION']; ?>
</strong></td>
					<td width="30%" nowrap align="right">&nbsp;</td>
					</tr>
					</table>

					<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
					<tr>
	        	 	    <td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
							<tr>
                    	        <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_LOOKFOR']; ?>
</strong></td>
                        	    <td width="80%" class="small cellText">
									<?php if ($this->_tpl_vars['SCANNERINFO']['searchfor'] == 'ALL'): ?><?php echo $this->_tpl_vars['MOD']['LBL_ALL']; ?>

									<?php elseif ($this->_tpl_vars['SCANNERINFO']['searchfor'] == 'UNSEEN'): ?><?php echo $this->_tpl_vars['MOD']['LBL_UNREAD']; ?>
<?php endif; ?>
									<?php echo $this->_tpl_vars['MOD']['LBL_MESSAGES_FROM_LASTSCAN']; ?>

									<?php if ($this->_tpl_vars['SCANNERINFO']['requireRescan']): ?> [<?php echo $this->_tpl_vars['MOD']['LBL_INCLUDE']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_SKIPPED']; ?>
] <?php endif; ?>
								</td>
                        	</tr>
							<tr>
                           		<td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_AFTER_SCAN']; ?>
</strong></td>
                           		<td width="80%" class="small cellText">
									<?php if ($this->_tpl_vars['SCANNERINFO']['markas'] == 'SEEN'): ?><?php echo $this->_tpl_vars['MOD']['LBL_MARK_MESSAGE_AS']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_READ']; ?>
<?php endif; ?>
								</td>
    	                    </tr>
						</td></table>
					</tr>
					</table>
				<?php endif; ?>
				</form>
				
				</td>
				</tr>
				
				<?php endforeach; endif; unset($_from); ?>
				
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
</form>
</table>

</tr>
</table>

</tr>
</table>