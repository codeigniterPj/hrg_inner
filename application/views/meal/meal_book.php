<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>内部订餐专用</title>
<base href="<?php echo base_url() ;?>"/> 
<base target="_self">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="./css/main.css"/>
	
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery-1.7.2.min.js"?>></script>
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.scrollTo.js"?>></script>
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.nav.js"?>></script>
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.quicksand.js"?>></script> 
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/easing.js"?>></script> 

  <script type="text/javascript">
  function Order_cancel(){
    var customer_name = document.getElementById("customer_name").value;
    if(customer_name==''){
     alert("请输入姓名！");
     return;
  }
  else {
     var data_name = "customer_name=" + customer_name;
    console.log(data_name);
    $.ajax({
      type:"POST",
      url: "/hrg_inner/index.php/meal/meal_book_cancel",
      cache: false,
      data: data_name,
      success:function(msg){
        alert(msg + "的订单已经删除成功！" + "\n" +"您可以重新下单了！");
      }
    });
   
  }
   clearOrder();
   WriteOrderInDiv();
  }
</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".navMenu").onePageNav();
			
	// Clone applications to get a second collection
	var $data = $(".portfolioItems").clone();
	
	//NOTE: Only filter on the main portfolio page, not on the subcategory pages
	$('.portfolioSort li a').click(function(e) {
		$(".portfolioSort li a").removeClass("activePSLink");	
		// Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
		var filterClass=$(this).attr('class').split(' ').slice(-1)[0];
		
		if (filterClass == 'all') {
			var $filteredData = $data.find('.portfolioItem');
		} else {
			var $filteredData = $data.find('.portfolioItem[data-type=' + filterClass + ']');
		}
		$(".portfolioItems").quicksand($filteredData, {
			duration: 800,
			easing: 'swing',
		});		
		$(this).addClass("activePSLink"); 			
		return false;
	});
	
		});
					function showfolio(number){
			$.ajax({
			type: 'POST',
			dataType:'html',
  url: "portfolio.php?id="+number,
  success: function(data) { 
  //alert(data);
  $(".portfolio-1").empty().append(data).slideDown();
}
			});}
function outhere(){
$(".portfolio-1").slideUp();}
</script>

  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/canvasjs.min.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/excanvas.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/canvasjs.js" ?>></script>

<link rel="stylesheet" type="text/css" href="./js/multiselectSrc/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="./js/multiselectSrc/jquery.multiselect.css"/>
<link rel="stylesheet" type="text/css" href="./js/assets/prettify.css" />
<link rel="stylesheet" type="text/css" href=<?php echo $this->config->item('base_url')."/js/assets/style.css"?> />

<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/jquery.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/ui/jquery.ui.core.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/ui/jquery.ui.widget.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/assets/prettify.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/multiselectSrc/jquery.multiselect.js" ?>></script>

<link href=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui.css"?> type="text/css" />
<link href=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui-timepicker-addon.css"?> type="text/css" />
<link href=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/demos.css"?> rel="stylesheet" type="text/css" />

<script src=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui.min.js"?> type="text/javascript"></script>
<script src=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui-timepicker-addon.js"?> type="text/javascript"></script>

<script type="text/javascript">
$(".navMenu_son").ready(function(){
  $category = $('.navMenu_son :hidden');
   $a = $("div:not(.navMenu_son)");
  if($category.is(':visible'))
  {  
   $a.on("mouseover",function(){
    $category.slideUp("slow");
  })
}
else{
  console.log("else");
  
    $(".parentarea").on("mouseover",function(){
    $category.slideDown("slow");
    })
    }
});

</script>

<script type="text/javascript">
  
</script>
<script type="text/javascript">
  function JudgeLogic(){
    var i = $("input[id^='Num']").length - 1;
    alert(i);  
      if (($("input[id^='Num']").val())<=0) {
      alert('又淘气啦，请重新输入数量!') ;
      $("input[id^='Num']").val("1");
    };
    };

</script>

