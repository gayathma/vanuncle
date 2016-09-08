
<div class="container page">
    <div class="row">
        <div class="col-md-12">
            <h1> <?php echo $artile->content_title; ?></h1>
        </div>

        <?php if (basename($_SERVER["PHP_SELF"]) == 'destinations') { ?>
            <div class="col-md-12 content-left">
                <?php echo $artile->content; ?>
            </div>



        <?php } else { ?>
            <div class="col-md-8 col-sm-6 content-left">
                <?php echo $artile->content; ?>
            </div>

            <div class="col-md-4 col-sm-6 right-snipts">
                <?php $this->load->view('template/right_side_coloumn'); ?>
            </div>

        <?php } ?>
    </div>
</div>        