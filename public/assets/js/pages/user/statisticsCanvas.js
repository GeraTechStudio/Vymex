/*Function Diagram statistics*/
	function drawl(){
		var canvas = document.getElementById("UserStatistics");
		var ctx = canvas.getContext("2d");
		for (var i = 0; i < 10; i++) {
			ctx.lineWidth = 1;
			ctx.beginPath();
			ctx.moveTo(0, 404 - i*46);
			ctx.lineTo(1450, 404 - i*46);
			ctx.strokeStyle = "#2a456e";
			ctx.stroke();
		}
	}
	function drawStatistics(n1, c1, r1, n2, c2, r2, n3, c3, r3){

		var canvas = document.getElementById("UserStatistics");


		var normOne = (n1 * 450)/9 - 50;
		var normTwo = (n2 * 450)/9 - 50;
		var normThree = (n3 * 450)/9 - 50;

		var norm1 = canvas.getContext("2d");
			norm1.lineWidth = 80;
			norm1.beginPath();
			norm1.moveTo(100 + 60, 450);
			norm1.lineTo(100 + 60, 450 - (normOne /100*92));
			norm1.strokeStyle = "#2eb42e";
			norm1.stroke();

		var norm2 = canvas.getContext("2d");
			norm2.lineWidth = 80;
			norm2.beginPath();
			norm2.moveTo(100 + 3*190 + 10, 450);
			norm2.lineTo(100 + 3*190 + 10, 450 - (normTwo /100*92));
			norm2.strokeStyle = "#2eb42e";
			norm2.stroke();

		var norm3 = canvas.getContext("2d");
			norm3.lineWidth = 80;
			norm3.beginPath();
			norm3.moveTo(100 + 5*190 + 50 + 80, 450);
			norm3.lineTo(100 + 5*190 + 50 + 80, 450 - (normThree /100*92));
			norm3.strokeStyle = "#2eb42e";
			norm3.stroke();



		var comfOne = (c1 * 450)/9 - 50;
		var comfTwo = (c2 * 450)/9 - 50;
		var comfThree = (c3 * 450)/9 - 50;

		var comf1 = canvas.getContext("2d");
			comf1.lineWidth = 80;
			comf1.beginPath();
			comf1.moveTo(100 + 120 + 30, 450);
			comf1.lineTo(100 + 120 + 30, 450 - (comfOne /100*92));
			comf1.strokeStyle = "#00aeef";
			comf1.stroke();

		var comf2 = canvas.getContext("2d");
			comf2.lineWidth = 80;
			comf2.beginPath();
			comf2.moveTo(100 + 3*190 + 2*60 - 20, 450);
			comf2.lineTo(100 + 3*190 + 2*60 - 20, 450 - (comfTwo /100*92));
			comf2.strokeStyle = "#00aeef";
			comf2.stroke();

		var comf3 = canvas.getContext("2d");
			comf3.lineWidth = 80;
			comf3.beginPath();
			comf3.moveTo(100 + 5*190 + 2*60 + 100, 450);
			comf3.lineTo(100 + 5*190 + 2*60 + 100, 450 - (comfThree /100*92));
			comf3.strokeStyle = "#00aeef";
			comf3.stroke();



			var riskOne = (r1 * 450)/9 - 50;
			var riskTwo = (r2 * 450)/9 - 50;
			var riskThree = (r3 * 450)/9 - 50;


			var risk1 = canvas.getContext("2d");
				risk1.lineWidth = 80;
				risk1.beginPath();
				risk1.moveTo(100 + 190 + 50, 450);
				risk1.lineTo(100 + 190 + 50, 450 - (riskOne /100*92));
				risk1.strokeStyle = "#f26522";
				risk1.stroke();


			var risk2 = canvas.getContext("2d");
				risk2.lineWidth = 80;
				risk2.beginPath();
				risk2.moveTo(100 + 4*190, 450);
				risk2.lineTo(100 + 4*190, 450 - (riskTwo /100*92));
				risk2.strokeStyle = "#f26522";
				risk2.stroke();

			var risk3 = canvas.getContext("2d");
				risk3.lineWidth = 80;
				risk3.beginPath();
				risk3.moveTo(100 + 6*190 + 120, 450);
				risk3.lineTo(100 + 6*190 + 120, 450 - (riskThree /100*92));
				risk3.strokeStyle = "#f26522";
				risk3.stroke();

		}