<script type="text/javascript" charset="utf-8">
function init_customer(){
	var date = new Date();
	document.cookie="customer='';expires=" + date.toGMTString();
}

function init_InameArr(){
var date = new Date();
document.cookie="InameArr='';expires=" + date.toGMTString();
}
//var iname =  Array();
//计算总计
 function TotalCount()
 {
    var rowscount=document.getElementById("test").rows.length;
    var sum=0;
    for(var i=1;i<=(parseInt(rowscount)-1);i++)
    {
        var littecount=document.getElementById("test").rows[i].cells[4].innerText;
        sum=parseFloat(sum)+parseFloat(littecount);
    }
    document.getElementById("total").innerText=parseFloat(sum);
    if(parseFloat(sum)!=0)
    {

      document.getElementById("money").innerText=parseFloat(sum);
    }
 }
//计算单个小计
 function EveryCount()
 {  
    var index=window.event.srcElement.parentElement.parentElement.rowIndex;
    var test = document.getElementById("test");
    var a=document.getElementById("test").rows[index].cells[2].innerText;
    var b=document.getElementById("Num"+index).value;
    var c=parseFloat(a)*parseFloat(b);
    
    document.getElementById("test").rows[index].cells[4].innerText=c;
    TotalCount(); 
    updateOrderCookie();//修改cookies中保存的数量
 }

//Start--将订单数据写入div
function WriteOrderInDiv()
{
 var gwc="<table id='test' style='border:1px;'><tr><td style='display:none'>编号</td><td >商品名称</td><td>单价(￥)</td><td>数量</td><td>小计</td></tr>";
 var OrderString=unescape(ReadOrderForm('24_OrderForm'));//获取cookies中的购物车信息

 
 var strs= new Array(); //定义一个数组，用于存储购物车里的每一条信息
 var OneOrder="";
 
 strs=OrderString.split("|");//用|分割出购物车中的每个产品
 for (i=1;i<strs.length ;i++ )    
    {
  
 gwc+="<tr>";
  
  OneOrder=strs[i].split("&");

  gwc+="<td style='display:none'>";
  gwc+=OneOrder[0];
  console.log(OneOrder[0]);
  gwc+="</td>";

  for (a=1;a<OneOrder.length ;a++ )    
  {
  
   if(a!=3)
   {
    gwc+="<td >";
    gwc+=OneOrder[a];
    gwc+="</td>";
    
   }
   else
   {
    gwc+="<td id='dd' >";
    gwc+="<input   title='填写想购买的数量,请使用合法数字字符' style='width:20px;' id='Num"+i+"' type='text' onkeyup='EveryCount();'value='"+OneOrder[a]+"'>";
    gwc+="</td>";
   }
   
   
  }
  gwc+="<td >";
    gwc+=OneOrder[2]*OneOrder[3];
    gwc+="</td>";
   gwc+="</tr>";
        
    }
 
 gwc+="</table>";
  document.getElementById("Cart").innerHTML=gwc;
  TotalCount();
}
//End--将订单数据写入div
//Start--展开/收缩购物车
function show(id)
{
if (document.getElementById(id).style.display=="") 
{
document.getElementById(id).style.display='none';
}
else{document.getElementById(id).style.display='';
}

}
//展开/收缩购物车
//start从cookie中读出订单数据的函数
function ReadOrderForm(name)
{
    var cookieString=document.cookie;
    if (cookieString=="")
    {
        return false;
    }
    else
    {
        var firstChar,lastChar;
        firstChar=cookieString.indexOf(name);
        if(firstChar!=-1)
        {
            firstChar+=name.length+1;
            lastChar = cookieString.indexOf(';', firstChar);
            if(lastChar == -1) lastChar=cookieString.length;
            return cookieString.substring(firstChar,lastChar);
        }
        else
        {
            return false;
        }
    }    
}
//End
//Start添加商品至购物车的函数,参数(商品编号,商品名称，商品数量，商品单价)

