<form id="nbs" class="navbar-form" method="post" action="<?= site_url('items/query')?>">
    <div class="form-group">
        <?php 
        categories_select('All','class="form-control" name="categoryID"',$_SESSION['categoryID']);
        ?>
        <input type="text" name="query" class="form-control" placeholder="Search" value="<?= htmlentities($_SESSION['query']);?>">
        <button type="submit" class="btn btn-default">Search</button>
    </div>
    
</form>
