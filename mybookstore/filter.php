

<h1>Search Books</h1>
<hr/>
<h3>Filter by Category</h3>
<form action="index.php" method="GET" style="padding-left:20px">
    <?php
        try{
            require_once 'connection/connection.php';
            require_once 'myFunc.php';

            $types = getBookType($connection);

            foreach($types as $key => $value){
                $tid = $value['Book_type_id'];
                $tname = $value['Book_type'];      
    ?>
    <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="types[]" value="<?php echo $tid; ?>">
    <label class="form-check-label"><?php echo $tname; ?></label>
  </div>
    <?php 
    }
        }catch(e){
            echo "<h1>500 Internal error</h1>";
        }
    ?>
    <div class="mb-3 text-center">
  	    <input type="submit" class="btn btn-primary" value="Search">
    </div>
</form>