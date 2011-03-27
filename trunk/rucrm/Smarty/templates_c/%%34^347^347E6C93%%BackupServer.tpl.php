<?php /* Smarty version 2.6.18, created on 2011-03-13 18:00:14
         compiled from Settings/BackupServer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/BackupServer.tpl', 17, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<br>
<strong><?php if ($this->_tpl_vars['BACKUP_RESULT'] != ''): ?> <?php echo $this->_tpl_vars['APP']['LBL_BACKEDUPSUCCESSFULLY_TO_FILE']; ?>
 : <?php echo $this->_tpl_vars['BACKUP_RESULT']; ?>
<?php endif; ?></strong>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
<br>
														
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "SetMenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">

				<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('backupserver.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
"></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_BACKUP_SERVER_SETTINGS']; ?>
 </b></td>
				</tr>
				<tr>
					<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_BACKUP_SERVER_DESC']; ?>
 </td>
				</tr>
				</table>
				<form action="index.php" method="post" name="tandd" onsubmit="VtigerJS_DialogBox.block();">
				<input type="hidden" name="server_type" value="local_backup">
				<input type="hidden" name="module" value="Settings">
				<input type="hidden" name="action" value="index">
				<input type="hidden" name="local_server_mode">
				<input type="hidden" name="parenttab" value="Settings">				
				<table border=0 cellspacing=0 cellpadding=0 width=100% class="tableHeading">
					<tr>
						<td class="big" height="40px;" width="70%">&nbsp;&nbsp;<strong><?php echo $this->_tpl_vars['MOD']['LBL_BACKUP_SERVER_SETTINGS']; ?>
</strong></td>
						<td class="small cellText" align="center" width="30%">&nbsp;
							<span id="view_info" class="crmButton small cancel" style="display:none;"></span>
						</td>
					</tr>
				</table>
				
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="listRow">
					<tr>
						<td class="small" valign=top >
							<table width="100%"  border="0" cellspacing="0" cellpadding="0">
								<tr height='30px'>
									<td width="20%" class="cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_BACKUP_SERVER_SETTINGS']; ?>
(<?php echo $this->_tpl_vars['MOD']['LBL_LOCAL']; ?>
)</strong>
									</td>
									<td width='60%' class="small cellText">
										<?php if ($this->_tpl_vars['LOCAL_BACKUP_STATUS'] == 'enabled'): ?>
											<input type="checkbox" checked name="enable_local_backup" onclick="localbackupenabled(this)"></input>
										<?php else: ?>
											<input type="checkbox" name="enable_local_backup" onclick="localbackupenabled(this)"></input>
										<?php endif; ?>
									</td>
									<td class="small cellText" align=right width=20%>
									<?php if ($this->_tpl_vars['LOCAL_BACKUP_STATUS'] == 'enabled'): ?>
										<span id='localbackup_buttons' style="display:block;">
									<?php else: ?>
										<span id='localbackup_buttons' style="display:none;">
									<?php endif; ?>
										<table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr height='30px'>
											<?php if ($this->_tpl_vars['LOCAL_SERVER_MODE'] == 'edit'): ?>	
												<td width="10%" align='right' class="small cellText" colspan=2> 
													<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="this.form.action.value='Save'; return validate('Local')">&nbsp;&nbsp;
												</td>
											<?php else: ?>
												<td width="20%" align='right' class="small cellText"> 
													<input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="crmButton small edit" onclick="this.form.action.value='BackupServerConfig';this.form.local_server_mode.value='edit'" type="submit" name="Edit" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
">&nbsp;
													<?php if ($this->_tpl_vars['LOCAL_SERVER_MODE'] != 'edit'): ?>
														<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" type="submit" name="backupnow" value="<?php echo $this->_tpl_vars['MOD']['LBL_BACKUP']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_NOW']; ?>
" onclick="this.form.action.value='BackupServerConfig';" >&nbsp;&nbsp;
													<?php else: ?>
														<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" type="submit" name="backupnow" value="<?php echo $this->_tpl_vars['MOD']['LBL_BACKUP']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_NOW']; ?>
" onclick="this.form.action.value='BackupServerConfig';" style='visibility:none;' disabled='true'>&nbsp;&nbsp;
													<?php endif; ?>												
												</td>
											<?php endif; ?>
											</tr>
										</table>	
										</span>
									</td>	
								</tr>
								<tr width='100%'>
									<td colspan=3>
									<?php if ($this->_tpl_vars['LOCAL_BACKUP_STATUS'] == 'enabled'): ?>
										<div id='localbackup_fields' style="display:block;">
									<?php else: ?>
										<div id='localbackup_fields' style="display:none;">
									<?php endif; ?>
										<table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr height='30px'>
											<td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_BACKUP_LOCATION']; ?>

											</strong></td>
											<?php if ($this->_tpl_vars['LOCAL_SERVER_MODE'] == 'edit'): ?>	
												<td width="80%" colspan=3>
													&nbsp;<input type="text" size=80 class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['SERVER_BACKUP_PATH']; ?>
" name="server_path" /></strong><br><?php echo $this->_tpl_vars['ERROR_STR']; ?>

												</td>
											<?php else: ?>
												<td width="80%" class="small cellText">
													&nbsp;<?php echo $this->_tpl_vars['SERVER_BACKUP_PATH']; ?>

												</td>
											<?php endif; ?>
											</tr>
										</table>	
										</div>
									</td>
								</tr>
							</table>
						</form>
								<table width="100%" border="0" cellspacing="0" cellpadding="5">
                                <tr>
	                                <td class="small" valign="top">
	                                        <br><?php echo $this->_tpl_vars['MOD']['LBL_BACKUP_DESC']; ?>

	                                </td>
                                </tr>
                            </table>
						</td>
					</tr>
				<form action="index.php" method="post" name="tandc">
				<input type="hidden" name="server_type" value="ftp_backup">
				<input type="hidden" name="module" value="Settings">
				<input type="hidden" name="action" value="index">
				<input type="hidden" name="bkp_server_mode">
				<input type="hidden" name="parenttab" value="Settings">
				    <tr>
						<td class="small" valign=top >
							<table width="100%"  border="0" cellspacing="0" cellpadding="5" class="tableHeading">
								<tr>
									<td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_BACKUP_SERVER_SETTINGS']; ?>
 (<?php echo $this->_tpl_vars['MOD']['LBL_FTP']; ?>
)<br><?php echo $this->_tpl_vars['ERROR_MSG']; ?>
</strong></td>
									<td width="50%" class="small cellText">
										<?php if ($this->_tpl_vars['FTP_BACKUP_STATUS'] == 'enabled'): ?>
											<input type="checkbox" checked name="enable_ftp_backup" onclick="backupenabled(this)"></input>
										<?php else: ?>
											<input type="checkbox" name="enable_ftp_backup" onclick="backupenabled(this)"></input>
										<?php endif; ?>
									</td>	
									<td class="small cellText" align="right" width="30%">&nbsp;
										<?php if ($this->_tpl_vars['FTP_BACKUP_STATUS'] == 'enabled'): ?>
										<div id='ftp_buttons' style="display:block;">
										<?php else: ?>
										<div id='ftp_buttons' style="display:none;">
										<?php endif; ?>
													<?php if ($this->_tpl_vars['BKP_SERVER_MODE'] != 'edit'): ?>
														<input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="crmButton small edit" onclick="this.form.action.value='BackupServerConfig';this.form.bkp_server_mode.value='edit'" type="submit" name="Edit" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
">&nbsp;
														<input title="<?php echo $this->_tpl_vars['MOD']['LBL_CLEAR_DATA']; ?>
" accessKey="<?php echo $this->_tpl_vars['MOD']['LBL_CLEAR_DATA']; ?>
" class="crmButton small cancel" onclick="document.tandc.enable_ftp_backup.checked=false;clearBackupServer(this);" type="button" name="Clear" value="<?php echo $this->_tpl_vars['MOD']['LBL_CLEAR_DATA']; ?>
">
													<?php else: ?>
														<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="this.form.action.value='Save'; return validate('FTP')">&nbsp;&nbsp;
													    <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="crmButton small cancel" onclick="backupenable_check()" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
													<?php endif; ?>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="small" valign=top  >
						<?php if ($this->_tpl_vars['FTP_BACKUP_STATUS'] == 'enabled'): ?>
							<div id='bckcontents' style="display:block;">
						<?php else: ?>
							<div id='bckcontents' style="display:none;">
						<?php endif; ?>
								<table border=0 cellspacing=0 cellpadding=0 width=100% >
									<tr>
										<td>
											<div id="BackupServerContents">
												<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Settings/BackupServerContents.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
		</td>
		</tr>
		</form>
		</table>
		</td></tr>
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
function validate(type) {
if(type == \'FTP\'){
	if (!emptyCheck("server","ftp Server Name","text")) return false
		if (!emptyCheck("server_username","ftp User Name","text")) return false
				if (!emptyCheck("server_password","ftp Password","text")) return false
			return true;
}
if(type == \'Local\'){
	if (!emptyCheck("server_path","Local Server Path","text")) return false;
	else return true;
}
}


function clearBackupServer(Obj)
{
	new Ajax.Request(\'index.php\',
        	{queue: {position: \'end\', scope: \'command\'},
                	method: \'post\',
                        postBody: \'module=Settings&action=SettingsAjax&ajax=true&file=BackupServerConfig&opmode=del\',
                        onComplete: function(response) {
	                        $("BackupServerContents").innerHTML=response.responseText;
                        }
                }
        );
	backupenabled(Obj);	
}

function backupenabled(ochkbox)
{
	
	if(ochkbox.checked == true)
        {
                $(\'bckcontents\').style.display=\'block\';
                var status=\'enabled\';
                $(\'view_info\').innerHTML = alert_arr.MSG_FTP_BACKUP_ENABLED+\', \' + alert_arr.MSG_CONFIRM_FTP_DETAILS;
                $(\'view_info\').style.display = \'block\';
				$("ftp_buttons").style.display="block";

                new Ajax.Request(\'index.php\',
                	{queue: {position: \'end\', scope: \'command\'},
                 	       method: \'post\',
                        	postBody: \'module=Settings&action=SettingsAjax&file=SaveEnableBackup&ajax=true&GetBackupDetail=true&servertype=ftp_backup\',
                        	onComplete: function(response) {
                                	if(response.responseText.indexOf(\'FAILURE\') > -1)
                                	{
                                        	document.location.href = "index.php?module=Settings&parenttab=Settings&action=BackupServerConfig&bkp_server_mode=edit";
                                        	return false;
                                	}
                        	}
                	}
                );


        }
	else
	{
		$(\'bckcontents\').style.display=\'none\';
                var status = \'disabled\';
                $(\'view_info\').innerHTML = alert_arr.MSG_FTP_BACKUP_DISABLED;
                $(\'view_info\').style.display = \'block\';
				$("ftp_buttons").style.display="none";
      }
	
	new Ajax.Request(\'index.php\',
        	{queue: {position: \'end\', scope: \'command\'},
        		method: \'post\',
                	postBody: \'module=Settings&action=SettingsAjax&file=SaveEnableBackup&ajax=true&enable_ftp_backup=\'+status,
                	onComplete: function(response) {
                		$("status").style.display="none";
                	}
        	}
        );
			
	setTimeout("hide(\'view_info\')",3000);
}

function backupenable_check()
{
        new Ajax.Request(\'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: \'module=Settings&action=SettingsAjax&file=SaveEnableBackup&ajax=true&GetBackupDetail=true&servertype=ftp_backup\',
                        onComplete: function(response) {
                                if(response.responseText.indexOf(\'FAILURE\') > -1)
                                {
                                        document.forms[\'tandc\'].enable_ftp_backup.checked = false;
                                        backupenabled(document.tandc.enable_ftp_backup);
                                        window.history.back();
                                }
                        }
                }
	);
}

function localbackupenabled(ochkbox)
{
	
	if(ochkbox.checked == true)
        {
				$(\'localbackup_buttons\').style.display=\'block\';
				$(\'localbackup_fields\').style.display=\'block\';
                var status=\'enabled\';
                $(\'view_info\').innerHTML = alert_arr.MSG_LOCAL_BACKUP_ENABLED+\', \'+alert_arr.MSG_CONFIRM_PATH;
                $(\'view_info\').style.display = \'block\';
                new Ajax.Request(\'index.php\',
                	{queue: {position: \'end\', scope: \'command\'},
                 	       method: \'post\',
                        	postBody: \'module=Settings&action=SettingsAjax&file=SaveEnableBackup&ajax=true&GetBackupDetail=true&servertype=local_backup\',
                        	onComplete: function(response) {
                                	if(response.responseText.indexOf(\'FAILURE\') > -1)
                                	{
                                        	document.location.href = "index.php?module=Settings&parenttab=Settings&action=BackupServerConfig&local_server_mode=edit";
                                        	return false;
                                	}
                        	}
                	}
                );
         }
	else
		{
				$(\'localbackup_buttons\').style.display=\'none\';
				$(\'localbackup_fields\').style.display=\'none\';
                var status = \'disabled\';
                $(\'view_info\').innerHTML = alert_arr.MSG_LOCAL_BACKUP_DISABLED;
                $(\'view_info\').style.display = \'block\';
        }
	new Ajax.Request(\'index.php\',
        	{queue: {position: \'end\', scope: \'command\'},
        		method: \'post\',
                	postBody: \'module=Settings&action=SettingsAjax&file=SaveEnableBackup&ajax=true&enable_local_backup=\'+status,
                	onComplete: function(response) {
                		$("status").style.display="none";
                	}
        	}
        );	
	setTimeout("hide(\'view_info\')",3000);
}
</script>
'; ?>
