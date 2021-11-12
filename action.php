<?php

  if(!empty($_POST["jenis"])){

    /* RE-ESTABLISH YOUR CONNECTION */
    $con = new mysqli("localhost", "root", "admin", "web_buku");

    /* CHECK CONNECTION */
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    }

    /* PREPARE YOUR QUERY */
    $stmt = $con->prepare("SELECT  FROM jenis_buku WHERE id_jenis = ?");
    $stmt->bind_param("i", $_POST["id_jenis"]); /* PARAMETIZE THIS VARIABLE TO YOUR QUERY */
    $stmt->execute(); /* EXECUTE QUERY */
    $stmt->bind_result($jenis_buku); /* BIND THE RESULTS TO THESE VARIABLES */
    $stmt->fetch(); /* FETCH THE RESULTS */
    $stmt->close(); /* CLOSE THE PREPARED STATEMENT */

    /* RETURN THIS DATA TO THE MAIN FILE */
    echo json_encode(array("jenis_buku" => $jenis_buku));

  } /* END OF IF NOT EMPTY loadnumber */

?>
