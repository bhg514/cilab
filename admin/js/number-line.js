function numberlineMain(mode){
	this.mode=typeof mode!=='undefined'?mode:'int';
	h=150;
	apart = 50
	var s="";
	s+='<div id="number_line" style="position:relative; width:100%; min-height:'+h+'px; border: none; border-radius: 20px; background-color: #def; margin:auto; display:block;">';
	s+='<canvas id="canvasId" style="position: absolute; width:100%; height:'+h+'px; left: 0; top:; border: none;"></canvas>';
	s+='<input id="clearBtn" onclick="clearMarks()" type="button" style="z-index:2; position:absolute; left:5px; bottom:5px;" value="clear"  class="togglebtn" />';
	s+='<div id="copyrt" style="font: 10px Arial; font-weight: bold; color: #6600cc; position:absolute; right:5px; bottom:3px;"></div>';
	s+='</div>';
	$('#chart').html(s);
	//document.write(s);
	w = $('#number_line').width()
	el=document.getElementById('canvasId');
	ratio=1;
	el.width=w*ratio;
	el.height=h*ratio;
	el.style.width=w+"px";
	el.style.height=h+"px";
	g=el.getContext("2d");
	g.setTransform(ratio,0,0,ratio,0,0);
	this.marks=[];
	document.getElementById('clearBtn').style.visibility='hidden';
	this.midX=5;
	this.midY=70;
	this.scale=0.06;
	this.width=550;
	el.addEventListener("mousemove",onmouseMove,false);
	el.addEventListener("mousedown",onmouseDown,false);
	el.addEventListener('touchstart',ontouchstart,false);
	el.addEventListener('touchmove',ontouchmove,false);	
	for(var i=0; i<$('#tbody').children().find('.end_val').length-1;i++){
		marks.push(uncomma($($('#tbody').children().find('.end_val')[i]).text())/apart);		
	}
	last_val = 0;
	go();

}
function go(x){
	g.clearRect(0,0,el.width,el.height);
	drawNumLine(this.midX,this.midY,this.width,x);
}

function ontouchstart(evt){
	var touch=evt.targetTouches[0];
	evt.clientX=touch.clientX;
	evt.clientY=touch.clientY;
	evt.touchQ=true;
	onmouseDown(evt)}
function ontouchmove(evt){
	var touch=evt.targetTouches[0];
	evt.clientX=touch.clientX;
	evt.clientY=touch.clientY;
	evt.touchQ=true;
	onmouseMove(evt);
	evt.preventDefault();
}

