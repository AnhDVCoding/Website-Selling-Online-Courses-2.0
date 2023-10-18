<?php
	header("Content-type: text/css");
?>
	*{
		font-family: arial;
		font-size: 15px;
		margin: 0;
	}

	ul {
		padding-inline-start: 0px;
	}

	li {
    	width: 160px;
	}

	.banner {
  		padding: 20px;
  		text-align: center;
  		background-color: lightblue;
  		font-size: 30px;
  		color: black;
  	}
  	/*---------------------------------------------------------------*/
	#menu-ngang{
		display: flex;
		justify-content: space-between;
    	background: orange;
    	font-weight: bold;
    	font-size: 50px;
	}

	#menu-ngang ul{
    	display: flex;
    	list-style: none;
	}

	#menu-ngang-right{
		float: right;
    	list-style: none;
	}

	#menu-ngang> ul li a{
    	padding: 18px;
    	line-height: 50px;
    	color: white;
   		text-decoration: none;
   		
	}

	#menu-ngang ul li:hover{ /*Khi di chuột vào sẽ đổi màu*/
    	background: #b36c22;
	}

	#menu-ngang ul li ul{ /*ẩn thanh menu thả xuống*/
   		display: none;
    	position: absolute;
	}

	#menu-ngang li>ul li{ /*Chỉnh sửa*/
    	border: none;
    	border-bottom: 1px solid #ccc;
    	background: orange;
    	text-align: center;
	}

	#menu-ngang  li:hover > ul{ /*Khi di chuột vào thì sẽ hiện ra thanh menu dropdown*/
    	display:  block;
	}


	#test{
		position: relative;
		left: 0;
		top: 0;
	}

	
	/*---------------------------------------------------------------*/

	#imgthumbnail{
		width: 250px;
		height: 150px;
		border-radius: 20px;
	}
	#box {
    	display: flex;
    	flex-direction: row;
    	justify-content: center;
    	flex-wrap: wrap;
    	justify-content: flex-start;
	}

	#item{
		margin: 50px 25px;
		padding: 15px;
		border-radius: 20px;
		border: solid lightgray 1px;
		
	}
	#box div a{
		text-decoration: none;
		font-family: arial;
		font-size: 20px;
		font-weight: bold;
		color: black;
		text-align: center;

	}
	.button {
  		border: none;
  		outline: 0;
  		display: inline-block;
  		padding: 8px;
  		color: white;
  		background-color: lightblue;
  		text-align: center;
  		cursor: pointer;
  		width: 100%;
  		border-radius: 5px;
	}

	.button:hover {
  		background-color: blue;
	}
	/*---------------------------------------------------------------*/
	#title{
		font-size: 20px;
		font-weight: bold;
		padding-left: 10%;
		padding-top: 20px;
	}

	.footer{
		width: 100%;
		background-color: orange;
		display: flex;
		color: white;
	}
	.footer-left{
		margin-left: 5%;
		margin-top: 20px;
		width: 50%;
		height: 100%;
	}
	.footer-middle{
		margin-left: 5%;
		margin-top: 20px;
		width: 25%;
		height: 100%;
		text-align: center;
	}
	.footer-middle a{
		color: #b36c22;
		text-decoration: none;
	}
	.footer-right{
		margin-left: 10%;
		margin-top: 20px;
		width: 25%;
		height: 100%;

	}
	#icon{
		font-size: 40px;
	}