//End
//Start修改数量后，更新cookie的函数
function updateOrderCookie()
{
 var rowscount=document.getElementById("test").rows.length;
   var item_detail="";
    for(var i=1;i<=(parseInt(rowscount)-1);i++)
    {
        item_detail+="|"+document.getElementById("test").rows[i].cells[0].innerText+"&"+document.getElementById("test").rows[i].cells[1].innerText+"&"+document.getElementById("test").rows[i].cells[2].innerText+"&"+document.getElementById("Num"+i).value;
      //  document.write(document.getElementById("test").rows(i).cells(1).innerText);
    }
   
 var Then = new Date();
    Then.setTime(Then.getTime()+60*60*1000);
 document.cookie="24_OrderForm="+escape(item_detail)+";expires=" + Then.toGMTString();
}
//End订单更新

//start订单提交时要更新订单信息，并组合成json数据
function updataOrderData_json()
{
  console.log("1");
  if(document.getElementById("money").innerText != '')
    var money = document.getElementById("money").innerText;
  console.log(money);
  var customer_name = document.getElementById("customer_name").value;
  console.log("3");
  var rowscount = document.getElementById("test").rows.length;
  console.log("3");
  var data_json = "";
  var restaurant_id = $("#project").multiselect("update");
    for (var i = 1; i <= (parseInt(rowscount) - 2) ; i++) 
    {
        data_json = data_json + "{"
        + '"item_no"' + ":" + "\"" + document.getElementById('test').rows[i].cells[0].innerText + "\"" + ","
        + '"item_name"' + ":" + "\"" + document.getElementById('test').rows[i].cells[1].innerText + "\"" + ","
        + '"item_price"' + ":" + "\""+ document.getElementById('test').rows[i].cells[2].innerText + "\"" + ","
        + '"item_amount"' + ":" + "\""+document.getElementById("Num"+ i).value +"\""+ ","
        + '"item_sum"' + ":" + "\""+ document.getElementById('test').rows[i].cells[4].innerText + "\"" + "}" + ",";
    }
    var i= (parseInt(rowscount) - 1);
    data_json = data_json + "{"
        + '"item_no"' + ":" + "\"" + document.getElementById('test').rows[i].cells[0].innerText + "\"" + ","
        + '"item_name"' + ":" + "\"" + document.getElementById('test').rows[i].cells[1].innerText + "\"" + ","
        + '"item_price"' + ":" + "\""+ document.getElementById('test').rows[i].cells[2].innerText + "\"" + ","
        + '"item_amount"' + ":" + "\""+document.getElementById("Num"+ i).value +"\""+ ","
        + '"item_sum"' + ":" + "\""+ document.getElementById('test').rows[i].cells[4].innerText + "\"" + "}" ;
    console.log("4");
    data_json = '{"orders":{' + '"restaurant_id"' + ":" + "\"" + restaurant_id + "\"" + "," + '"customer_name"' + ":" + "\"" + customer_name + "\"" + ","+ '"orders_info"' + ":" + "[" + data_json + "]" + "," + '"total"' + ":" + "\"" + money + "\"" + '}' + "}";
    console.log(data_json);
    return data_json;
}

//End<--

//清空购物车
function  clearOrder() 
{
var Then = new Date();
document.cookie="24_OrderForm='';expires=" + Then.toGMTString();
document.getElementById('money').innerText=0;
init_InameArr();
// iname="";
// iname = Array();
}
//End

</script>


<script type="text/javascript">


$(function () {
    $('#starttime').datetimepicker({
    dateFormat: "yy-mm-dd",
    timeFormat: ""
    });
});   

$(function () {
  $('#endtime').datetimepicker({
      dateFormat: "yy-mm-dd",
      timeFormat: ""
  });
}); 

$(function(){
$("#platform").multiselect({
   multiple: false,
   noneSelectedText: "==大区平台==", 
   //show: ["bounce", 200],
   //hide: ["explode", 1000], 
   selectedList: 1
  });
});

$(function(){
$("#project").multiselect({
   noneSelectedText: "==选择餐馆==",
   //show: ["bounce", 200],
   //hide: ["explode", 1000],
   multiple: false,
   selectedList: 1
  });
});