/*END Function Diagram statistics*/



/*Function Pie Diagram statistics*/
	function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
	    ctx.fillStyle = color;
	    ctx.beginPath();
	    ctx.moveTo(centerX,centerY);
	    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
	    ctx.closePath();
	    ctx.fill();
	}
	
	var Piechart = function(options){
	    this.options = options;
	    this.canvas = options.canvas;
	    this.ctx = this.canvas.getContext("2d");
	    this.colors = options.colors;
	 
	    this.draw = function(){
	        var total_value = 0;
	        var color_index = 0;
	        for (var categ in this.options.data){
	            var val = this.options.data[categ];
	            total_value += val;
	        }
	 
	        var start_angle = 0;
	        for (categ in this.options.data){
	            val = this.options.data[categ];
	            var slice_angle = 2 * Math.PI * val / total_value;
	 
	            drawPieSlice(
	                this.ctx,
	                this.canvas.width/2,
	                this.canvas.height/2,
	                Math.min(this.canvas.width/2,this.canvas.height/2),
	                start_angle,
	                start_angle+slice_angle,
	                this.colors[color_index%this.colors.length]
	            );
	 
	            start_angle += slice_angle;
	            color_index++;
	        }
	 
	        //drawing a white circle over the chart
	        //to create the doughnut chart
	        if (this.options.doughnutHoleSize){
	            drawPieSlice(
	                this.ctx,
	                this.canvas.width/2,
	                this.canvas.height/2,
	                this.options.doughnutHoleSize * Math.min(this.canvas.width/2,this.canvas.height/2),
	                0,
	                2 * Math.PI,
	                "#fff"
	            );
	        }
	 
	    }
	}
	


	function drawPieDiagrams(){
		var StatsArr = {
		    "LvlNorm": 25,
		    "LvlComf": 10,
		    "LvlRisk": 25,
		};	

		var myDougnutChart = new Piechart(
	    {
	        canvas: UserIndicators,
	        data:StatsArr,
	        colors:["#2eb42e","#00aeef", "#f26522"],
	        doughnutHoleSize:0.5
	    }
		);
		myDougnutChart.draw();

		var StatsArr1 = {
		    "LvlNorm": 25,
		    "LvlComf": 18,
		    "LvlRisk": 25,
		};

		var myDougnutChart2 = new Piechart(
	    {
	        canvas: UserProcesses,
	        data:StatsArr1,
	        colors:["#2eb42e","#00aeef", "#f26522"],
	        doughnutHoleSize:0.5
	    }
		);
		myDougnutChart2.draw();

		var StatsArr2 = {
		    "LvlNorm": 35,
		    "LvlComf": 18,
		    "LvlRisk": 20,
		};

		var myDougnutChart3 = new Piechart(
	    {
	        canvas: UserResources,
	        data:StatsArr2,
	        colors:["#2eb42e","#00aeef", "#f26522"],
	        doughnutHoleSize:0.5
	    }
		);
		myDougnutChart3.draw();


		var StatsArr3 = {
		    "LvlLast": 10-7.5,
		    "LvlNow": 7.5,
		};
		var myDougnutChart4 = new Piechart(
	    {
	        canvas: final_rate,
	        data:StatsArr3,
	        colors:["#fff", "#2eb42e"],
	        doughnutHoleSize:0.8
	    }
		);
		myDougnutChart4.draw();
	}