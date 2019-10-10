<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 10:51:14
         compiled from "C:\xampp\htdocs\kass\application\views\list_brands.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211595d385b65b835a7-61078450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93e2d7a1ca9f31cc90e5a073d02ae688c5ffc24f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_brands.tpl',
      1 => 1563024754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211595d385b65b835a7-61078450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d385b65c86e9',
  'variables' => 
  array (
    'selected_language' => 0,
    'brands_data' => 0,
    'brands_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d385b65c86e9')) {function content_5d385b65c86e9($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="brands"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="brands/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
             <h3>
                <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
                    <?php echo lang('listing');?>
 <?php echo lang('of');?>
 <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>

                <?php }elseif($_smarty_tpl->tpl_vars['selected_language']->value=='amharic'){?>
                               <?php echo lang('of');?>
<?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('listing');?>
  
                <?php }?>      </h3>
            <?php if (!empty($_smarty_tpl->tpl_vars['brands_data']->value)){?>
                <form action="brands/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
			<th><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_name'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_description'];?>
</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['row']->value['brand_id'];?>
"/></td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['brand_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['brand_description'];?>
</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="brands/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['brand_id'];?>
"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="brands/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['brand_id'];?>
"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('brands/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['brand_id'];?>
')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-danger" type="submit">
                                    <?php echo lang('delete_selected');?>

                            </button>
                        </div>
                        <div class="pagination">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>
                </form>
            <?php }else{ ?>
                <?php echo lang('no_records_found');?>

            <?php }?>

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>