function showValues() {
   var checkSubmitFlg=false;
    if (!checkSubmitFlg) {
    // 第一次提交
    var platstr = $("#platform").multiselect("update");
    var usagestr = $("#project").multiselect("update");

    document.getElementById('inplatform').value = platstr;
    document.getElementById('inproject').value = usagestr;

    checkSubmitFlg = true;
    return true;
    } else {

    alert("请耐心等待……不要重复提交哦!");
    return false;
    }

}

</script>
 
<script type="text/javascript">
  
function SetOrderForm(item_no,item_name,item_amount,item_price)
{
    var cookieString=document.cookie;
    console.log(item_name);
    if (cookieString.length>=4000)
    {
        alert("您的订单已满\n请结束此次订单操作后添加新订单！");
    }
    else if(item_amount<1||item_amount.indexOf('.')!=-1)
    {
        alert("数量输入错误！");
    }
    else
    {
        var mer_list=ReadOrderForm('24_OrderForm');
        if(!(ReadOrderForm('InameArr')))//判断cookie中是否有InameArr以及InameArr的值，如果没有，初始化
        {
          init_InameArr();
          var InameArr = '';
        }
      else {
        InameArr = unescape(ReadOrderForm('InameArr')); //如果已存在，将InameArr的值取出来反解码成字符串
      }
        var Then = new Date();
        Then.setTime(Then.getTime()+60*60*1000);

        var item_detail="|"+item_no+"&"+item_name+"&"+item_price+"&"+item_amount;
        var itemname="|"+item_name;
        //alert(item_detail);
        var flag=false;


                //console.log(InameArr);
                if (InameArr==null) 
                { 
                    document.cookie="24_OrderForm=" + mer_list+escape(item_detail)+";expires=" + Then.toGMTString();
                    //alert("“"+item_name+"”\n"+"已经加入您的订单！");
                   // iname.push(item_name);
                    document.cookie="InameArr=" + escape(itemname) + ";expires=" + Then.toGMTString();
                    return; 
                }
                else 
                {
                  var Inamearr_split = new Array();     //新建一个数组InameArr_split用来存InameArr打开来的餐名
                  Inamearr_split=InameArr.split("|");
                  
                  for(var i = 0;i < Inamearr_split.length; i++) 
                  {
                    //console.log(Inamearr_split.length);
                      if(Inamearr_split[i] == item_name)  //对餐名进行遍历，如果新添加的餐名与InameArr_split里的重复，只改数量，不重新添加一条新纪录
                      {
                          insert_update(item_name);
                          flag=true;
                          break;
                      }                   
                  }
                        if(!flag)//添加一条新纪录，将餐名和记录都存进cookie
                        {  
                         // iname.push(item_name);
                          document.cookie="InameArr=" + escape(InameArr) + escape(itemname) + ";expires=" + Then.toGMTString();
                          document.cookie="24_OrderForm=" + mer_list + escape(item_detail) + ";expires=" + Then.toGMTString();
                         //alert("“"+item_name+"”\n"+"已经加入您的订单！");
                          return;
                        }
                        else return;
                }

        
    }
}


function insert_update(name)
{
    var testobj = document.getElementById("test");
    for (var i = testobj.rows.length - 1; i >= 0; i--) {
       if(testobj.rows[i].cells[1].innerText == name)
       {
              //console.log("come in");

              var iamount = document.getElementById("Num"+ i).value;
              iamount = parseFloat(iamount) + 1;
              //testobj.rows[i].cells[2].innerText = iamount;
              document.getElementById("Num"+ i).value = iamount;
              var count = parseFloat(iamount) * parseFloat(testobj.rows[i].cells[2].innerText);
              testobj.rows[i].cells[4].innerText = count;
              TotalCount();
              updateOrderCookie();//修改cookies中保存的数量
       }  
     }

}


</script>



  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/canvasjs.min.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/excanvas.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/canvasjs.js" ?>></script>

