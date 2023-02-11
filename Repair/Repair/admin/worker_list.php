<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
  $query_worker = "SELECT * FROM tbl_login WHERE user_level = 'worker' order by user_id asc" or die ("Error:" . mysqli_error());
  $result = mysqli_query($con, $query_worker);
//   echo $query_worker;
//   exit();
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">username</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อ-สกุล</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">อีเมล์-เบอร์โทร</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">--</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row)  { $i +=1; ?> 
      <tr>
        <td>
         <?php echo $row['user_id']; ?>
         <td>
         <?php echo $row['username']; ?>
        </td>
         <td>
         <?php echo $row['u_name'].' '.$row['u_lastname'] ?>
        </td>
         <td>
         <?php echo $row['email'].'|เบอร์.'.$row['tel'] ?>
        </td>
         <td>
         <?php echo $row['user_level']; ?>
        </td>
        <td>
        <input type="checkbox" id="toggle" onchange="toggle_check(<?= $row['user_id']?>)" <?php echo($row['user_status'] == 1)?'checked':''; ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini">
        </td>
        <td>         
          <a class="btn btn-warning btn-sm" href="worker.php?act=edit&user_id=<?php echo $row['user_id']; ?>">
           แก้ไข
          </a>
        </td>    
        <td align="center">         
          <a class="btn btn-danger btn-sm" href="worker_del.php?user_id=<?= $row['user_id'];?>" 
            onclick="return confirm('ยืนยันการลบข้อมูล !!');">
           ลบ
          </a>
        </td>  
         <?php } ?>  
      </tr>
    </tbody>
  </table>