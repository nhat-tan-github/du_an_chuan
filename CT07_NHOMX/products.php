<?
    require "INC/init.php";
    // sau nay se doc tu Books trong database
    $conn = require "INC/db.php";

    $books = Book::getAll($conn);
    require "INC/header.php"
?>

<!-- TRing bay san pham dang card -->
<div class="content">
    <? foreach($books as $book):?>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="UPLOADS/<?echo $book->imagefile?>" alt="Avatar"
                    width="100" height="100">
                </div>
                <div class="flip-card-back">
                    <h2><?echo $book->title?></h2>
                    <p><?echo $book->description?></p>
                    <p><?echo $book->author?></p>
                </div>
            </div>
        </div>
    <? endforeach;?>

</div>

<?require "INC/footer.php"?>