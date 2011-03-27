<?php /* Smarty version 2.6.18, created on 2011-03-14 09:32:56
         compiled from UserGroups.tpl */ ?>
<table class="listTable" border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
<td class="colHeader small" valign="top">#</td>
<td class="colHeader small" valign="top"><?php echo $this->_tpl_vars['UMOD']['LBL_GROUP_NAME']; ?>
</td>
<td class="colHeader small" valign="top"><?php echo $this->_tpl_vars['UMOD']['LBL_DESCRIPTION']; ?>
</td>
</tr>
<?php $_from = $this->_tpl_vars['GROUPLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupiter'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupiter']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['groupname']):
        $this->_foreach['groupiter']['iteration']++;
?>
<tr>
<td class="listTableRow small" valign="top" width="5%"><?php echo $this->_foreach['groupiter']['iteration']; ?>
</td>
<?php if ($this->_tpl_vars['IS_ADMIN']): ?>
<td class="listTableRow small" valign="top"><a href="index.php?module=Settings&action=GroupDetailView&parenttab=Settings&groupId=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['groupname']['1']; ?>
</a></td>
<?php else: ?>
<td class="listTableRow small" valign="top"><?php echo $this->_tpl_vars['groupname']['1']; ?>
</td>
<?php endif; ?>
<td class="listTableRow small" valign="top" width="65%"><?php echo $this->_tpl_vars['groupname']['2']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>