<?php 

class User
{
    
    public $name;
    public $email;
    public $password;

    // Show All Users 
    public static function showAll( $conn ){
        $sql = "SELECT * FROM dbms"; 
        $result = mysqli_query( $conn , $sql );
        return mysqli_fetch_all( $result , MYSQLI_ASSOC  );
    }

    // Show One User 
    public static function showOne( $conn , $id ){
        $sql = "SELECT * FROM dbms WHERE id = $id "; 
        $result = mysqli_query( $conn , $sql );
        return mysqli_fetch_assoc( $result );
    }

    // DELETE One User 
    public static function deleteOne( $conn , $id ){
        $sql = "DELETE FROM dbms WHERE id = $id "; 
        mysqli_query( $conn , $sql );
        return true;
    }

    // Update One user
    public static function updateOne($conn , $id , $name , $email , $password ){
        $sql = "UPDATE dbms SET name = ? , email = ? , password = ? WHERE id = ?";
        $stmt = mysqli_prepare( $conn , $sql );
        mysqli_stmt_bind_param( $stmt , 'sssi' , $name , $email , $password , $id  );
        if ( mysqli_stmt_execute( $stmt ) ){
            return true;
        }
    }

    public static function createOne( $conn , $name , $email , $password ){
       $sql = "INSERT INTO dbms ( name , email , password ) VALUES ( ? , ? , ? ) ";
       $stmt = mysqli_prepare( $conn , $sql );
       mysqli_stmt_bind_param( $stmt , 'sss' , $name , $email , $password );
       if ( mysqli_stmt_execute( $stmt ) ){
        return true;
       }
       
    } 

}