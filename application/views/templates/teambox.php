<?php $this->load->helper('url'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Meet The Team!</h3>
    </div>
    <div class="panel-body">
        <?php
            foreach ($team as $member) {
               echo anchor($member['uri'], $member['name'], 'class="btn btn-default btn-block" role="button"'); 
            }
        ?>
    </div>
</div>