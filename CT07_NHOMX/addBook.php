<?require "INC/init.php"?>

<?require "INC/header.php"?>
<!-- Tao form nhap book -->
<div class="content">
    <form action="" method="post" id="frmADDBOOK" enctype="multipart/form-data">
        <fieldset>
            <legend>Add Book</legend>
            <div class="row">
                <label for="">Title: </label>
                <span class="error">*</span>
                <input type="text" name="title" id="title" placeholder="Title">
            </div>

            <div class="row">
                <label for="">Decription: </label>
                <span class="error">*</span>
                <input require type="text" name="decription" id="decription" placeholder="Decription">
            </div>

            <div class="row">
                <label for="">Author: </label>
                <span class="error">*</span>
                <input require type="text" name="author" id="author" placeholder="Author">
            </div>

            <div class="row">
                <label for="file">File hình ảnh</label>
                <input type="file" name="file" id="file">
            </div>

            <div class="row">
                <input class="btn" type="submit" value="Save">
                <input class="btn" type="reset" value="Cancel">
            </div>
        </fieldset>
    </form>
</div>

<?require "INC/footer.php"?>