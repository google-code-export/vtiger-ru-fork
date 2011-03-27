<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:13
         compiled from MailScanner/MailScannerEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'MailScanner/MailScannerEdit.tpl', 19, false),)), $this); ?>

<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>

<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody>
<tr>
	<td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
    <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">

	<form action="index.php" method="post" id="form" onsubmit="VtigerJS_DialogBox.block();">
		<input type='hidden' name='module' value='Settings'>
		<input type='hidden' name='action' value='MailScanner'>
		<input type='hidden' name='mode' value='save'>
		<input type='hidden' name='return_action' value='MailScanner'>
		<input type='hidden' name='return_module' value='Settings'>
		<input type='hidden' name='parenttab' value='Settings'>

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

				<?php if ($this->_tpl_vars['CONNECTFAIL'] != ''): ?>
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
					<tr>
							<td align="center" width="100%"><font color='red'><b><?php echo $this->_tpl_vars['CONNECTFAIL']; ?>
</b></font></td>
					</tr>
					</table>
				<?php endif; ?>

				<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
				<tr>
				<td class="big" width="70%"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MAILBOX']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_INFORMATION']; ?>
</strong></td>
				</tr>
				</table>
				
				<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
				<tr>
	         	    <td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
						<tr>
                            <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SCANNER']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
</strong> <font color="red">*</font></td>
                            <td width="80%">
                            	<input type="hidden" name="hidden_scannername" class="small" value="<?php echo $this->_tpl_vars['SCANNERINFO']['scannername']; ?>
" readonly>
                            	<input type="text" name="mailboxinfo_scannername" class="small" value="<?php echo $this->_tpl_vars['SCANNERINFO']['scannername']; ?>
" size=50>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SERVER']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
</strong> <font color="red">*</font></td>
                            <td width="80%"><input type="text" name="mailboxinfo_server" class="small" value="<?php echo $this->_tpl_vars['SCANNERINFO']['server']; ?>
" size=50></td>
                        </tr>
                        <tr>
							<td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PROTOCOL']; ?>
</strong> <font color="red">*</font></td>
                            <td width="80%">
								<?php $this->assign('imapused', ""); ?>
								<?php $this->assign('imap4used', ""); ?>

								<?php if ($this->_tpl_vars['SCANNERINFO']['protocol'] == 'imap4'): ?>
									<?php $this->assign('imap4used', "checked='true'"); ?>
								<?php else: ?>
									<?php $this->assign('imapused', "checked='true'"); ?>
								<?php endif; ?>
							
								<input type="radio" name="mailboxinfo_protocol" class="small" value="imap" <?php echo $this->_tpl_vars['imapused']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_IMAP2']; ?>

								<input type="radio" name="mailboxinfo_protocol" class="small" value="imap4" <?php echo $this->_tpl_vars['imap4used']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_IMAP4']; ?>

							</td>
						</tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong> <font color="red">*</font></td>
                            <td width="80%"><input type="text" name="mailboxinfo_username" class="small" value="<?php echo $this->_tpl_vars['SCANNERINFO']['username']; ?>
" size=50></td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PASSWORD']; ?>
</strong> <font color="red">*</font></td>
                            <td width="80%"><input type="password" name="mailboxinfo_password" class="small" value="<?php echo $this->_tpl_vars['SCANNERINFO']['password']; ?>
" size=50></td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SSL']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_TYPE']; ?>
</strong></td>
               				<td width="80%" class="small cellText">
								<?php $this->assign('notls_type', ""); ?>
								<?php $this->assign('tls_type', ""); ?>
								<?php $this->assign('ssl_type', ""); ?>

								<?php if ($this->_tpl_vars['SCANNERINFO']['ssltype'] == 'notls'): ?>
									<?php $this->assign('notls_type', "checked='true'"); ?>
								<?php elseif ($this->_tpl_vars['SCANNERINFO']['ssltype'] == 'tls'): ?>
									<?php $this->assign('tls_type', "checked='true'"); ?>
								<?php elseif ($this->_tpl_vars['SCANNERINFO']['ssltype'] == 'ssl'): ?>
									<?php $this->assign('ssl_type', "checked='true'"); ?>
								<?php endif; ?>

								<input type="radio" name="mailboxinfo_ssltype" class="small" value="notls" <?php echo $this->_tpl_vars['notls_type']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_NO']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_TLS']; ?>

								<input type="radio" name="mailboxinfo_ssltype" class="small" value="tls" <?php echo $this->_tpl_vars['tls_type']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_TLS']; ?>

								<input type="radio" name="mailboxinfo_ssltype" class="small" value="ssl" <?php echo $this->_tpl_vars['ssl_type']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_SSL']; ?>

							</td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SSL']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_METHOD']; ?>
