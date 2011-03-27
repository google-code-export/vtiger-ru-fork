<?php /* Smarty version 2.6.18, created on 2011-03-13 18:17:13
         compiled from Settings/Announcements.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/Announcements.tpl', 43, false),)), $this); ?>

<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/menu.js"></script>
<?php echo '
<script>
function Announcement()
{
	$("an_busy").style.display="inline";
	var announcement=$("announcement").value;

	//Replace & with ##$## and do vice versa in modules/Settings/SettingsAjax.php. if we pass as it is, request of announcement will be skipped after &
	announcement = announcement.replace(/&/g,"##$##");//replace(\'&\',\'##$##\');

	new Ajax.Request(
	\'index.php\',
        {queue: {position: \'end\', scope: \'command\'},
       		method: \'post\',
	        postBody: \'module=Settings&action=SettingsAjax&announcement=\'+announcement+\'&announce_save=yes\',
	        onComplete: function(response) {
					$("announcement").value=response.responseText;
					$("an_busy").style.display="none";
                        	}
	        }
	);
}
</script>
'; ?>


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
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('announ.gif', $this->_tpl_vars['THEME']); ?>
" width="48" height="48" border=0></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['MOD']['LBL_ANNOUNCEMENT']; ?>
 </b><div id="an_busy" style="display:none;float:left;position:relative;"><img src="<?php echo vtiger_imageurl('vtbusy.gif', $this->_tpl_vars['THEME']); ?>
" align="right"></div></td>
				</tr>
				<tr>
					<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_ANNOUNCEMENT_DESC']; ?>
 </td>
				</tr>
				</table>
				
				<br>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
				
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
					<tr>
						<td class="big"><strong><?php echo $this->_tpl_vars['MOD']['LBL_ANNOUNCE_TEXT']; ?>
</strong></td>
						<td class="small" align=right><input type="button" class="crmButton small save" value="<?php echo $this->_tpl_vars['MOD']['LBL_UPDATE_BUTTON']; ?>
" onclick="javascript:Announcement();"></td>
					</tr>
					</table>
					
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">
					<tr>
						<td class="colHeader small" valign=top><?php echo $this->_tpl_vars['MOD']['LBL_ANNOUNCEMENT_INFO']; ?>
</td>
					  </tr>
					<tr>
						<td class="listTableRow small" valign=top><textarea class=small width=90% height=100px id="announcement" name="announcement"><?php echo $this->_tpl_vars['ANNOUNCE']; ?>
</textarea></td>
					  </tr>
					</table>
					<!--table border=0 cellspacing=0 cellpadding=5 width=100% >
					<tr><td class="small" nowrap align=right><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
</a></td></tr>
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

</td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
   </tr>
</tbody>
</table>
<?php echo '
<script>
function validate() {
	if (!emptyCheck("server","ftp Server Name","text")) return false
		if (!emptyCheck("server_username","ftp User Name","text")) return false
			return true;

}
</script>
'; ?>
