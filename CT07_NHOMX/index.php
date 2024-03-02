<?

    require "INC/init.php"; // tu dong goi den cac class  

    // Sau nay se doc book trong database
    $conn =  require "INC/db.php";
    $books = Book::getAll($conn);





?>
    <?require "INC/header.php";?>

    <!-- THiết kế trang index ở đây -->
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Image</th>
                </tr>
            </thead>
            <!-- Cac dong du lieu o day -->
            <tbody>
                <? $i = 1;?>
                <? foreach($books as $book): ?>
                    <tr>
                        <td align="center"><? echo $i++; ?></td>
                        <td><? echo $book->title?></td>
                        <td><? echo $book->description?></td>
                        <td><? echo $book->author?></td>
                        <td>
                            <? if(Auth::isLoggedIn()): ?>
                                <a class="btn" href="editbook.php">Edit</a>
                                <a class="btn" href="delbook.php">Delete</a>
                            <? else:?>
                                    <img src="UPLOADS/<?echo $book->imagefile?>" alt=""
                                        width="100" height="100">

                            <?endif;?>
                        </td>
                    </tr>
                <? endforeach;?>
            </tbody>


            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th colspan="3"><?echo count($books)?></th> 
                    <!-- colspan la ghep o -->
                </tr>
            </tfoot>
        </table>
    </div>

    

    <?require "INC/footer.php"?>
