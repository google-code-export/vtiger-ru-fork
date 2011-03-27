<?php /* Smarty version 2.6.18, created on 2011-03-13 18:00:11
         compiled from Settings/ProxyServer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/ProxyServer.tpl', 16, false),array('modifier', 'vtlib_purify', 'Settings/ProxyServer.tpl', 67, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
<br>
	<div align=center>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "SetMenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
				<form action="index.php" method="post" name="tandc" onsubmit="VtigerJS_DialogBox.block();">
				<input type="hidden" name="server_type" value="proxy">
				<input type="hidden" name="module" value="Settings">
				<input type="hidden" name="action" value="index">
				<input type="hidden" name="proxy_server_mode">
				<input type="hidden" name="parenttab" value="Settings">
				<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('proxy.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_PROXY']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_PROXY']; ?>
"></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_PROXY_SERVER_SETTINGS']; ?>
 </b></td>
				</tr>
				<tr>
					<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_PROXY_SERVER_DESC']; ?>
 </td>
				</tr>
				</table>
				
				<br>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
				
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
					<tr>
						<td class="big"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PROXY_SERVER_SETTINGS']; ?>
<br><?php echo $this->_tpl_vars['ERROR_MSG']; ?>
</strong></td>
						<?php if ($this->_tpl_vars['PROXY_SERVER_MODE'] != 'edit'): ?>
						<td class="small" align=right>
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="crmButton small edit" onclick="this.form.action.value='ProxyServerConfig';this.form.proxy_server_mode.value='edit'" type="submit" name="Edit" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
">
						</td>
						<?php else: ?>
						<td class="small" align=right>
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="crmButton small save" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="this.form.action.value='Save'; return validate()">&nbsp;&nbsp;
						    <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="crmButton small cancel" onclick="javascript:document.location.href='index.php?module=Settings&action=ProxyServerConfig&parenttab=Settings'" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
						</td>
						<?php endif; ?>
					</tr>
					</table>
				
			<?php if ($this->_tpl_vars['PROXY_SERVER_MODE'] == 'edit'): ?>	
			<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
			<tr>
      			    <td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                        <tr>
                            <td width="20%" nowrap class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_SERVER_ADDRESS']; ?>
 </strong></td>
                            <td width="80%" class="small cellText">
				<?php if ($_REQUEST['server'] != ''): ?>
				<input type="text" class="detailedViewTextBox small" value="<?php echo vtlib_purify($_REQUEST['server']); ?>
" name="server"></strong>
				<?php else: ?>
				<input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['PROXYSERVER']; ?>
" name="server"></strong>
				<?php endif; ?>
			    </td>
                          </tr>
			  <tr>
                            <td width="20%" nowrap class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_PROXY_PORT']; ?>
 </strong></td>
                            <td width="80%" class="small cellText">
				<?php if ($_REQUEST['port'] != ''): ?>
                                <input type="text" class="detailedViewTextBox small" value="<?php echo vtlib_purify($_REQUEST['port']); ?>
" name="port"></strong>
				<?php else: ?>
                                <input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['PROXYPORT']; ?>
" name="port"></strong>
				<?php endif; ?>
                            </td>
                          </tr>
                          <tr valign="top">

                            <td nowrap class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong></td>
                            <td class="small cellText">
				<?php if ($_REQUEST['server_username'] != ''): ?>
				<input type="text" class="detailedViewTextBox small" value="<?php echo vtlib_purify($_REQUEST['server_username']); ?>
" name="server_username">
				<?php else: ?>
				<input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['PROXYUSER']; ?>
" name="server_username">
				<?php endif; ?>
			    </td>
                          </tr>
                          <tr>
                            <td nowrap class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_PASWRD']; ?>
</strong></td>
                            <td class="small cellText">
				<input type="password" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['PROXYPASSWORD']; ?>
" name="server_password">
			    </td>
                          </tr>
                        </table>
			<?php else: ?>
			<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
			<tr>
	         	    <td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                        <tr>
                            <td width="20%" nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SERVER_ADDRESS']; ?>
 </strong></td>
                            <td width="80%" class="small cellText"><strong><?php echo $this->_tpl_vars['PROXYSERVER']; ?>
&nbsp;</strong></td>
                        </tr>
			<tr valign="top">
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PROXY_PORT']; ?>
</strong></td>
                            <td class="small cellText"><?php echo $this->_tpl_vars['PROXYPORT']; ?>
&nbsp;</td>
                        </tr>
                        <tr valign="top">
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong></td>
                            <td class="small cellText"><?php echo $this->_tpl_vars['PROXYUSER']; ?>
&nbsp;</td>
                        </tr>
                        <tr>
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PASWRD']; ?>
</strong></td>
                            <td class="small cellText">
				<?php if ($this->_tpl_vars['PROXYPASSWORD'] != ''): ?>
				******
				<?php endif; ?>&nbsp;
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
function validate() {
	if (!emptyCheck("server","Proxy Server Name","text")) return false
	if (!emptyCheck("port","Port Number","text")) return false
	if(isNaN(document.tandc.port.value)){
		alert(alert_arr.LBL_ENTER_VALID_PORT);
		return false;
	}
	if (!emptyCheck("server_username","Proxy User Name","text")) return false
	if (!emptyCheck("server_password","Proxy Password","text")) return false
			return true;

}
</script>
'; ?>