function onmouseDown(evt){
	
	var bRect=el.getBoundingClientRect();
	var mouseX=(evt.clientX-bRect.left)*(el.width/ratio/bRect.width);
	var mouseY=(evt.clientY-bRect.top)*(el.height/ratio/bRect.height);
	var m=val2x(mouseX);
	var index = marks.indexOf(m)
	var input_tag = $('#tbody').children().find('input')
	input_list =[]
	for(var i=0; i<input_tag.length-1; i++){
		input_list.push(input_tag[i].value)
	}
	last_val = input_tag[input_tag.length-1].value
	if (index > -1) {
	  marks.splice(index, 1);
	  input_list.splice(index, 1);
	}else{
		marks.push(m);
		marks.sort(function(a, b) {
		    return a - b;
		});
		index = marks.indexOf(m)
		input_list.splice(index, 0, 0);
	}

	
	go(0);

	
	

	mark_html = ""
	for(var i=0; i<marks.length; i++){
		mark_html+='<tr>'
		if (i==0){
			mark_html += '<td class="tbody_td start_val">0</td>'+
						'<td class="tbody_td end_val">'+comma(marks[i]*apart).toString()+'</td>'+
						'<td class="tbody_td"><input value='+input_list[i]+'></td>'		
		}else{
			mark_html += '<td class="tbody_td start_val">'+comma(marks[i-1]*apart).toString()+'</td>'+
						'<td class="tbody_td end_val">'+comma(marks[i]*apart).toString()+'</td>'+
						'<td class="tbody_td"><input value='+input_list[i]+'></td>'	
		}
		mark_html+='</tr>'
	}	
	mark_html += '<td class="tbody_td start_val">'+comma(marks[marks.length-1]*apart).toString()+'</td>'+
						'<td class="tbody_td end_val"></td>'+
						'<td class="tbody_td"><input value='+last_val+'></td>'
	$('#tbody').html(mark_html)

	if(evt.preventDefault){
		evt.preventDefault();
	}else if(evt.returnValue){
		evt.returnValue=false;
	}
	return false;
}
function onmouseMove(evt){
	var bRect=el.getBoundingClientRect();
	var mouseX=(evt.clientX-bRect.left)*(el.width/ratio/bRect.width);
	var mouseY=(evt.clientY-bRect.top)*(el.height/ratio/bRect.height);
	go(mouseX);
}
function drawNumLine(x,y,wd,currX){
	g.strokeStyle='blue';
	g.lineWidth=2;
	g.beginPath();
	g.moveTo(x,y); //막대 범뒤
	g.lineTo(w,y); //x축 길이
	g.stroke();
	g.fillStyle='blue';
	g.drawArrow(w,y,20,2,30,15,0); //화살 
	g.fill();

	g.textAlign='center';
	g.lineWidth=1; // 각 눈금 두께

	g.font='10px Arial';
	g.fillStyle='black';
	max_val = 32000
	for(var i=0;i<=max_val;i+=apart){ // 파란색 범위
		var xp=x+i/apart*wd*this.scale;
		g.fillText(comma(i).toString(),xp,y+35);
		g.beginPath();
		g.moveTo(xp,y-10);
		g.lineTo(xp,y+15);
		g.stroke();
	}

	g.fillStyle='black'; //mark
	g.strokeStyle=g.fillStyle;
	g.font='bold 17px Arial';
	g.lineWidth=2;

	for(i=0;i<marks.length;i++){ //찍은 것들 
		var m=marks[i];
		if(m>=0&&m<=max_val){
			xp=x+m*wd*this.scale;
			g.fillText(comma(m*apart).toString(),xp,y-40);
			g.beginPath();
			g.moveTo(xp,y);
			g.lineTo(xp,y-35);
			g.stroke();
			g.drawArrow(xp,y,20,2,20,10,3*Math.PI/2);
			g.fill();
		}
	}
	g.font='bold 17px Arial';
	g.fillStyle='orange';
	if(currX>0&&currX<w){ // 마우스오버
		g.strokeStyle=g.fillStyle;
		m=val2x(currX);
		xp=x+m*wd*this.scale;
		g.fillText(comma(m*apart).toString(),xp,y-40);
		g.beginPath();
		g.moveTo(xp,y);
		g.lineTo(xp,y-35);
		g.stroke();
		g.drawArrow(xp,y,20,2,20,10,3*Math.PI/2);
		g.fill();
	}
	
	
}
function val2x(currX){
	if(this.mode=='int'){
		m=Math.round((currX-this.midX)/(this.scale*this.width));
	}else{m=(currX-this.midX)/(this.scale*this.width);
		m=m.toFixed(7);
		frac=m%1;
		if(Math.abs(frac)<0.05)m=m>>0;
	}
	return m;
}
function Point(x,y){
	this.x=x;
	this.y=y;
}
Point.prototype.set=function(x,y){
	this.x=x;
	this.y=y;
};
CanvasRenderingContext2D.prototype.drawArrow=function(x0,y0,totLen,shaftHt,headLen,headHt,angle,sweep,invertQ){
	var g=this;
	var pts=[[0,0],[-headLen,-headHt/2],[-headLen+sweep,-shaftHt/2],[-totLen,-shaftHt/2],[-totLen,shaftHt/2],[-headLen+sweep,shaftHt/2],[-headLen,headHt/2],[0,0]];
	if(invertQ){
		pts.push([0,-headHt/2],[-totLen,-headHt/2],[-totLen,headHt/2],[0,headHt/2]);
	}
	for(var i=0;i<pts.length;i++){
		var cosa=Math.cos(-angle);
		var sina=Math.sin(-angle);
		var xPos=pts[i][0]*cosa+pts[i][1]*sina;
		var yPos=pts[i][0]*sina-pts[i][1]*cosa;
		if(i==0){
			g.moveTo(x0+xPos,y0+yPos);
		}else{
			g.lineTo(x0+xPos,y0+yPos);
		}
	}
};
	
function comma(num){
    var len, point, str; 
       
    num = num + ""; 
    point = num.length % 3 ;
    len = num.length; 
   
    str = num.substring(0, point); 
    while (point < len) { 
        if (str != "") str += ","; 
        str += num.substring(point, point + 3); 
        point += 3; 
    } 
     
    return str;
 
};

function range_save(){
	var child = $('#tbody').children()
	var del_data = []
	for(var i=0; i<child.length-1;i++){
		del_data.push([uncomma($(child.find('.start_val')[i]).text()),uncomma($(child.find('.end_val')[i]).text()),uncomma($(child.find('input')[i]).val())])
		//이상값, 미만값, 금액
	}
	del_data.push([uncomma($(child.find('.start_val')[child.length-1]).text()), uncomma(9999999),uncomma($(child.find('input')[child.length-1]).val())])
	$.ajax({
		type: "POST",
		url: "../ajax/del_fee.php",
		cache: false,
		data: { 
		    arr : del_data
		},
		dataType: "text",
		success: function(data) {
			alert('저장되었습니다.')   	        	
		    location.reload();

		}
	});

	


}
//금액 콤마 제거
function uncomma(str) {
    str = String(str);
    return str.replace(/,/gi, '');
}