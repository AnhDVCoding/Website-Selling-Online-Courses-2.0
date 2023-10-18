<?php
	header("Content-type: text/css");
?>




  .box1{
    <!-- position: relative; -->
    width: auto;
    border: 1px;
    margin: 0 300px;
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
    
    box-sizing: border-box;

    margin: 0 2%;

<!--     left: 0;
    right: 0; -->

  }

  .box3{
    width: 100%;
    height: 100%;
    <!-- position: relative; -->

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