<!-- 级联js加载 -->
<script type="text/javascript" charset="utf-8">

     $(function() {

        $("select[name='platform']").change( function() {

        console.log("val: " + $(this).val());

        $.post("<?php echo site_url('operate/ajax_select/view')?>", {inplatform: $(this).val()},
          function(data){
             $("select[name='server'] option:gt(-500)").remove();
             $("select[name='server']").append(data);
             $("#server").multiselect('refresh');

          });
        });
    });

    function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }

</script>

<script type="text/javascript">
var flag = 0;

function book(name,value)
{
  //alert(name);
  //alert(value);
  var booklist = document.getElementById("booklist").innerHTML;
  var money = parseInt(document.getElementById("money").innerHTML);
  booklist = booklist + "," + name;
  if(flag == 0)
  {
    booklist=booklist.substr(1);
    flag = 1;
  }
  money = money + parseInt(value);
  document.getElementById("booklist").innerHTML = booklist;
  document.getElementById("money").innerHTML = money;
}
//保存用户的名字信息到cookie，设置为永久
function save_Customername(){
	var customer_name=document.getElementById("customer_name").value;
	var Then = new Date();
    Then.setTime(Then.getTime()+60*60*1000);

    if(!(ReadOrderForm('customer')))//判断cookie中是否有customer以及customer的值，如果没有，初始化
        {
	          init_customer();
	          var customer = '';
	          document.cookie="customer="+escape(customer_name)+";expires=" + Then.toGMTString();
        }
        else 
        {
		    var customer=ReadOrderForm('customer');
		 	document.cookie="customer="+customer+escape('|'+customer_name)+";expires=" + Then.toGMTString();
		 	console.log(customer);
 		}
}

function insert_customer(){
	if(!(ReadOrderForm('customer')))//判断cookie中是否有customer以及customer的值，如果没有，初始化
        {
	          
	          return;
        }
        else 
        {
		    var customer=unescape(ReadOrderForm('customer'));
		    var cusArr = new array();
		 	cusArr = customer.split("|");
		 	if(document.getElementById("customer_name").value!=null)
		 	{
		 		document.getElementById("customer_name").value = cusArr[0];
		 	}
		 	console.log(document.getElementById("customer_name").value);
 		}
}


function confirm()
{
  var c_name = document.getElementById("customer_name").value;
  if(c_name=='')
  {
    alert("请输入姓名！");
    return false;
  }
  else {
    document.getElementById('data_list').value = updataOrderData_json();
  var money = parseInt(document.getElementById("total").innerHTML);
  alert("你一共需要支付" + money + "人民币！" + "\n" + "\n" + "恭喜您，下单成功！" );
  //console.log(document.getElementById('data_list').value);
  save_Customername();
  }
  
}

</script>
<script type="text/javascript">
  $(document).ready(function(){
    TotalCount();
  });
</script>

<script type="text/javascript">
  $("#test:input").change
</script>


<base href="<?php echo base_url() ;?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
body {
  margin-left: 3px;
  margin-top: 0px;
  margin-right: 3px;
  margin-bottom: 0px;
}
a{
  text-decoration:none;
  color: #344b50;
}
.STYLE1 {
  color: #e1e2e3;
  font-size: 12px;
}
.STYLE1 a{
color:#fff;
}
.STYLE6 {color: #000000; font-size: 12;}
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
  color: #344b50;
  font-size: 12px;
}
.STYLE21 {
  font-size: 12px;
  color: #3b6375;
}
.STYLE22 {
  font-size: 16px;
  color: #295568;
}
.STYLE23 {
  font-size: 15px;
  color: #FF0000;
}
.picker
{
    height:16px;
    width:16px;
    background:url('sample-css/cal.gif') no-repeat;
    margin-left:-19px;
    cursor:pointer;
    border:none;      
}
#shopping_car{
  
  top:10px;
  right: 150px；
}
td{
  font-style: black;
  text-align: center;
}
/*  后加的高亮显示  */
 table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}
