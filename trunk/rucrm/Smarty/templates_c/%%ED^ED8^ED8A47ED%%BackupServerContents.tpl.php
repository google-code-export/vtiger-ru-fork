<?php /* Smarty version 2.6.18, created on 2011-03-13 18:00:14
         compiled from Settings/BackupServerContents.tpl */ ?>
<?php if ($this->_tpl_vars['BKP_SERVER_MODE'] == 'edit'): ?>	
			<table border=0 cellspacing=0 cellpadding=0 width=100% class="listRow">
			<tr>
      			    <td class="small" valign=top ><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                        <tr>
                            <td width="20%" nowrap class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_SERVER_ADDRESS']; ?>
 </strong></td>
                            <td width="80%" class="small cellText">
				<input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['FTPSERVER']; ?>
" name="server"></strong>
			    </td>
                          </tr>
                          <tr valign="top">

                            <td nowrap class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong></td>
                            <td class="small cellText">
				<input type="text" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['FTPUSER']; ?>
" name="server_username">
			    </td>
                          </tr>
                          <tr>
                            <td nowrap class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_PASWRD']; ?>
</strong></td>
                            <td class="small cellText">
				<input type="password" class="detailedViewTextBox small" value="<?php echo $this->_tpl_vars['FTPPASSWORD']; ?>
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
                            <td width="80%" class="small cellText"><strong><?php echo $this->_tpl_vars['FTPSERVER']; ?>
&nbsp;</strong></td>
                        </tr>
                        <tr valign="top">
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_USERNAME']; ?>
</strong></td>
                            <td class="small cellText"><?php echo $this->_tpl_vars['FTPUSER']; ?>
&nbsp;</td>
                        </tr>
                        <tr>
                            <td nowrap class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PASWRD']; ?>
</strong></td>
                            <td class="small cellText">
				<?php if ($this->_tpl_vars['FTPPASSWORD'] != ''): ?>
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