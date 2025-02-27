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

// from here the javaScript (AJAX start) for dynamically  display addSupplier form in dashboard ||| And also for send data to database through AJAX
document.addEventListener("DOMContentLoaded",()=>{


    let sidebar = document.querySelector(".dashboard_sidebar");
    sidebar.addEventListener("click",(event)=>{
    if (event.target.id==="addSupplierButton") {
    event.preventDefault();
    display_supplier_form();
    }
    });



    // this function is for display the form and hide the dahsboard content which is initialy display in dashboard
    let display_supplier_form = ()=>{

        // here AJAX start for display form in dashboard
        // fetch request the form from server
        fetch("./AddSupplierForm.php")
        // here we convert the server response into html "response is predefined"
        .then(response => response.text())
        .then(data=>{

            // here we access the dashboard content section for hiding while showing the form
            let dashboard_content = document.getElementById("dashboard_content")
            dashboard_content.style.display="none";

            // here access form conatiner (this is not actual for container ) its form container in dashboard where we will show actual form dynamically
            let formcontianer = document.getElementById("dynamicsupplierform");
            // here we give the form data(actual form) to form variable which contain the dynamically form container
            formcontianer.innerHTML=data;
            formcontianer.style.display="flex";
            // this function is for submitting form 
            form_handler();
        })
        .catch(error => console.log("Error during loading form", error));
        
    }



    // this function is handle the form data then send it to php file then php file send data to database
    let form_handler = ()=>{
        let form= document.getElementById("form");
        form.addEventListener("submit",(event)=>{
            // event.preventDefault(); : this stop the normal form submission (without AJAX) 
            event.preventDefault();
            // FormData() :predefined function that extrats the form data
            let form_data = new FormData(form);
            fetch("AddSupplier.php", {
                method: "POST",
                body: form_data
            })
            .then(response => response.text())
            .then(msg=>{
                let messge = document.getElementById("message");
                // show response (message success/error)
                messge.innerHTML=msg;
                // reset the form after send data to php file(AddSupplier)
            form.reset();
            })
            .catch(error=>console.log("Error during submitting form",error))
        });

    }
});