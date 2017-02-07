<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
		<style type="text/css">
.you {
	position: relative;
	left: 60px;
}

.wid{
	position: relative;
	left: 30px;
}

.xia2{
	position: relative;
	top: 18px;
}

.xia1{
	position: relative;
	top: 25px;
}

#out{
	position: relative;
	left: 210px;
}

.location{
	position: absolute;
	left:760px;
	top: 140px;
	float:right top;

}
.ziti{
	text-align:justify;
	
}

</style>
	<script  type="text/javascript">

	function checkcard(){
		if(document.card.cno.value==""){
			alert('Please input the information of the library card!');
			return false;
		}
		else{
			alert('Operation successfully completed!');
			return true;
		}	
	}
		


	</script>
	
  </head>
  <body background="images/bg4.jpg">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="navbar navbar-inverse">
            <div class="navbar-inner">
              <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="nav-collapse collapse">
                  <ul class="nav">
                    <li>
                      <a href="home.html">
                        Home
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
                    <li>
                      <a href="search.php">
                        Search
                        <span class="navbar-unread">1</span>
						</a>
                    </li>
					<li class="active">
                      <a href="operate.php">
                        Librarian Menu
                      </a>
                      <ul>
                        <li>
						<a href="#">Books Operate</a>
						<ul>
							<li><a href="adminsearch.php">Search Books</a></li>
							<li><a href="store.php">Store Books</a></li>
							<li><a href="borrow.php">Borrow/Return Books</a></li>
						</ul>
						</li>
						<li><a href="operate.php">Library Card Operate</a>
						</li>
                      </ul> <!-- /Sub menu -->
                    </li>
					<li>
                      <a href="http://libweb.zju.edu.cn/libweb">
                        ZJU Library
                        <span class="navbar-unread">1</span>
						</a>
                    </li>
                    <li>
                      <a href="#">
                        Help
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
					<li id="out">
                      <a href="adminloginout.php">
                        Login Out
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /row -->
	 
		
		<div>
		
		<?php
			session_start();
			
			
			echo "<h3>&nbsp;&nbsp;&nbsp;&nbsp; Welcome to My Library!</h3>";
		
		?>
		
		</div>
		 <br/>
		<div>
		<img src="book/1.jpg"/>
		<div>
		
		<div class="location">
		<h4><strong>&nbsp;&nbsp;&nbsp;&nbsp;国家图书馆</strong></h4>
		<marquee direction="up" loop="-1" behavior="slide" dataformatas="html"  height="300px" width="340px" scrollamount="1px" >
		<div class="ziti">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;中国国家图书馆是中国的最大的图书馆。中国国家图书馆旧称北京图书馆，一般简称“国图”。1987年落成的白石桥新馆（现称总馆南区）建筑面积14万平方米，裙楼分布在主楼两侧，并形成两个面积甚大的天井，天井内为花园，形成楼中有园的独特景致，裙楼地上5层地下1层，分布着图书馆的各个功能单元。设有各具特色的阅览室46个，其中开架阅览室23个，日均可接待读者六、七千人次。该建筑还曾被评为“八十年代北京十大建筑”榜首。（2011年起闭馆维修改造，2014年初改造完成后重新开馆）</p> 
<p>&nbsp;&nbsp;&nbsp;&nbsp;总馆南区包括北海公园附近的文津街分馆，馆舍面积共17万平方米。2008年9月9日二期馆舍（现称总馆北区）建成并投入使用，国家图书馆建筑总面积增至25万平方米。[2] 国家图书馆每年大约要接待海内外读者400多万人次。</p>

</div>
		</marquee>
		</div>
		
		<br/>
		<div class="row">
		<h4><strong>&nbsp;&nbsp;&nbsp;&nbsp;Library Card Operation</strong></h4>
		<br/>
		<fieldset>
		<form name="card" action="insert.php" method="post" onSubmit="return checkcard();">
			<div class="span2">
			<label for="text">Cno:</label>
				<input type="text" value="" name="cno" id="cno" class="span2"/>
			</div>
			<div class="span2">
			 <label for="text">Name:</label>
				<input type="text" value="" name="name" id="name" class="span2"/>
			</div>	
			<div class="span2">
			<label for="text">Department:</label>
				<input type="text" value="" name="department" id="department" class="span2"/>
			</div>
			<div class="span2">
			<label for="select">Type:</label>
			<select class="span2" tabindex="1" name="type" id="type">
				<option value="T" selected="selected">T</option>
				<option value="G">G</option>
				<option value="G">U</option>
				<option value="G">O</option>
			</select>
			</div>
			<div class="span1 xia2">
			<input type="radio" name="docard" id="docard" checked="checked" value="add" />add<br/>
			<input type="radio" name="docard" id="docard" value="delete" />delete
			</div>
			<div class="span2 xia1">
				<input type="submit" value="DO" class="span2 btn btn-info">
			</div>
		</form>
		</fieldset>
		</div>

  </body>
</html>
