<?php
	header("Content-type: text/css");
?>

	.box1{
		width: auto;
		border: 1px;
		margin: 0 50px;
		height: auto;
		background: white;
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
	}

	.box2{
		display: flex;
		width: auto;
		min-height: 100px;

		margin: 0 2%;
	}

	.box3{
		width: auto;
		min-height: 100px;
		text-align: center;

	}

	.title{
		width: auto;
		min-height: 50px;
		background: #3198ea;
		border-radius: 10px;
		margin-bottom: 10px;
		text-align: center;
		color: white;
		font-size: 20px;
		font-weight: bold;
		
	}

	#video{
		min-width: 65px;
		width: 65%;
		min-height: 200px;

	}

	#list_bai_tap{
		min-width: 35px;
		width: 30%;
		height: auto;
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
		border-radius: 10px;
		margin-left: 5%;
	}

	.list_bai_tap_item{
		overflow-wrap: anywhere;
        overflow: scroll;
        overflow-x: hidden;
        height: auto;
	}

	#list_bai_tap ul{
		padding: 0;
		height: 450px;
	}

	#list_bai_tap ul li{
		display: block;
		list-style-type: none;
		border: 1px solid;
		border-radius: 5px;
		width: 100%;
		min-height: 60px;

		padding-right: 0px;

	}

	#list_bai_tap ul li:hover{
		background: yellow;
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



  	#listBH{
  		text-decoration: none;
  		color: #575757;
  		width: 100%;
  		padding: 20px 0;

  	}

  	#button {
  		float: right;
  		margin-right: 5px;
  		padding: 10px;
	    background: orange;
	    border-radius: 10px;
	    text-decoration: none;
	    color: white;
	    font-weight: bold;
  	}

  	#tenBaiHoc{
  		font-size: 20px;
  	}