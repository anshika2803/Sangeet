<?php
    class Artist{
    	private $con;
    	private $id;

    	public function __construct($con , $id){
    		$this->con = $con;
    		$this->id = $id;
    	}
    	public function getId() {
    		return $this->id;
    	}
    	public function getName(){
    		$artistQuery = mysqli_query($this->con , "SELECT name FROM artists WHERE id='$this->id' ");
            $artist = mysqli_fetch_array($artistQuery);
            return $artist['name'];
    	}
    	public function getSongIds(){
            $query= mysqli_query($this->con,"SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays DESC"); //to give ascending order
            $array = array(); //initialize
            while($row = mysqli_fetch_array($query))//converting array to query 
            {
                array_push($array, $row['id']);// parameter want to push, parameter want to be pushed
            }
            return $array;
        }
    	
    }
?>
