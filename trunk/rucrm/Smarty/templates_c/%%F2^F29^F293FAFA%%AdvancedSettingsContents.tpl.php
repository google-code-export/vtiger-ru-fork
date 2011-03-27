<?php /* Smarty version 2.6.18, created on 2011-03-13 18:18:59
         compiled from modules/CustomerPortal/AdvancedSettingsContents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getTranslatedString', 'modules/CustomerPortal/AdvancedSettingsContents.tpl', 24, false),)), $this); ?>

<table width="100%" cellpadding=0 cellspacing=0 border=0>

<tr valign="top">
<td width="350px">
	<table border=0 cellspacing=0 cellpadding=5 width="100%" align="" class="small listTable">
		<tr>
			<td class="colHeader small"><?php echo $this->_tpl_vars['MOD']['LBL_MODULE']; ?>
</td>
			<td class="colHeader small"><?php echo $this->_tpl_vars['MOD']['LBL_VIEW_ALL_RECORD']; ?>
</td>
		</tr>
		<?php $_from = $this->_tpl_vars['MODULE_VIEWALL']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['viewall']):
?>
		<tr onmouseover="this.className='prvPrfHoverOn'" onmouseout="this.className='prvPrfHoverOff'">
			<td class="listTableRow small" width="50%"><?php echo getTranslatedString($this->_tpl_vars['viewall']['module']); ?>
</td>
			<td class="listTableRow">
					<?php if ($this->_tpl_vars['viewall']['value'] == 1): ?>
						<?php $this->assign('select_all', 'checked'); ?>
						<?php $this->assign('select_mine', ''); ?>
					<?php else: ?>
						<?php $this->assign('select_all', ''); ?>
						<?php $this->assign('select_mine', 'checked'); ?>
					<?php endif; ?>
					<input type="radio" name="view_<?php echo $this->_tpl_vars['viewall']['module']; ?>
" <?php echo $this->_tpl_vars['select_all']; ?>
 value="showall"> <?php echo $this->_tpl_vars['MOD']['YES']; ?>

					<input type="radio" name="view_<?php echo $this->_tpl_vars['viewall']['module']; ?>
" <?php echo $this->_tpl_vars['select_mine']; ?>
 value="onlymine"><?php echo $this->_tpl_vars['MOD']['NO']; ?>
				
			</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>	
	</table>
</td>

<td>
	<table class="small" width="100%" cellpadding=5 cellspacing=0>
	<tr valign="top">
		<td class="small"><b><?php echo $this->_tpl_vars['MOD']['SELECT_USERS']; ?>
</b></td>
			<td width="70%" >
				<select name="userid" class="small">
					<?php $_from = $this->_tpl_vars['USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
						<?php if ($this->_tpl_vars['USERID'] == $this->_tpl_vars['user']['id']): ?>
							<option value="<?php echo $this->_tpl_vars['user']['id']; ?>
" selected><?php echo $this->_tpl_vars['user']['name']; ?>
</option>
						<?php else: ?>
							<option value="<?php echo $this->_tpl_vars['user']['id']; ?>
"><?php echo $this->_tpl_vars['user']['name']; ?>
</option>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>		
				</select>	
			</td>
		</tr>
		<tr>
			<td class="small" colspan=2 width="100%" align="left">
				<?php echo $this->_tpl_vars['MOD']['LBL_USER_DESCRIPTION']; ?>

			</td>
		</tr>
	</table>
</td>
</tr>

<tr>
	<td colspan=2 align=center>
		<input class="crmbutton small save" type="Submit" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" value="Save" alt="Save" onclick=VtigerJS_DialogBox.block();>
	</td>
</tr>

</table>