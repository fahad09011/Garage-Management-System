let container = document.getElementById("container");
function function_to_create_chart(graph_containerid,datasours,title,name_of_graph){

    var chart=new ej.charts.Chart({
        background: 'none',
        width: '190px',
        height: '120px',
    
    primaryXAxis:{
    valueType:'Category',
    
    },
     
     primaryYAxis:{
    
    },
    
    
    series:[
    {
    type:'Column',
    dataSource:datasours,
    
    xName:name_of_graph,
    yName:'medal',
    }
    ],
    title:title,
    });
    chart.appendTo(graph_containerid);
    
}

let datasource1 =[
    {income:"1", medal:20},
    {income:"2", medal:40},
    {income:"3", medal:20},
    {income:"4", medal:10},
    {income:"5", medal:40}
];
let datasource2 =[
    {customer:"1", medal:5},
    {customer:"2", medal:15},
    {customer:"3", medal:19},
    {customer:"4", medal:30},
    {customer:"5", medal:26}
];
let datasource3 =[
    {delivery:"1", medal:5},
    {delivery:"2", medal:15},
    {delivery:"3", medal:9},
    {delivery:"4", medal:30},
    {delivery:"5", medal:9}
];
function_to_create_chart('#graph_container1',datasource1,'Weekly income','income');
function_to_create_chart('#graph_container2',datasource2,'Weekly customer','customer');
function_to_create_chart('#graph_container3',datasource3,'Weekly Deliveries','delivery');

