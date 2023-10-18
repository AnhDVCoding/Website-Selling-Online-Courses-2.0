<?php
	header("Content-type: text/css");
?>
#users {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#users td, #users th {
  border: 1px solid #ddd;
  padding: 8px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: orange;
  color: white;
}

  .box1{
    <!-- position: relative; -->
    width: auto;
    border: 1px;
    margin: 0 200px;
    height: auto;
    background: white;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
  }
<!--   .users{
      overflow = "scroll";
    white-space = "normal";
  } -->
  .box2{
    <!-- display: flex; -->
    <!-- position: absolute; -->
    width: 100%;
    height: 500px;
    box-sizing: border-box;

    margin: 0 2%;

<!--     left: 0;
    right: 0; -->

  }

  .box3{
    width: 400px;
    height: 100px;
    box-sizing: border-box;

    border-radius: 10px;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    

    <!-- position: relative; -->

  }

  .content{
    padding: 10px;
  }

  .list_user_item{
    overflow-wrap: anywhere;
        overflow: scroll;
        overflow-x: hidden;
        <!-- height: 100%; -->
        width: 100%;
  }

  #scroll::-webkit-scrollbar {
      width: 10px;
      background-color: #F5F5F5;
      box-shadow: inset 0 0 5px grey; 
      border-radius: 10px;
  } 

  #scroll::-webkit-scrollbar-thumb {
    background: gray; 
    border-radius: 10px;
    }

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}