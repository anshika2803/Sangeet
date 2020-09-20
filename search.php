<?php include ("includes/header.php"); 

if(isset($_GET['term'])){
	$term =urldecode($_GET['term']);	
}
else{
	$term = "";
}
?>
<div class="searchContainer">
	<h4>Search for artist, album or song!</h4>
	<input type="text" class="searchInput" value="<?php echo $term; ?>"placeholder="Type Here...." onfocus="this.value = this.value">
</div>
<script>
$(".searchInput").focus();
$(function() {
	$(".searchInput").keyup(function(){
		clearTimeout(timer);

		timer= setTimeout(function(){
			var val = $(".searchInput").val();
			openPage("search.php?term=" + val);	
        },2000)
	})


})
</script>
<?php if($term == "") exit(); ?>
<div class="trackListContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="trakList">

		<?php
		$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10 ");
		if(mysqli_num_rows($songsQuery)==0){
			echo "<span class='noResults'>No songs found matching " . $term ."</span>";
		}
		$songIdArray = array();

		$i =1;
		while($row = mysqli_fetch_array($songsQuery))
		{
            if($i>15){
				break;
			}
			array_push($songIdArray,$row['id']);
			$albumSong = new Song($con,$row['id']);
			$albumArtist = $albumSong->getArtist();	

			echo"<li class='trackListRow'>
			       <div class='trackCount'>
			         <img class='play' src='assets/icons/play-white.png' onclick ='setTrack(\""  .$albumSong->getId().  "\",tempPlaylist,true)'>
                     <span class='trackNumber'>$i</span>
			      </div>
			      <div class='trackInfo'>
			          <span class='trackName'>"  .$albumSong->getTitle() . "</span>
			          <span class='artistName'>" .$albumArtist->getName() ."</span>
			      </div>
			      <div class='trackOptions'>
			            <img class='optionsButton' src='assets/icons/more.png'>
			      </div>
			      <div class='trackDuration'>
			         <span class='duration'>" .$albumSong->getDuration() ."</span>
			      </div>
			    </li>";	
			$i++;	
		}
		?>	
		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray);?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>
	</ul>

</div>

<div class="artistContainer borderBottom">
	<h2>ARTISTS</h2>
	<?php
	$artistsQuery = mysqli_query($con,"SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");
	if(mysqli_num_rows($artistsQuery)==0){
			echo "<span class='noResults'>No artists found matching " . $term ."</span>";
		}
	while($row = mysqli_fetch_array($artistsQuery)){
		$artistFound = new Artist($con,$row['id']);
		echo "<div class='searchResultRow'>
		        <div class='artistName'>
		           <span onclick='openPage(\"artist.php?id=" . $artistFound->getId() . ")'>"

                      . $artistFound->getName() .

		             "
		            </span>
		        </div>
		    </div>";
	}
	?>
</div>
<div class="gridViewContainer">
	<h2>ALBUMS</h2>
	<?php
		 $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10 ");
		 if(mysqli_num_rows($albumQuery)==0){
			echo "<span class='noResults'>No albums found matching " . $term ."</span>";
		}
		 while($row = mysqli_fetch_array($albumQuery)){
			echo "<div class='gridViewItem'>
					<a href='album.php?id=" . $row['id'] . "'>

						<img src='".$row['artworkPath'].  "'>

						<div class'gridViewInfo'>"
					    . $row['title'] .
					    "</div>
					</a>

				</div>";

		  }
	?>						
</div>

<?php include ("includes/footer.php"); ?>