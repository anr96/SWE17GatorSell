<div class="container-fluid">
    <h1 class="text-center">Items For Sale</h1>
    <div class="row">
        <div class="col-md-4">
        </div> 
        <div class="col-md-4 text-center">
            <?="<p class='results-count-text'>Viewing Items $start - $end of $total results.</p>";?>
        </div> 
        <div class="col-md-4">
             <?php gs_pagination($total,"items",$page);?>
        </div> 
    </div>
    <?php
    foreach ($items as $item) {
        $this->load->view('widgets/itembox', array('item' => $item));
    }
    gs_pagination($total,"items",$page);
    ?>
    
</div>
