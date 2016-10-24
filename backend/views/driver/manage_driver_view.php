<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Registered Drivers
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>


            <div class="panel-body">
                <div class="adv-table">

                    <table  class="display table table-bordered table-striped" id="driver_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profile Picture</th>
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
                                        <?php if (!empty($result->profile_pic)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/drivers/<?php echo $result->profile_pic; ?>" width="60px" />
                                        <?php } else { ?>
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
        </section>
    </div>
</div>

<script type="text/javascript">

    $('#user_menu').addClass('active');

    $(document).ready(function () {
        $('#driver_table').dataTable();

    });

    function delete_driver(user_id) {
        if (confirm('Are you sure want to delete this Driver?')) {
            $.ajax({
                type: "POST",
                url: site_url + '/driver/delete_driver',
                data: "driver_id=" + user_id,
                success: function (msg)
                {
                    if (msg == 1) {
                        $('#driver_' + user_id).hide();
                    } else if (msg == 2) {
                        alert('Error!!');
                    }
                }
            });
        }
    }

</script>