</strong></td>
							<td width="80%" class="small cellText">
								<?php $this->assign('novalidatecert_type', ""); ?>
								<?php $this->assign('validatecert_type', ""); ?>

								<?php if ($this->_tpl_vars['SCANNERINFO']['sslmethod'] == 'validate-cert'): ?>
									<?php $this->assign('validatecert_type', "checked='true'"); ?>
								<?php else: ?>
									<?php $this->assign('novalidatecert_type', "checked='true'"); ?>
								<?php endif; ?>

								<input type="radio" name="mailboxinfo_sslmethod" class="small" value="validate-cert" <?php echo $this->_tpl_vars['validatecert_type']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_VAL_SSL_CERT']; ?>

								<input type="radio" name="mailboxinfo_sslmethod" class="small" value="novalidate-cert" <?php echo $this->_tpl_vars['novalidatecert_type']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_DONOT_VAL_SSL_CERT']; ?>

							</td>
                        </tr>
						<tr>
			                <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_STATUS']; ?>
</strong></td>
							<td width="80%" class="small cellText">
								<?php $this->assign('mailbox_enable', ""); ?>
								<?php $this->assign('mailbox_disable', ""); ?>

								<?php if ($this->_tpl_vars['SCANNERINFO']['isvalid'] == false): ?>
									<?php $this->assign('mailbox_disable', "checked='true'"); ?>
								<?php else: ?>
									<?php $this->assign('mailbox_enable', "checked='true'"); ?>
								<?php endif; ?>

								<input type="radio" name="mailboxinfo_enable" class="small" value="true" <?php echo $this->_tpl_vars['mailbox_enable']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>

								<input type="radio" name="mailboxinfo_enable" class="small" value="false" <?php echo $this->_tpl_vars['mailbox_disable']; ?>
> <?php echo $this->_tpl_vars['MOD']['LBL_DISABLE']; ?>

							</td>
                        </tr>
				    </td>
            	</tr>

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
							<select name="mailboxinfo_searchfor" class="small">
								<option value="ALL" <?php if ($this->_tpl_vars['SCANNERINFO']['searchfor'] == 'ALL'): ?>selected=true<?php endif; ?> 
									onclick="$('mailboxinfo_rescan_folders_span').show()"><?php echo $this->_tpl_vars['MOD']['LBL_ALL']; ?>
</option>
								<option value="UNSEEN" <?php if ($this->_tpl_vars['SCANNERINFO']['searchfor'] == 'UNSEEN'): ?>selected=true<?php endif; ?> 
									onclick="this.form.mailboxinfo_rescan_folders.checked=false;$('mailboxinfo_rescan_folders_span').hide()"><?php echo $this->_tpl_vars['MOD']['LBL_UNREAD']; ?>
</option> 
							</select> <?php echo $this->_tpl_vars['MOD']['LBL_MESSAGES_FROM_LASTSCAN']; ?>


							<?php if ($this->_tpl_vars['SCANNERINFO']['searchfor'] == 'ALL'): ?>
								<span id="mailboxinfo_rescan_folders_span">
																								</span>
							<?php endif; ?>

							</td>
                        </tr>
						<tr>
                            <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_AFTER_SCAN']; ?>
</strong></td>
                            <td width="80%" class="small cellText"><?php echo $this->_tpl_vars['MOD']['LBL_MARK_MESSAGE_AS']; ?>

							<select name="mailboxinfo_markas" class="small">
								<option value=""></option>
								<option value="SEEN" <?php if ($this->_tpl_vars['SCANNERINFO']['markas'] == 'SEEN'): ?>selected=true<?php endif; ?> ><?php echo $this->_tpl_vars['MOD']['LBL_READ']; ?>
</option> 
							</select>	
							</td>
                        </tr>
					</td>
				</tr>
				</table>

				<tr>
					<td colspan=2 nowrap align="center">
						<input type="submit" class="crmbutton small save" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_LABEL']; ?>
" onclick="return mailscaneredit_validateform(this.form);" />
						<input type="button" class="crmbutton small cancel" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" onclick="window.location.href='index.php?module=Settings&action=MailScanner&parenttab=Settings'"/>
					</td>
				</tr>
				</table>	
				
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
<?php echo '
<script type="text/javascript">
function mailscaneredit_validateform(form) {
	var scannername = form.mailboxinfo_scannername;
	if(scannername.value == \'\') {
		scannername.focus();
		return false;
	}
	return true;		
}
</script>
'; ?>
