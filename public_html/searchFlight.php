<?php
  require('../resources/config.php');
  include(databaza);
 session_start();
 if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
    header("Location: llogin.php");
  }

 $css_includes=Array("../css/index.css","../css/style.css","//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic","//fonts.googleapis.com/css?family=Montserrat:400,700");

 include(header_user);
?>
    <div class="container">
        <h1>Rezervimi i Biletes se Fluturimit</h1>
        <div class="main-agileinfo">
            <div class="sap_tabs">
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item"><span>Dy kaheshe</span></li>
                        <li class="resp-tab-item"><span>Nje kaheshe</span></li>
                        
                    </ul>
                    <div class="clearfix"> </div>
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content roundtrip">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                <div class="from">
                                    <h3>Prej</h3>
                                    <input type="text" name="origin" class="city1" id="city1" placeholder="Shkruaj qytetin e nisjes" required="">
                                    <span id="suggestions"><span>
                                </div>
                                <div class="to">
                                    <h3>Destinacioni</h3>
                                    <input type="text" name="destination" class="city2" id="city2" placeholder="Shkruaj qytetin e destinacionit" required="">
                                    <span id="suggestions2"></span>
                                </div>
                                <div class="clear">
                                </div>

                                <div class="date">
                                    <div class="depart">
                                        <h3>Nisja</h3>
                                        <input id="datepicker" name="date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                        <span class="checkbox1">
										<label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Fleksibil me daten</label>
									</span>
                                    </div>
                                    <div class="return">
                                        <h3>Kthimi</h3>
                                        <input id="datepicker1" name="Text" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                        <span class="checkbox1">
										<label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Fleksibil me daten</label>
									</span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="class">
                                    <h3>Klasi</h3>
                                    <select id="w3_country1" onchange="change_country(this.value)" class="frm-field required">
                                        <option value="null">Economy</option>
                                        <option value="null">Premium Economy</option>
                                        <option value="null">Business</option>
                                        <option value="null">First class</option>
                                    </select>

                                </div>
                                <div class="clear"></div>
                                <div class="numofppl">

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>

                                <input type="submit" name="searchFlight" value="Search Flights" id="searchFlight">
                            </form>
                        </div>
                        <div class="tab-1 resp-tab-content oneway">
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                <div class="from">
                                    <h3>Prej</h3>
                                    <input type="text" name="origin" class="city1"  id="city11" placeholder="Type Departure City" required="">
                                    <span id="suggestions"><span>
                                </div>
                                <div class="to">
                                    <h3>Destinacioni</h3>
                                    <input type="text" name="destination" class="city2" id="city22" placeholder="Type Destination City" required="">
                                </div>
                                <div class="clear"></div>
                                <div class="date">
                                    <div class="depart">
                                        <h3>Nisja</h3>
                                        <input class="date" id="datepicker2" name="date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                        <span class="checkbox1">
										<label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Fleksibil me daten</label>
									</span>
                                    </div>
                                </div>
                                <div class="class">
                                    <h3>Class</h3>
                                    <select id="w3_country1" onchange="change_country(this.value)" class="frm-field required">
                                        <option value="null">Economy</option>
                                        <option value="null">Premium Economy</option>
                                        <option value="null">Business</option>
                                        <option value="null">First class</option>
                                    </select>

                                </div>
                                <div class="clear"></div>
                                <div class="numofppl">

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                                <input type="submit"  value="Search Flights" id="searchFlight">
                            </form>

                        </div>
                       

                    </div>
                </div>
            </div>

        </div>
        
        <div style="color:orange;width:50%;margin:auto" id="tabela1">
        <div style="position:relative;left:30%;font-size:30px;">5 fluturimet e Ardhshme</div>
            <form method='GET'>
                <input type='hidden' id='udhetimiId' name='udhetimiId'>
                <table class='tabela' cellspacing='0' style="align-items:center;">
                    <thead>
                        <th style="align:left">Prej</th>
                        <th style="align:left">Deri</th>
                        <th style="align:left">Data</th>
                        <th style="align:left">Data e Kthimit</td>
                        <th style="align:left">Qmimi</th>
                    </thead>
                    <?php 
				$db=new database();
                $rez = $db->getData("Select * From flights Where flight_date >= Now() order by flight_date Limit 5");

                foreach ($rez as $rreshti) {
                    echo "<tr><td>".$rreshti['origin']."</td><td>".$rreshti['destination']."</td><td>".$rreshti['flight_date']."</td><td>.".$rreshti['flight_return'].".<td>".$rreshti['Qmimi']."</td> <td style='text-align: center'>"                       
                    . "<input type='submit' formaction='payment.php' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['id']."'></td><td><input type='hidden' name='id' value=\"".$rreshti['id']."\"> </tr>";
                }
                ?>
                </table>
            </form>
        </div>
        <br/>
        <div style="color:orange;width:50%;margin:auto;display:block	;" id="tabela2">
            <div style="position:relative;left:30%;font-size:30px;">Fluturimet e Kerkuara</div>
         <form method="GET">
               <table class='tabela' cellspacing='0' style="align-items:center;">
                    <thead>
                        <th style="align:left">Prej</th>
                        <th style="align:left">Deri</th>
                        <th style="align:left">Data</th>
                        <th style="align:left">Data e Kthimit</th>
                        <th style="align:left">Qmimi</th>
                    </thead>
                    <?php 

		require("../resources/config.php");

		include_once(databaza);

		$db=new database();

		global $array;

		if($_SERVER['REQUEST_METHOD']=="POST")
		{
		  if($_POST['origin']==""||
			$_POST['destination']==""||
			 $_POST['date']==""){

				   echo 'Sheno te dhenat';
			 }
			else
		  {
			  $origin=$_POST['origin'];
			  $destination=$_POST['destination'];
				$date=$_POST['date'];
			  $date=date('Y-m-d',strtotime($_POST['date']));

			  $query="SELECT * FROM flights where origin=%s AND destination=%s AND flight_date=%s";
            
	           $array=$db->getData($query,$origin,$destination,$date);
				if (is_array($array) || is_object($array))
				{

				foreach ($array as $key=>$rreshti) {
                    echo "<tr><td>".$rreshti['origin']."</td><td>".$rreshti['destination']."</td><td>".$rreshti['flight_date']."</td><td>".$rreshti['flight_return']."</td><td>".$rreshti['Qmimi']."</td><td style='text-align: center'>"                       
                    . "<input type='submit' formaction='payment.php' name='paySubmit'  value='Rezervo' name class='button button-small id-submit' ></td><td><input type='hidden' name='id' value=\"".$rreshti['id']."\"> </tr>";
					
				}

			}
		}

	}
		?>
                </table>
         </form>
		<div>
            <a href="download.php?file=userTicket.txt">Shkarko te dhenat rreth biletes:</a>
		</div>			
		<div class="row text-white">
                    <div class="col-12">
                    <form method="POST" action="functions.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email addresa</label>
                            <input required type="email" name="email_to" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Emri juaj</label>
                            <input required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subjekti</label>
                            <input required type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Enter subject">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Pershkrimi</label>
                            <textarea  required rows="10" class="form-control" id="exampleInputPassword1" name="content" placeholder="Write the content here"></textarea>
                        </div>
                        <button type="submit" name="send_email" class="btn btn-warning text-white">Submit</button>
                        </form>
                    </div>   
                </div>
            </div>				
        </div>
        <div class="footer-w3l">
            <p class="agileinfo"> &copy; 2021 Rezervimi i Biletave . All Rights Reserved</p>
        </div>
        </div>

        <!--script for portfolio-->
        <script src="../js/jquery.min.js">
        </script>
        <script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true // 100% fit in a container
                });
            });
        </script>
        <!--//script for portfolio-->
        <!-- Calendar -->
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <script src="../js/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
            });
            document.getElementById('searchFlight').addEventListener('click', showtable);

            function showtable() {

                document.getElementById("tabela2").style.display = "block";
				document.getElementById("tabela1").style.display = "none";

            }
        </script>
        <!-- //Calendar -->
        <!--quantity-->

        <script>
            $('.value-plus').on('click', function() {
                var divUpd = $(this).parent().find('.value'),
                    newVal = parseInt(divUpd.text(), 10) + 1;
                divUpd.text(newVal);
            });

            $('.value-minus').on('click', function() {
                var divUpd = $(this).parent().find('.value'),
                    newVal = parseInt(divUpd.text(), 10) - 1;
                if (newVal >= 1) divUpd.text(newVal);
            });
        </script>
        <!--//quantity-->
        <!--load more-->
        <script>
            $(document).ready(function() {
                size_li = $("#myList li").size();
                x = 1;
                $('#myList li:lt(' + x + ')').show();
                $('#loadMore').click(function() {
                    x = (x + 1 <= size_li) ? x + 1 : size_li;
                    $('#myList li:lt(' + x + ')').show();
                });
                $('#showLess').click(function() {
                    x = (x - 1 < 0) ? 1 : x - 1;
                    $('#myList li').not(':lt(' + x + ')').hide();
                });
                $('#city1').keyup(function()
             {
                 var query=$(this).val();
                 console.log(query);
                 if(query!='')
                 {
                     $.ajax({
                         url:"search.php",
                         method:"POST",
                         data:{query:query},
                         success:function(data){
                             $('#suggestions').fadeIn();
                             $('#suggestions').html(data);
                         }
                     })
                 }
               
                });
                $('#city2').keydown(function()
                 {
                     var $query1=$('#city1').val();
                     console.log($query1);
                     $.ajax({
                         url:"search.php",
                         method:"POST",
                         data:{query1:$query1},
                         success:function(data){
                             $('#suggestions2').fadeIn();
                             $('#suggestions2').html(data);
                         }
                     })
                     
                 })
                $(document).on('click','li.origin',function()
                {
                    $('#city1').val($(this).text());
                    $("#suggestions").fadeOut();
                });
                $(document).on('click','li.destination',function()
                {
                    $('#city2').val($(this).text());
                    $("#suggestions2").fadeOut();
                });

                $('#city11').keyup(function()
             {
                 var query=$(this).val();
                 console.log(query);
                 if(query!='')
                 {
                     $.ajax({
                         url:"search.php",
                         method:"POST",
                         data:{query:query},
                         success:function(data){
                             $('#suggestions1').fadeIn();
                             $('#suggestions1').html(data);
                         }
                     })
                 }
                    
                });
                $(document).on('click','li',function()
                {
                    $('#city11').val($(this).text());
                    $("#suggestions1").fadeOut();
                });
            });
        </script>
         <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>

        <!-- //load-more -->

    </body>

    </html>