table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.navMenu_son{
  width: 60px;
  float: left;
  cursor: pointer;
}
.navMenu_son a{
  width:80px;
  margin-top: 10px;
  float: left;
  display: none;

}
.aboutUs-1{
  max-height: 
}
#rank_first{
  left: 100px;
  top:10px;
}
.home-21{
  width: 300px;
 
}
.home-21{

}
.home-21 p{
  font-family: "楷体";
  color: #10110E;
  font-size: 28px;
}
.home-21 span{
  font-family: "叶根友毛笔行书2.0版";
  font-size: 35px;
  text-decoration: underline;
  color: #C8585B;
}
</style>
</head>
<body>

	<div id="home">
		<div class="container">
			<div class="header">
				<div class="headerTop">
					<div class="headerTop-1 clearfix">
						<div class="headerLeft clearfix">
							<h1><a href="<?php echo site_url('/meal/meal_book') ?>">&nbsp;</a></h1>
							<p>大火溶内部网站</p>
						</div>
						
					</div>
				</div>
				<div class="headerBottom">
					<div class="headerBottom-1 clearfix">
						<ul class="navMenu clearfix">
							<li><a href="<?php echo site_url('/meal/meal_book') ?>">Home</a></li>
							<li><div class="navMenu_son"><span class="parentarea">查看订单</span>
                      
                      <a href="<?php echo site_url('/meal/meal_check_restaurant') ?>">查询餐馆订单</a>
                      <a href="<?php echo site_url('/meal/meal_check_person') ?>">查询个人订单</a>
                      
                  </div></li>
							<li><a href="<?php echo site_url('/meal/meal_rank/')?>">土豪榜</a></li>  
							
						</ul></div>
						<div class="info clearfix">
							<div  width="300px" id="shopping_car">
							  <div id="Cart" style="line-height: 24px; font-size: 12px; background-color: #f0f0f0;
							            border-top: 1px #ffffff solid；display:none; ">
							  </div>
							  <div id="Info">
							            总计：<strong><span id="total" style="color: #FF0000; font-size: 36px ; height: 10px;
							  width: 10px;">0</span></strong>元
							   <input type="button" value="清空" onclick="clearOrder();WriteOrderInDiv();" />
							   <input type="button" value="展开/收缩" onclick="show('Cart')" />
							  </div>
							  
							</div>
              <div  width="300px" id="rank_first">
                <div class="home-21">
                  <p>订餐信息从8月25号开始记录，土豪榜是8月27号建立，以后每天累计，第一天是土豪榜榜首是<span>彭潇崧</span>，请大家膜拜！</p>
                </div>
                
              </div>
						</div>
					</div>
					<div class="menuBottom"></div>
				</div>
			</div>
			<div class="content">
				<div class="home-1">
       
        <div class="aboutUs-1 clearfix">
          <div class="aboutUs-left"><br/><br/><br/><br/>
            <p class="aboutPara1">
              <span>为了方便大家订餐，我们开发了这个功能</span><br /><br />

              目前已经录入鲜粥道、黄焖鸡、木桶饭的菜单，并加入了饭馆订单查询和个人订单查询，方便大家查看。订单排行榜由于现在数据量较少，暂时不做，留待以后完善。
            </p>
            <h2>
              <span>订餐时间：</span>每天的11:00--11:40。
            </h2>
            <div class="aboutUs-readMore clearfix">
              <img src="images/aboutUsImage.jpg" alt="image" />
              <div>
                <p>
                  请大家务必输入自己的真名，并且不要重复订餐，谢谢合作！
                </p><br/><br/>
               
              </div>
            </div>
          </div>
          <div class="aboutUs-right-mealbook">
            <h2>Our <span>Choice</span></h2>
            <div class="teamMember">
              <div class="teamMember1">
                
                <h3>鲜粥道</h3>
                <p class="memberRole">国顺路126号（近政本路） <span>150-2123-5595</span></p>
            
              </div>
              <div class="teamMember2">
                
              </div>
            </div>
          <div class="teamMember">
              <div class="teamMember1">
                
                <h3>木桶饭</h3>
                <p class="memberRole">政本路173号-12 <span>130-0416-6398</span></p>
              
              </div>
              <div class="teamMember2">
                
              </div>
            </div>
          </div>
