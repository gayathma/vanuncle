<header class="panel-heading">
    Manage Registered Drivers
    <span class="tools pull-right">
        <a href="javascript:;" class="fa fa-chevron-down"></a>
        <a href="javascript:;" class="fa fa-times"></a>
    </span>
</header>
<!-- page start-->
<ul class="directory-list">
    <li><a onclick="load_reg_users_by_letter('A')" style="cursor: pointer">a</a></li>
    <li><a onclick="load_reg_users_by_letter('B')" style="cursor: pointer">b</a></li>
    <li><a onclick="load_reg_users_by_letter('C')" style="cursor: pointer">c</a></li>
    <li><a onclick="load_reg_users_by_letter('D')" style="cursor: pointer">d</a></li>
    <li><a onclick="load_reg_users_by_letter('E')" style="cursor: pointer">e</a></li>
    <li><a onclick="load_reg_users_by_letter('F')" style="cursor: pointer">f</a></li>
    <li><a onclick="load_reg_users_by_letter('G')" style="cursor: pointer">g</a></li>
    <li><a onclick="load_reg_users_by_letter('H')" style="cursor: pointer">h</a></li>
    <li><a onclick="load_reg_users_by_letter('I')" style="cursor: pointer">i</a></li>
    <li><a onclick="load_reg_users_by_letter('J')" style="cursor: pointer">j</a></li>
    <li><a onclick="load_reg_users_by_letter('K')" style="cursor: pointer">k</a></li>
    <li><a onclick="load_reg_users_by_letter('L')" style="cursor: pointer">l</a></li>
    <li><a onclick="load_reg_users_by_letter('M')" style="cursor: pointer">m</a></li>
    <li><a onclick="load_reg_users_by_letter('N')" style="cursor: pointer">n</a></li>
    <li><a onclick="load_reg_users_by_letter('O')" style="cursor: pointer">o</a></li>
    <li><a onclick="load_reg_users_by_letter('P')" style="cursor: pointer">p</a></li>
    <li><a onclick="load_reg_users_by_letter('Q')" style="cursor: pointer">q</a></li>
    <li><a onclick="load_reg_users_by_letter('R')" style="cursor: pointer">r</a></li>
    <li><a onclick="load_reg_users_by_letter('S')" style="cursor: pointer">s</a></li>
    <li><a onclick="load_reg_users_by_letter('T')" style="cursor: pointer">t</a></li>
    <li><a onclick="load_reg_users_by_letter('U')" style="cursor: pointer">u</a></li>
    <li><a onclick="load_reg_users_by_letter('V')" style="cursor: pointer">w</a></li>
    <li><a onclick="load_reg_users_by_letter('W')" style="cursor: pointer">x</a></li>
    <li><a onclick="load_reg_users_by_letter('X')" style="cursor: pointer">y</a></li>
    <li><a onclick="load_reg_users_by_letter('Y')" style="cursor: pointer">z</a></li>
</ul>

<div class="directory-info-row">
    <div class="row" id="reg_user_filter_content">

        <table  class="display table table-bordered table-striped" id="make_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($results as $result) {
                    ?>
                    <tr id="driver_<?php echo $result->id; ?>">
                        <td><?php echo ++$i; ?></td>
                        <td align="center">
                            <?php if(!empty($result->profile_pic)){ ?>
                            <img src="<?php echo base_url(); ?>uploads/drivers/<?php echo $result->profile_pic; ?>" width="60px" />
                            <?php }else{ ?>
                            <img src="<?php echo base_url(); ?>uploads/drivers/avatar.png" width="60px" />
                            <?php } ?>
                        </td>
                        <td><?php echo $result->name; ?></td>
                        <td><?php echo $result->nic; ?></td>
                        <td><?php echo $result->email; ?></td>
                        <td><?php echo $result->mobile; ?></td>

                        <td align="center">
                            <a class="btn btn-danger btn-xs" onclick="delete_driver(<?php echo $result->id; ?>)" ><i class="fa fa-trash-o " title="" data-original-title="Remove"></i></a>

                        </td>
                    </tr>
                    <?php } ?>

                </tbody>

            </table>
    </div>
</div>
<!-- page end-->

<script type="text/javascript">

        $('#user_menu').addClass('active');

        function delete_driver(user_id) {
            if (confirm('Are you sure want to delete this Driver?')) {
                $.ajax({
                    type: "POST",
                    url: site_url + '/driver/delete_driver',
                    data: "driver_id=" + user_id,
                    success: function(msg)
                    {
                        if (msg == 1) {
                            $('#driver_' + user_id).hide();
                        }
                        else if (msg == 2) {
                            alert('Error!!');
                        }
                    }
                });
            }
        }

</script>

