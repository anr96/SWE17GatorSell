<form id="nbs" class="navbar-form" method="post" action="<?= site_url('items/query')?>">
    <div class="form-group">
        <?php 
        categories_select('All','class="form-control" name="categoryID"',$_SESSION['categoryID']);
        $value = isset($_SESSION['query']) ? "value='{$_SESSION['query']}'" : '';
        ?>
        <input type="text" name="query" class="form-control" placeholder="Search" <?=$value;?>>
    </div>
    <button type="submit" class="btn btn-default">Search</button>
    </form>
