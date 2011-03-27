<?php /* Smarty version 2.6.18, created on 2011-03-14 09:35:02
         compiled from modules/ModComments/widgets/DetailViewBlockCommentItem.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'modules/ModComments/widgets/DetailViewBlockCommentItem.tpl', 10, false),)), $this); ?>
<div class="dataField" style="width: 99%; padding-top: 10px;" valign="top">
	<?php echo smarty_modifier_nl2br($this->_tpl_vars['COMMENTMODEL']->content()); ?>

</div>
<div class="dataLabel" style="border-bottom: 1px dotted rgb(204, 204, 204); width: 99%; padding-bottom: 5px;" valign="top">
	<font color="darkred">
		<?php echo $this->_tpl_vars['MOD']['LBL_AUTHOR']; ?>
: <?php echo $this->_tpl_vars['COMMENTMODEL']->author(); ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_ON']; ?>
 <?php echo $this->_tpl_vars['COMMENTMODEL']->timestamp(); ?>

	</font>
</div>