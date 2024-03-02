<?
    class Book{
        public $id;
        public $title;
        public $description;
        public $author;
        public $imagefile;

        public function __construct($title = null, $description = null, $author = null, $imagefile = null){
            $this->title = $title;
            $this->description = $description;
            $this->author = $author;
            $this->imagefile = $imagefile;
        }
        
        private function validate(){
            return $this->title &&
                $this->description &&
                $this->author ;
        }

        // 
        public function add($conn){
            if($this->validate()){

                try {
                    $sql = "insert into books (title, description, author, imagefile) 
                            values (:title, :description, :author, :imagefile)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(":title", $this->title, PDO::PARAM_STR);
                    $stmt->bindValue(":description", $this->description, PDO::PARAM_STR);
                    $stmt->bindValue(":author", $this->author, PDO::PARAM_STR);
                    $stmt->bindValue(":imagefile", $this->imagefile, PDO::PARAM_STR);
    
                    return $stmt->execute();
    
    
                } catch (PDOException $e) {
                    
                    echo $e->getMessage();
                    return false;
                }
            }else{
                return false;
            }
        }

        public static function getAll($conn){
            try {
                $sql = "select * from books order by title asc";
                $stmt = $conn->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Book');

                if($stmt->execute()){
                    $books = $stmt->fetchAll();
                    return $books;
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
                return null;
            }
        }

        public function getByID($conn, $id){
            try {
                //code...
                $sql = "select * from books where id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":id", $id, PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                if($stmt->execute()){
                    $book = $stmt->fetch();
                    return $book;
                }

            } catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return null;
            }
        }
        public static function getPaging($conn, $limit, $offset){
            try {
                $sql = "select * from books order by title asc
                        limit :limit
                        offset: offset";
                $stmt = $conn->prepare($sql);
                $stmt->bindvalue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindvalue(':offset', $offset, PDO::PARAM_INT);
                $stmt->setFetchhMode(PDO::FETCH_CLASS, 'Book');

                if($stmt->execute()){
                    $books = $stmt->fetchhAll();
                    return $books;

                }
            } catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return null;

            }
        }

        public function update($conn){
            if($this->validate()){
            try {
                //code...
                $sql = "update books
                set title = :title,
                description = :description,
                author = :author,
                imagefile = :imagefile
                where id =:id";

                // su dung prepare de chuan bi truy van
                $stmt = $this->$conn->prepare($sql);

                // Bind gia tri cho cac placeholder.
                $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
                $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
                $stmt->bindValue(':author', $this->author, PDO::PARAM_STR);
                $stmt->bindValue(':imagefile', $this->imagefile, PDO::PARAM_STR);
                $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                return $stmt->execute();
            


            } catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
        }
        }
        

        public function delete(){
            
        }

        public function deleteByID($conn, $id){
            try {
                //code...
                // Chuan bi cau truy van DELETE
                $sql = "delete from books where id = :id";
                // su dung prepare de chuan bi truy van 
                $stmt = $conn->prepare($sql);

                // bind gia tri id 
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                // Thuc hien truy van
                return $stmt->execute();

                echo "Xoa thanh cong";
            } catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
        }

        public function updateImage($conn, $id, $imagefile){
            try {
                $sql = "update books 
                        set imagefile = :imagefile where id = :id ";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':imagefile', $this->imagefile,$imagefile == null? PDO::PARAM_NULL : PDO::PARAM_STR);
                $stmt->bindValue(':id',$id, PDO::PARAM_INT );
                return $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }

        public function count($conn){
            try {
                $sql = "select count(id) from books";
                return $conn->query($sql)->fetchColumn();

            } catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return -1;
            }
        }
    }
?>