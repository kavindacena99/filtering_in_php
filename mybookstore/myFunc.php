<?php
    function showBooks($connection){
        try{
            $sql = "SELECT * FROM books";
            $result = mysqli_query($connection,$sql);

            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='card' style='width: 18rem;margin:18px'>" . 
                        "<img src='img/coverimage/" . $row['image_name'] . "' class='card-img-top'>" . 
                        "<div class='card-body'>" . 
                            "<h5 class='card-img-top'>" . $row['Book_name'] . "</h5>" . 
                            "<p class='card-text'>" . $row['price'] . "</p>" . 
                            "<a href='book.php?bookid={$row['Book_ID']}' class='btn btn-danger'>Add to cart</a>" . 
                        "</div>" . 
                    "</div>";
            }
        }catch(Exception $e){
            die($e -> getMessaage());
        }
    }

    function getData($connect,$query){
        $arr = array();
        try {
            $sql = $query;
            $result = mysqli_query($connect,$sql);	
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arr,$row);
            }
        } catch (Exception $e) {
            $arr = null;
            die($e->getMessage());
        }
        return $arr;
    }

    function getBookCoverPrice($connect){
        $sql = "SELECT Book_name,image_name,price FROM books";
        return getData($connect,$sql);
    }

    function getBookType($connect){
        $sql = "SELECT * FROM booktype";
        return getData($connect,$sql);
    }

    function filterBooksByTypes($connect,$tid){
        $sql = "SELECT * from books where Book_type_id = '$tid'";
        return getData($connect,$sql);
    }
?>