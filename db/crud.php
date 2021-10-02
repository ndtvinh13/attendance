<!-- object oriented -->
<!-- SAVING RECORDS TO DB -->
<!-- TODO: CRUD, what the arrow points to is the object -->
<!-- object example: $this, $stmt, $e -->
<?php
    class crud{
        //private database object
        private $db;
        //2 underscores
        //constructor to initialize private variable to the database connection
        function __construct($config)
        {
            $this -> db = $config;
        }

        //public can do outside of the current function
        //function to insert a new record into attendee database

//         Thêm mới (insert) và cập nhật (update) dữ liệu là những hoạt động cơ bản khi thao tác vớidatabase. 
//         Với PDO, mỗi hoạt động insert hay update được thực hiện qua 3 quá trình sử dụng cơ chế Prepared Statement

// Prepare statement: Chuẩn bị một câu lệnh SQL làm khung/mẫu được gọi là Prepared Statement với các Placeholder (có thể hiểu placeholder đóng vai trò như tham số của các phương thức khi bạn khai báo hàm)
// Bind params: Gắn giá trị thực vào các placeholder (tương tự như khi bạn truyền giá trị vào các tham số của phương thức)
// Execute: Thực thi câu lệnh.

        public function insert($fname, $lname, $dob, $email, $contact, $pass, $specialty){
            try {
                //DEFINE sql statement to be execute
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, email, contactnumber, passwordc, specialty_id) VALUES (:fname, :lname, :dob, :email, :contact, :pass, :specialty)";
                //Prepare the sql statement for execution
                $stmt = $this -> db -> prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':pass',$pass);
                $stmt->bindparam(':specialty',$specialty);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        //Edit attendees
        public function editAttendees($id, $fname, $lname, $dob, $email, $contact, $pass, $specialty){
            try{
                $sql="UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`email`=:email,`contactnumber`=:contact,`passwordc`=:pass,`specialty_id`=:specialty WHERE attendee_id = :id";
                //Prepare the sql statement for execution
                $stmt = $this -> db -> prepare($sql);
                //bind the id also
                $stmt->bindparam(':id', $id);
                 //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':pass',$pass);
                $stmt->bindparam(':specialty',$specialty);
                 //execute statement
                $stmt->execute();
                return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        //Get Attendees from the db
        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id ;";
                //This object accesses the db
                //TODO: whatever is in crud must access the db: $this ->db
                $result = $this -> db -> query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }


        
        //Get attendee information
        public function getAttendeeDetails($id){
            try {  
            //Where is in the last place
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";
            $stmt = $this -> db -> prepare($sql);
            $stmt->bindparam(':id', $id);
            // Store the result
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }   
            
        }


        //Delete funciton
        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
                $stmt = $this -> db -> prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }



        //Get Specialties from the db
        public function getSpecialties(){
            try {
                $sql = "SELECT * FROM `specialties`;";
                $result = $this -> db -> query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>