</script>
    </div><!-- ABOUT US SECTION END -->
        </div>
				<div class="home-3">
					<div class="home-3-center">
						<div><br/><br/><br/><br/>
                  <form method="post"  name = "form" action="<?php echo site_url('meal/meal_book_confirm/')?>">
                    <h1 id = "booklist"></h1>
                    <table>
                    <tr>
                    <td class = "STYLE22">总价</td> <td class = "STYLE22"><p id = "money" style="color:#FF0000">0</p> <td class = "STYLE22">元
                    </tr>
                    </table>
                    <p class = "STYLE22" type="text" id"input" name="article">
                    您的大名：
                    <input  class = "STYLE22" type="text" id="customer_name" name="customer_name" value="<?php if(!empty($m_name)) echo $m_name; ?>"> </input>
                    <input type="hidden" name="data_list" id="data_list" value=""></input>
                    <input  class = "STYLE22" type="submit" id"submitinput" name="submit_article" value="确认订餐" onclick="confirm()">
                    <a href="javascript:void(1)" onclick="Order_cancel();" class="button2">取消订单</a>
                    </p>
                </form>
                 <br/><br/><br/>
							<form method="post"  name = "form1" id="form1" action="<?php echo site_url('meal/meal_book_ok/')?>">
							 <p class = "STYLE22">请筛选数据:&nbsp;&nbsp;&nbsp;
							  <?php echo $project?>

							  <input  class = "STYLE22" type="submit" id"submitinput" name="submit_article" value="查询" onclick="showValues()"> </input>
							  <input type="hidden" name="inplatform" id="inplatform" value="">
							  <input type="hidden" name="inproject" id="inproject" value="">
							  </p><br/>
               </form>
							   <p>
								请您点完餐后，填写上您的大名，确认购物车的订单后，提交订餐！
							</p>
						</div>
						
					</div>
				</div>
				<div class="home-4 clearfix">
						    <?php if(!empty($menudata)):
						    foreach ($menudata as $row):
						    foreach ($row as $menutype => $menucontent):?>
							<div>
						    <br/><br/><br/><br/><p><?php echo $menutype;?></p>
						    <table width="70%" border="<?php echo $border ?>" class="hovertable" id='total'>

						     <?php foreach($menucontent as $key => $value):
						     $name_price = explode(",", $value);
						     $name = $name_price[0];
						     $price = $name_price[1];
						     ?>

						    <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
						      <td ><div align="center"><span class="STYLE10"><?php echo $key?></span></div></td>
						      <td ><div align="center"><span class="STYLE10"><?php echo $name?></span></div></td>
						      <td ><div align="center"><span class="STYLE10"><?php echo $price . "元"?></span></div></td>
						      <td ><div align="center"><span class="STYLE10"><a value="<?php echo $key?>" name = "<?php echo $name?>" id = "<?php echo $price ?>" style="color:#FF0000" href="javascript:void(0)" onclick="SetOrderForm('<?php echo $key?>',this.name,'1',this.id);WriteOrderInDiv();">点击订我</a></span></div></td>
						     </tr>
						    <?php endforeach; ?>
						    </table>
						    <?php endforeach; ?>
						    <?php endforeach; ?>
						    <?php endif;?>
						    </div>

					</div>
				</div>
			</div>
		</div><!-- HOME SECTION END -->
	</div>
  </div>
    <script>
    window.WriteOrderInDiv();
    window.insert_customer();
    </script>
  <div id="footer">
    <div align="center">
      <p>Copyright &copy; 2012-2014 &nbsp;.&nbsp;HRG All rights reserved.</p>
    </div>
  </div>
  <script type="text/javascript">
    window.WriteOrderInDiv();
    window.insert_customer();
    </script>

</body>
</html>
