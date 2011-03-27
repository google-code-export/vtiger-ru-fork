<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:54
         compiled from modules/CustomerPortal/BasicSetttingsContents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getTranslatedString', 'modules/CustomerPortal/BasicSetttingsContents.tpl', 22, false),array('modifier', 'vtiger_imageurl', 'modules/CustomerPortal/BasicSetttingsContents.tpl', 25, false),)), $this); ?>
<script language="JavaScript" type="text/javascript" src="modules/<?php echo $this->_tpl_vars['MODULE']; ?>
/<?php echo $this->_tpl_vars['MODULE']; ?>
.js"></script>

<table border=0 cellspacing=0 cellpadding=5 width="350px" align="" class="dvtContentSpace">
<tr>
	<td class="colHeader small"><?php echo $this->_tpl_vars['MOD']['Module']; ?>
</td>
	<td class="colHeader small"><?php echo $this->_tpl_vars['MOD']['Sequence']; ?>
</td>
	<td class="colHeader small"><?php echo $this->_tpl_vars['MOD']['Visible']; ?>
</td>
</tr>					
<?php $_from = $this->_tpl_vars['PORTALMODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pname']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['module']):
        $this->_foreach['pname']['iteration']++;
?>
<tr onmouseover="this.className='prvPrfHoverOn'" onmouseout="this.className='prvPrfHoverOff'">
	<td class="listTableRow small" width="50%"><?php echo getTranslatedString($this->_tpl_vars['module']['name']); ?>
</td>
	
	<?php if (($this->_foreach['pname']['iteration'] <= 1) != true): ?>
		<td  align="center" class="listTableRow"><a href="javascript:move_module('<?php echo $this->_tpl_vars['module']['tabid']; ?>
','Up');" ><img src="<?php echo vtiger_imageurl('arrow_up.png', $this->_tpl_vars['THEME']); ?>
" style="width:16px;height:16px;" border="0" /></a>
	<?php endif; ?>
	<?php if (($this->_foreach['pname']['iteration'] == $this->_foreach['pname']['total']) == true): ?>
		<img src="<?php echo vtiger_imageurl('blank.gif', $this->_tpl_vars['THEME']); ?>
" style="width:16px;height:16px;" border="0" />
	<?php endif; ?>	
	<?php if (($this->_foreach['pname']['iteration'] <= 1) == true): ?>
		<td align="center" class="listTableRow"><img src="<?php echo vtiger_imageurl('blank.gif', $this->_tpl_vars['THEME']); ?>
" style="width:16px;height:16px;" border="0" />
			<a href="javascript:move_module('<?php echo $this->_tpl_vars['module']['tabid']; ?>
','Down');" ><img src="<?php echo vtiger_imageurl('arrow_down.png', $this->_tpl_vars['THEME']); ?>
" style="width:16px;height:16px;" border="0" /></a></td>
	<?php endif; ?>
	
	<?php if (($this->_foreach['pname']['iteration'] == $this->_foreach['pname']['total']) != true && ($this->_foreach['pname']['iteration'] <= 1) != true): ?>
		<a href="javascript:move_module('<?php echo $this->_tpl_vars['module']['tabid']; ?>
','Down');" ><img src="<?php echo vtiger_imageurl('arrow_down.png', $this->_tpl_vars['THEME']); ?>
" style="width:16px;height:16px;" border="0" /></a></td>
	<?php endif; ?>
	
	<td class="listTableRow cellText small"  align="center">
		<?php if ($this->_tpl_vars['module']['visible'] == 1): ?>
			<a href="javascript:void(0);" onclick="toggleModule('<?php echo $this->_tpl_vars['module']['tabid']; ?>
', 'module_disable');"><img src="<?php echo vtiger_imageurl('enabled.gif', $this->_tpl_vars['THEME']); ?>
" border="0" align="absmiddle" alt="<?php echo $this->_tpl_vars['MOD']['LBL_DISABLE']; ?>
 <?php echo $this->_tpl_vars['module']['name']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_DISABLE']; ?>
 <?php echo getTranslatedString($this->_tpl_vars['module']['name']); ?>
"></a>
		<?php else: ?>
			<a href="javascript:void(0);" onclick="toggleModule('<?php echo $this->_tpl_vars['module']['tabid']; ?>
', 'module_enable');"><img src="<?php echo vtiger_imageurl('disabled.gif', $this->_tpl_vars['THEME']); ?>
" border="0" align="absmiddle" alt="<?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
 <?php echo $this->_tpl_vars['module']['name']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_ENABLE']; ?>
 <?php echo getTranslatedString($this->_tpl_vars['module']['name']); ?>
"></a>
		<?php endif; ?>
	</td>
</tr>								
<?php endforeach; endif; unset($_from); ?>
</table>	