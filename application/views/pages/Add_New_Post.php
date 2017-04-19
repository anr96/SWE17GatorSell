
<?php
$categories = array(
    array('id' => '0', 'category' => ''), //Should create error if selected
    array('id' => '', 'category' => 'Furniture'),
    array('id' => '', 'category' => 'Books'),
    array('id' => '', 'category' => 'Video Games'),
    array('id' => '', 'category' => 'Other'),
);

$locations = array(
    array('id' => '0', 'location' => "--- Select One ---", 'latitude' => '', 'longitude' => ''),
    array('id' => '1', 'location' => "Cesar Chavez", 'latitude' => '37.7058856', 'longitude' => '-122.4849352'),
    array('id' => '2', 'location' => "Library", 'latitude' => '37.7220097', 'longitude' => '-122.4785393'),
    array('id' => '3', 'location' => "Cafe Rosso", 'latitude' => '37.722776', 'longitude' => '-122.479493'),
);
?>
<div class = "container-fluid">
            <form method="post" id="AddNewPost" action ="<?= site_url("Confirmation");?>"> 

    <div class = "row">

        <div class = "col-md-6">
            <h2>Add New Post:</h2>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <div class="required-field-block">
                        <input type="name" class="form-control" id="name" name ="name" placeholder="Title" required="true">

                        <div class="required-icon">
                            <div class="text">*</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <div class="required-field-block">
                        <input type="price" class="form-control" id="price" name ="price" placeholder="$">
                        <div class="required-icon">
                            <div class="text">*</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>

                    <select class="form-control" id="category">

                        <?php
                        foreach ($categories as $cat) {
                            echo "<option>$cat[category]</option>";
                        }
                        ?>

                    </select>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" rows="5" id="description" name = "description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control-file" id="photo"  name = "photo" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text ">File size must be under 4MB.</small>
                    </div>
                </div>



        </div>

        <div class = "col-md-6">

            <h2>Safe Meeting: </h2>
            <div class="form-group">
                <label for="location">Location:</label>
                <select class="form-control" id="locations" name = "location">
                    <?php
                    foreach ($locations as $loc) {
                        echo "<option>$loc[location]</option>";
                    }
                    ?>

                </select>
                <br>

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
                  

    </div>
    <div class = "row">
        <div class = "col-md-5"> </div>
        <div class = "col-md-1"> 
            <a href="<?= site_url(); ?>" class="btn btn-danger btn-block" role="button">Cancel</a>
        </div>
        <div class = "col-md-1"> 

            <button type="submit" class="btn btn-success btn-block">Add</button>

        </div>
        
        <div class = "col-md-5"> </div>
    </div>
                 </form> 
</div>


