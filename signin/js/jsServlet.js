﻿$(function(){

		var timer;
	
		/*点击登录按钮，执行Ajax 发送和接收数据*/
	$("#login-button").click(function(){
			
			// clearInterval(timer1);
			// clearInterval(timer2);
			// clearInterval(timer3);

			var formInfo = $("form").serializeArray();			
			

			
			$.ajax({		
			 	type:"GET",
			 	async:false,
			 	url:'signin.php',
			 	data:formInfo,
			 	dataType:"jsonp",
			 	jsonp:"callback",
			 	success: function(json){

			 		var id = json.id;
					if(id!="000000")
					{
						var name = json.name;
						var status = json.status;
						var direction = json.direction;						
						
						alert("签到成功，请等待");

						document.getElementById("id").value = "";
						document.getElementById("userName").value = "";

						dataFlag = true;

						main_1(id, name, status, direction, dataFlag);

					}else{
						var test = json.test;
						alert(test);
					}


			 	},
			 	error:function(){
			 		alert('login fail');
			 	}
			 
			});
		
	});

	 //删除左右两端的空格 
	function trim(str){
		return str.replace(/(^\s*)|(\s*$)/g, ""); 
	} 
	

	
	//	方式二 ------注意 7,8,9行的代码，当把setInterval()打开的时候，将这三行代码也去掉注释
		
		function refresh1(){
			 $.getJSON('info.php',{"status":"4"}, function(json){

		 			// console.log(json.id + json.name);	
                      $.each(json, function(index, item){

				 		
				 		var dbId = item.id;
				 		var dbSta = item.status;
				 		var dbName = item.name;				 		
				 		var dbDir = item.direction;
				 		
				 		console.log(dbSta+ "和" + dbId + "和" + dbName + "和" + dbDir);
				 		if( dbId!='**')
				 		changeStatus(dbSta, dbName, dbId, dbDir);
				 	})
                     
            });
			
		}


		function refresh2(){
			 $.getJSON('info.php',{"status":"7"}, function(json){

		 			$.each(json, function(index, item){
				 		
				 		var dbId = item.id;
				 		var dbSta = item.status;
				 		var dbName = item.name;				 		
				 		var dbDir = item.direction;
				 		
				 		console.log(dbSta+ "和" + dbId + "和" + dbName + "和" + dbDir );
						if( dbId!='**')
				 		changeStatus(dbSta, dbName, dbId, dbDir);
				 	})
                     
            });
			
		}
		
		function refresh3(){
			 $.getJSON('info.php',{"status":"10"}, function(json){
	
                     $.each(json, function(index, item){
				 		
				 		var dbId = item.id;
				 		var dbSta = item.status;
				 		var dbName = item.name;				 		
				 		var dbDir = item.direction;
				 		
				 		console.log(dbSta+ "和" + dbId + "和" + dbName + "和" + dbDir);
						 if( dbId!='**')
				 		changeStatus(dbSta, dbName, dbId, dbDir);
				 	})
                     
            });
			
		}

	//	function refresh4(){
	//		 $.getJSON('info.php',{"status":"5811"}, function(json){
	//
	//			 		var dbId = json.id;
     //                   var dbSta = json.status;
	//			 		var dbMessage = json.message;
	//			 		var dbName = json.name;
	//
	//			 		console.log(dbSta+ "和" + dbId + "和" + dbMessage);
	//					 if(dbId=="000000")
	//					 {
	//
	//					 }else{
	//					 	var str1 = "学生:"+dbName+" 学号:"+dbId;
	//					 	var str2 = dbMessage;
    //
	//					 	//notice("学生:"+dbName+" 学号:"+dbId, dbMessage);
	//					 }
	//
	//	});
	//}


		refresh1();
		timer1 = setInterval(refresh1, 5000);
		timer2 = setInterval(refresh2, 5000);
		timer3 = setInterval(refresh3, 5000);
		//timer4 = setInterval(refresh4, 5000);
	

	/*
	其中 status 表示其状态， 3 为 一面一等待， 6 为 一面二等待 ， 9 为 二面等待
	direction 为 该人所选的方向 1 为 安全组，2 为 web 组， 3 为技术运营组 4 为视觉组
	*/	
		var flag = false;
		var nowClass = null;

		function addData(id, name, status, direc){

			var sta = null;
			var dir = null;


		if( direc == 1) {

			dir = "安全组";
		}else if(direc == 2){

			dir = "web 组";
		}else if(direc == 3){

			dir = "技术运营组 ";
		}else if(direc == 4){

			dir = "视觉组";
		}


		if(status == 4){

			sta = "一面一进行中";

			 var $htmlLi = $("<li>"+id+"&nbsp;"+name+"&nbsp;"+dir+"</li>");
			
			var $ul = $('.tab_1 ul');
			$ul.append($htmlLi);
		
		}else if( status == 7){

			sta = "一面二进行中";

			var $htmlLi = $("<li>"+id+"&nbsp;"+name+"&nbsp;"+dir+"</li>");
			var $ul = $('.tab_2 ul');
			$ul.append($htmlLi);
			
		}else if(status == 10){

			sta = "二面进行中";

			var $htmlLi = $("<li>"+id+"&nbsp;"+name+"&nbsp;"+dir+"</li>");
			var $ul = $('.tab_3 ul');
			$ul.append($htmlLi);
			
		}
		
	}	
		
		function deleteData(className,id){

			var Id = id;

			$('.'+className +' li').each(function(index) {			
			

			//userId = $(this).text().split(' ')[0];	
			userId = $(this).text().substring(0,8);
			
			if(id == userId){
				$('.'+className +' li').eq(index).remove();			
			}
		  });
		}

		/*
			判断ul中是否存在指定的id
			返回值为 拥有此id的上上级标签的className
		*/
		function hasUser(id){

			flag = false;
			$('#tabBox li').each(function(index) {				

			//userId = $(this).text().split(' ')[0];	
			userId = $(this).text().substring(0,8);

			if(id == userId){
				flag = true;
			//	alert("有此用户的标志为:"+flag);				
				nowClass = $(this).parent().parent().attr("class");
			//	alert("有此用户的状态选卡的Class为:"+nowClass);

				return nowClass;
			}

		});
	}
	
	 function notice(str1, str2){

	 	$(".p1").text(str1);
	 	$(".p2").text(str2);
	 }

	
	 function changeStatus(sta, name, id, direction){

	 		if( nowClass){
					nowClass=nowClass.split(" ")[0];
			}

	 	if(sta == 4){

	 		 $('.tab_1 li').each(function(index) {				

			var strId = $(this).text().split(' ')[0];			


			if( id != strId){

				hasUser(id);
			
				if( nowClass){
					nowClass=nowClass.split(" ")[0];
				}
				
				deleteData(nowClass,id);
				addData(id, name, sta, direction);
			}

		});
	 	}else if( sta == 7){
	 		 $('.tab_2 li').each(function(index) {				

			var strId = $(this).text().split(' ')[0];			

			if( id != strId){

				hasUser(id);
				
				if( nowClass){
					nowClass=nowClass.split(" ")[0];
				}
				
				deleteData(nowClass,id);
				addData(id, name, sta, direction);
			}

		});


	 	}else if( sta == 10){
	 		 $('.tab_3 li').each(function(index) {				

			var strId = $(this).text().split(' ')[0];			

			if( id != strId){

				hasUser(id);
				
				if( nowClass){
					nowClass=nowClass.split(" ")[0];					
				}
				
				deleteData(nowClass,id);
				addData(id, name, sta, direction);
			}
		});

	 	}
	 }



	 function main_1(id, name, status, direction, dataFlag){

	 	/*
	 		得到4中数据, 还有有数据(id, name, status, direction),返回是否成功的标志(dataFlag);
	 	*/

	 	hasUser(id);

	 	if( flag == false && dataFlag){

	 		addData(id, name, sta, direction);	
	 		
	 	}

	 	if( flag && dataFlag){
			 	
			 	deleteData(nowClass,id);

			 	addData(id, name, sta, direction); 
			 	
	 	}

	 }
	 

});
	
	
