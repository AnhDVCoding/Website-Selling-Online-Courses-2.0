<?php
	header("Content-type: text/css");
?>
	
	/*---------------------------------------------------------------*/

	img{
		width: 250px;
		height: 150px;
		border-radius: 20px;
	}
	#box {
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
		justify-content: center;
	}

	.justify-content{
		justify-content: center;
	}

	#item{
		margin: 50px 25px;
		padding: 15px;
		border-radius: 20px;
		border: solid lightgray 1px;
	}
	#item-infor{
		margin: 50px 25px;
		padding: 15px;
		border-radius: 20px;
		border: solid lightgray 1px;
		width: 50%;
		background-color: #fcf0e1;
		box-shadow: 0px 0px 60px -5px #f68c31;
	}

	#box div a{
		text-decoration: none;
		font-family: arial;
		font-size: 20px;
		font-weight: bold;
		color: black;
		text-align: center;
	}
	#box div #box-content{
		text-decoration: none;
		font-family: arial;
		font-size: 20px;
	}
	.center{
		text-align: center;
		margin-top: 30px;
	}
	#box div #avatar{
		width: 135px;
		height: 135px;
		border-radius: 50%;
		border: 0.1px solid black;
	}
	#box div #box-avatar #infor{
		font-weight: 700;
	}
	#box div #mk{
		display: flex;
		justify-content: space-between;
		margin: 15px 19%;
	}
	#box div #mk text{
		height: 20px;
	}
	.p-infor{
		width: 70px;
		text-align: left;
	}
	.p-infor-width{
		width: 191px;
	}
	#box div img{
		object-fit: cover;
	}
	#box div #name{
		font-weight: bold;
		color: black;
		text-align: center;
		font-size: 25px;
	}
	#box div #infor{
		color: black;
		margin: 20px ;
	}
	input[type=submit] {
		background-color: #04AA6D;
		color: white;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}
	.submit-all{
		padding: 12px 20px;
	}
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