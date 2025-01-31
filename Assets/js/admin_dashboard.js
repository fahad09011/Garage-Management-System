let container = document.getElementById("container");
var chart=new ej.charts.Chart({
    width: '150px',
    height: '150px',
//InitializingPrimaryXAxis
primaryXAxis:{
valueType:'Category',
// title:'Countries',
},
 //InitializingPrimaryYAxis
 primaryYAxis:{
title:'Medals in number'
},

//InitializingChartSeries
series:[
{
type:'Column',
dataSource:[
{country:"x",medal:50},
{country:"y",medal:40},
{country:"z",medal:70},
],
xName:'country',
yName:'medal',
}
],
});
chart.appendTo('#container');
