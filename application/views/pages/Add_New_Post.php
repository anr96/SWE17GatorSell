<?php
$locations = array(
    array('id' => '0', 'location' => "--- Select One ---", 'latitude' => '', 'longitude' => ''),
    array('id' => '1', 'location' => "Cesar Chavez", 'latitude' => '37.7058856', 'longitude' => '-122.4849352'),
    array('id' => '2', 'location' => "Library", 'latitude' => '37.7220097', 'longitude' => '-122.4785393'),
    array('id' => '3', 'location' => "Cafe Rosso", 'latitude' => '37.722776', 'longitude' => '-122.479493'),
);
?>
<div class = "container-fluid">
    <form method="post" id="AddNewPost" action ="<?= site_url('items/new_item') ?>" enctype="multipart/form-data"> 
        <div class = "row">
            <center><h1> Sell Item </h></center>
        </div>
        <?php echo validation_errors(); ?>
        <div class = "row">
            <div class = "col-md-1"></div>
            <div class = "col-md-5">
                <h3>Add New Post:</h3>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <div class="required-field-block">
                        <input type="name" class="form-control" id="name" name ="name" placeholder="Title" required="true" value="<?= set_value('name');?>">
                        <div class="required-icon">
                            <div class="text">*</div>
                        </div>
                    </div>
                </div>
                <div class = "row">
                    <div class ="col-md-5">
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <div class="required-field-block">
                                <input type="price" class="form-control" id="price" name ="price" placeholder="$" value="<?=set_value('price');?>">
                                <div class="required-icon">
                                    <div class="text">*</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="categorys">Category:</label>
                                <?php
                                categories_select('Choose a Category', "class='form-control' id = 'categorys' name = 'category_id'", set_value('category_id'));
                                ?>
                            </div>
                            <div class ="col-md-7"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" id="description" name = "description"><?=set_value('description');?></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Upload 1 Photo:</label>
                    <input type="file" class="form-control-file" id="photo"  name = "photo" accept=".jpg,.jpeg,.gif,.png">
                    <small id="fileHelp" class="form-text ">File size must be under 2MB and a jpg, jpeg, gif, or png file type</small>
                </div>
            </div>
            <div class = "col-md-5">
                <h3>Safe Meeting:<small>Pick a safe place to meet on SFSU campus.</small> </h3> 
                <div class="form-group">
                    <label for="locations">Location:</label>
                    <?php
                    locations_select('Choose a location', "class='form-control' id = 'locations' name = 'location_id'", set_value('location_id'));
                    ?>
                    <br />
                    <div id="map"></div>

                    <script>

                        var map;

                        function initMap() {
                            var uluru = {lat: 37.722558, lng: -122.4780799};
                            map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 17,
                                center: uluru
                            });
                            marker = new google.maps.Marker({
                                position: uluru,
                                map: map
                            });
                        }

                    </script>

                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPPBuI9Ok7SqFArQX8RjzG4DP4jfLZABc&callback=initMap">
                    </script>

                </div>
            </div>
            <div class = "col-md-1"></div>

        </div>
        <div class = "row">
            <div class = "col-md-5"> </div>
            <div class = "col-md-1"> 
                <a href="<?php echo $_SESSION['cancel_destination'];  ?>" class="btn btn-danger btn-block" role="button">Cancel</a>
            </div>
            <div class = "col-md-1"> 

                <button type="submit" class="btn btn-success btn-block">Add</button>

            </div>

            <div class = "col-md-5"> </div>
        </div>
    </form> 
</div>


