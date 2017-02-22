<?php $data['team'] = $team; ?>

<div class="container-fluig">
    <div class="jumbotron">
        <h1 class="text-center">Software Engineering Class SFSU</h1>
        <h2 class="text-center">Spring 2017</h2>
        <h2 class="text-center">Section 02</h2>
        <h2 class="text-center">Team 10</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('templates/teambox',$data); ?>
        </div>
    </div>
</div>