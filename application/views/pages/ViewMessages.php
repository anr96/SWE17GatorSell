<div class="container-fluid">
    <div class="text-center">
        <h1>Messages</h1>
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
              <th class="text-center"><a href="" class="btn btn-danger">Delete</a></th>
              <th id="date" style="cursor: pointer" class=text-center onclick="formatColumn1()">Date ▲</th>
              <th id="item" style="cursor: pointer" class=text-center onclick="formatColumn2()">Item ▲</th>
              <th id="messenger" style="cursor: pointer" class=text-center onclick="formatColumn3()">Messenger ▲</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="checkbox" value=""></td>
              <td>3/14/17</td>
              <td>Box of Cigarettes</td>
              <td>Mike Smith</td>
              <td><a href="<?= site_url('ViewMessage')?>" class="btn bg-primary">View Message and Reply</a></td>
            </tr>
            <tr>
              <td><input type="checkbox" value=""></td>
              <td>3/15/17</td>
              <td>Bowling Ball</td>
              <td>Sally King</td>
              <td><a href="<?= site_url('ViewMessage')?>" class="btn bg-primary">View Message and Reply</a></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>

<script>
    function formatColumn1(){
        var text = document.getElementById("date").innerHTML;
        if(text === "Date ▲")
            document.getElementById("date").innerHTML = "Date ▼";
        else if(text === "Date ▼")
            document.getElementById("date").innerHTML = "Date ▲";
    }
    function formatColumn2(){
        var text = document.getElementById("item").innerHTML;
        if(text === "Item ▲")
            document.getElementById("item").innerHTML = "Item ▼";
        else if(text === "Item ▼")
            document.getElementById("item").innerHTML = "Item ▲";
    }
    function formatColumn3(){
        var text = document.getElementById("messenger").innerHTML;
        if(text === "Messenger ▲")
            document.getElementById("messenger").innerHTML = "Messenger ▼";
        else if(text === "Messenger ▼")
            document.getElementById("messenger").innerHTML = "Messenger ▲";
    }
</script>
