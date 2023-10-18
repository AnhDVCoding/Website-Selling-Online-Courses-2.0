<?php
	header("Content-type: text/css");
?>
	
	/*---------------------------------------------------------------*/

	img{
		width: 40px;
		height: 40px;
		border-radius: 50%;
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

	#item-box{
		border: solid lightgray 1px;
		width: 100%;
		background-color: #fcf0e1;
		box-shadow: 0px 0px 60px -5px #f68c31;
	}
	#item-box-header{
		text-align: center;
		font-size: 40px;
		margin-top: 10px;
		color: #897754;
	}
	#item-hoi-dap{
		margin: 20px;
		padding: 15px;
		border: solid lightgray 1px;
		min-height: 500px;
		background-color: #fff9f2;
		box-shadow: 0px 0px 60px -5px #f68c31;
	}
	#dat-cau-hoi{
		display: flex;
		margin: 20px;
	}
	#dat-cau-hoi-left{
		width: 140px;
		text-align: center;
	}
	#dat-cau-hoi-right{
		display: flex;
		width: 120px;
		text-align: center;
	}
	#form-dang{
		display: flex;
		align-items: center;
	}
	#dat-cau-hoi-right textarea{
		height: 70px;
		width: 750px;
		margin: 0px 20px 0px 0px;
	}
	#dat-cau-hoi-right input{
		height: 40px; 
	}
	#list-cau-hoi{
		margin: 30px 20px;
	}
	#cau-hoi{
		display: flex;
	}
	#cau-hoi-right{
		display: flex;
    	text-align: center;
	}
	#noi-dung-cau-hoi{
		display: flex;
		width: 800px;
		background-color: white;
		text-align: center;
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