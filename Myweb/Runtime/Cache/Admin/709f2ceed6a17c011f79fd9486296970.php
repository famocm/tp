<?php if (!defined('THINK_PATH')) exit();?><div id="uid">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">Username</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">添加时间 </th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php if(is_array($data)): foreach($data as $key=>$row): ?><tr class="odd"> 
            <td class="  sorting_1"><?php echo ($row['id']); ?></td> 
            <td class=" "><?php echo ($row['username']); ?></td>
            <td class=" "><?php echo (date("Y-m-d",$row['addtime'])); ?></td> 
            <td class=" "><a href="/index.php/Admin/Root/delete/id/<?php echo ($row['id']); ?>" class="btn btn-success"><i class="icon-trash"></i></a> <a href="/index.php/Admin/Root/edit/id/<?php echo ($row['id']); ?>" class="btn btn-info"><i class="icon-wrench"></i></a> <a href="/index.php/Admin/Root/rolelist/id/<?php echo ($row['id']); ?>" class="btn btn-success">分配角色</a></td> 
           </tr><?php endforeach; endif; ?>
       
      </tbody>
     </table>
     </div>