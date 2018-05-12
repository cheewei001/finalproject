

$maillist_array = array(); // start an array

while($row = mysqli_fetch_array($maillist)){ // cycle through each record returned
    $maillist_array[] = "\"".$row['email']."\""; // get the username field and add to the array above with surrounding quotes
}

$maillist_string = implode(",", $maillist_array); // implode the array to "stick together" all the usernames with a comma inbetween each

echo $maillist_string;  