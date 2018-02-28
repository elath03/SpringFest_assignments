var selected_block=0;
var block=[];
var i;
var k;
var a=[];
var b=[];
var c=[];
var container=0;
var e=1;



$(document).ready(function(){
	
	var count;
    for(count=0;count<25;count++){
		b[0]=Math.floor((Math.random()*9)+1 );
		b[1]=Math.floor((Math.random()*9)+1 );
		
		swap_random();
}
});


$('#contain div').click(function()
   {
	i=$(this).text();
	

	if(selected_block==2){
	
		if(a[0]!=i&&a[1]!=i){
	     $('#contain div').css("transform","scale(1)");
         selected_block=0;
		}
		
	}
	
    if(i==a[0]||i==a[1]){

		     $(this).css("transform","scale(1)");
		     selected_block--;
		     k=0;
			 if(i==a[0]){
				 a[0]=0;
			 };
			 if(i==a[1]){
				 a[1]=0;
			 };
	}
	else {
         $(this).css("transform","scale(1.1)");
         k= $(this).text();	
	     a[selected_block]=k;
		 var p=$(this).attr('id')
	     c[selected_block]=p;
		 selected_block++;
		 }

});
var swap=function(){
	container=1;
	var top1=$("#"+c[0]).css("top");
	var left1=$("#"+c[0]).css("left");
	var top2=$("#"+c[1]).css("top");
	var left2=$("#"+c[1]).css("left");
     $("#"+c[0]).animate({
	     left:left2,
	     top:top2
     },500);
     $("#"+c[1]).animate({
	     left:left1,
	     top:top1
     },500);

    $("#contain div").css("transform","scale(1)");
	 a[0]=0;
	 a[1]=0;
     selected_block=0;
	 c[0]=0;
	 c[1]=0;

};			
$('#swap').click(function(){
	if(selected_block==0){
		alert('select blocks');}
	if(selected_block==2){
      swap();}
	if(selected_block==1){
	     alert('Select Another Block');}
	});

var swap_random=function() {
      	var x1=$("#e"+b[0]).text();
		var y1=$("#e"+b[1]).text();
		var q=$("#e"+b[0]).css("background-color");
		var r=$("#e"+b[1]).css("background-color");
        $("#e"+b[0]).text(y1);
		$("#e"+b[1]).css("background-color",q);
	    $("#e"+b[1]).text(x1);
		$("#e"+b[0]).css("background-color",r);
        $("#contain div").css("transform","scale(1)");
		return;}

$('#random').click(function(){
	var count;
for(count=0;count<25;count++){
		b[0]=Math.floor((Math.random()*9)+1 );
		b[1]=Math.floor((Math.random()*9)+1 );
		swap_random();}
});
	
var check=function(){
     var count=0;
	 var i=1;
    while(i<=9){
       if($('#e'+i).text()==1 && $('#e'+i).css('top')=='150px'  && $('#e'+i).css('left')=='400px'){count++;}
       if($('#e'+i).text()==2 && $('#e'+i).css('top')=='150px'  && $('#e'+i).css('left')=='570px'){count++;}
       if($('#e'+i).text()==3 && $('#e'+i).css('top')=='150px'  && $('#e'+i).css('left')=='740px'){count++;}
       if($('#e'+i).text()==4 && $('#e'+i).css('top')=='320px' && $('#e'+i).css('left')=='400px'){count++;}
       if($('#e'+i).text()==5 && $('#e'+i).css('top')=='320px' && $('#e'+i).css('left')=='570px'){count++;}
	   if($('#e'+i).text()==6 && $('#e'+i).css('top')=='320px' && $('#e'+i).css('left')=='740px'){count++;}
       if($('#e'+i).text()==7 && $('#e'+i).css('top')=='490px' && $('#e'+i).css('left')=='400px'){count++;}
       if($('#e'+i).text()==8 && $('#e'+i).css('top')=='490px' && $('#e'+i).css('left')=='570px'){count++;}
       if($('#e'+i).text()==9 && $('#e'+i).css('top')=='490px' && $('#e'+i).css('left')=='740px'){count++;}
     i++;
        }
         if(count==9){alert('puzzle solved');}     
         else{
			 alert('puzzle is not solved yet try more');
		 }
    };    
		 
$('#check').click(function(){
	check();}
	);