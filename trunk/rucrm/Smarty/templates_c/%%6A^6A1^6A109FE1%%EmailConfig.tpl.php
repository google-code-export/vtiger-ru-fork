<?php /* Smarty version 2.6.18, created on 2011-03-13 17:59:56
         compiled from Settings/EmailConfig.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/EmailConfig.tpl', 17, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/menu.js"></script>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
<br>
	<?php if ($this->_tpl_vars['EMAILCONFIG_MODE'] != 'edit'): ?>	
	<form action="index.php" method="post" name="MailServer" id="form" onsubmit="VtigerJS_DialogBox.block();">
	<input type="hidden" name="emailconfig_mode">
	<?php else: ?>
	<?php echo '
	<form action="index.php" method="post" name="MailServer" id="form" onsubmit="if(validate_mail_server(MailServer)){ VtigerJS_DialogBox.block(); return true; } else { return false; }">
	'; ?>

	<input type="hidden" name="server_type" value="email">
	<?php endif; ?>
	<input type="hidden" name="module" value="Settings">
	<input type="hidden" name="action">
	<input type="hidden" name="parenttab" value="Settings">
	<input type="hidden" name="return_module" value="Settings">
	<input type="hidden" name="return_action" value="EmailConfig">
	<div align=center>
			
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "SetMenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
				<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('ogmailserver.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
"></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SERVER_SETTINGS']; ?>
 </b></td>
				</tr>
				<tr>
					<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SERVER_DESC']; ?>
 </td>
				</tr>
				</table>
				
				<br>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
				
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
					<tr>
						<td class="big"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SERVER_SMTP']; ?>
</strong></td>
						<?php if ($this->_tpl_vars['EMAILCONFIG_MODE'] != 'edit'): ?>	
						<td class="small" align=right>
							<input class="crmButton small edit" title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" onclick="this.form.action.value='EmailConfig';this.form.emailconfig_mode.value='edit'" type="submit" name="Edit" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
">
						</td>
						<?php else: ?>
						<td class="small" align=right>
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" onclick="this.form.action.value='Save';" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" >&nbsp;&nbsp;
    							<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="crmButton small cancel" onclick="window.history.back()" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
						</td>
						<?php endif; ?>
					</tr>
					<?php if ($this->_tpl_vars['ERROR_MSG'] != ''): ?>
					<tr>
						<?php echo $this->_tpl_vars['ERROR_MSG']; ?>

					</tr>
					<?php endif; ?>
					</table>
					
					<?php if ($this->_tpl_vars['EMAILCONFIG_MODE'] != 'edit'): ?>	
					<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
					<tr>
					<td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_OUTGOING_MAIL_SERVER']; ?>
</strong></td>
                            <td width="80%" class="small cellText"><strong><?php echo $this->_tpl_vars['MAILSERVER']; ?>
&nbsp;</strong></td>
                          </tr>
                          <tr valign="top">
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong></td>
                            <td class="small cellText"><?php echo $this->_tpl_vars['USERNAME']; ?>
&nbsp;</td>
                          </tr>
                          <tr>
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PASWRD']; ?>
</strong></td>
                            <td class="small cellText">
				<?php if ($this->_tpl_vars['PASSWORD'] != ''): ?>
				******
				<?php endif; ?>&nbsp;
			     </td>
                          </tr>
						  <tr>
							<td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_FROM_EMAIL_FIELD']; ?>
</strong></td>
							<td class="small cellText"><?php echo $this->_tpl_vars['FROM_EMAIL_FIELD']; ?>
&nbsp;</td>
							</td>
						  </tr>
                          <tr>
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_REQUIRES_AUTHENT']; ?>
</strong></td>
                            <td class="small cellText">
				<?php if ($this->_tpl_vars['SMTP_AUTH'] == 'checked'): ?>
					<?php echo $this->_tpl_vars['MOD']['LBL_YES']; ?>

				<?php else: ?>
					<?php echo $this->_tpl_vars['MOD']['LBL_NO']; ?>

				<?php endif; ?>
			    </td>
                          </tr>
                        </table>
			  <?php else: ?>
					
			<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
			<tr>
			<td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                        <tr>
                            <td width="20%" nowrap class="small cellLabel"><font color="red">*</font>&nbsp;<strong><?php echo $this->_tpl_vars['MOD']['LBL_OUTGOING_MAIL_SERVER']; ?>
</strong></td>
                            <td width="80%" class="small cellText">
				<input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['MAILSERVER']; ?>
" name="server">
			    </td>
                          </tr>
                          <tr valign="top">
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong></td>
                            <td class="small cellText">
				<input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['USERNAME']; ?>
" name="server_username">
			    </td>
                          </tr>
                          <tr>
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PASWRD']; ?>
</strong></td>
                            <td class="small cellText">
				<input type="password" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['PASSWORD']; ?>
" name="server_password">
				</td>
                        </tr>
						<tr>
							<td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_FROM_EMAIL_FIELD']; ?>
</strong></td>
							<td class="small cellText">
				 <input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['FROM_EMAIL_FIELD']; ?>
" name="from_email_field"/>
							</td>
						</tr>
						<tr>
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_REQUIRES_AUTHENT']; ?>
</strong></td>
                            <td class="small cellText">
                              	<input type="checkbox" name="smtp_auth" <?php echo $this->_tpl_vars['SMTP_AUTH']; ?>
/>
			    </td>
                          </tr>
                        </table>
				
			<?php endif; ?>
						
						</td>
					  </tr>
					</table>
					<!--table border=0 cellspacing=0 cellpadding=5 width=100% >
					<tr>
					  <td class="small" nowrap align=right><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
</a></td>
					</tr>
					</table-->
				</td>
				</tr>
				</table>
			
			
			
			</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
		
	</div>
	</form>
	
</td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
   </tr>
</tbody>
</table>
<?php echo '
<script>
function validate_mail_server(form)
{
	if(form.server.value ==\'\')
	{
		'; ?>

                alert("<?php echo $this->_tpl_vars['APP']['SERVERNAME_CANNOT_BE_EMPTY']; ?>
")
                        return false;
                <?php echo '
	}
	return true;
}
</script>
'; ?>
