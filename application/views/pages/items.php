<div class="container-fluid">
    <h1 class="text-center">Items For Sale</h1>
    <div class="row">
        <div class="col-md-4"></div> 
        <div class="col-md-4 text-center">
            <?= "<p class='results-count-text'>Viewing Items $start - $end of $total results.</p>"; ?>
        </div> 
        <div class="col-md-4">
            <?php gs_pagination($total, "items", $page, $sortby); ?>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-inline pull-right">
                <label for="sel1">Sort by:</label>
                <select class="form-control" id="sel1" onchange="window.open('<?= site_url("items/$page/") ?>' + this.options[ this.selectedIndex ].value, '_self')">
                    <option value="0" <?= ($sortby == 0 ? 'selected' : '') ?>>Oldest Items First</option>
                    <option value="1" <?= ($sortby == 1 ? 'selected' : '') ?>>Newest Items First</option>
                    <option value="2" <?= ($sortby == 2 ? 'selected' : '') ?>>Lowest Price</option>
                </select>
            </div>
        </div>
    </div>
    <?php
    foreach ($items as $item) {
        $this->load->view('widgets/itembox', array('item' => $item));
    }
    gs_pagination($total, "items", $page, $sortby);
    ?>

</div>
