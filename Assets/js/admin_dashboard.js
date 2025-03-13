let container = document.getElementById("container");
function function_to_create_chart(
  graph_containerid,
  datasours,
  title,
  name_of_graph
) {
  var chart = new ej.charts.Chart({
    background: "none",
    width: "190px",
    height: "120px",

    primaryXAxis: {
      valueType: "Category",
    },

    primaryYAxis: {},

    series: [
      {
        type: "Column",
        dataSource: datasours,

        xName: name_of_graph,
        yName: "medal",
      },
    ],
    title: title,
  });
  chart.appendTo(graph_containerid);
}

let datasource1 = [
  { income: "1", medal: 20 },
  { income: "2", medal: 40 },
  { income: "3", medal: 20 },
  { income: "4", medal: 10 },
  { income: "5", medal: 40 },
];
let datasource2 = [
  { customer: "1", medal: 5 },
  { customer: "2", medal: 15 },
  { customer: "3", medal: 19 },
  { customer: "4", medal: 30 },
  { customer: "5", medal: 26 },
];
let datasource3 = [
  { delivery: "1", medal: 5 },
  { delivery: "2", medal: 15 },
  { delivery: "3", medal: 9 },
  { delivery: "4", medal: 30 },
  { delivery: "5", medal: 9 },
];
function_to_create_chart(
  "#graph_container1",
  datasource1,
  "Weekly income",
  "income"
);
function_to_create_chart(
  "#graph_container2",
  datasource2,
  "Weekly customer",
  "customer"
);
function_to_create_chart(
  "#graph_container3",
  datasource3,
  "Weekly Deliveries",
  "delivery"
);







//function for automatically load the drop list
function load_all_drop_downs() {
  // get all the dropdown from the form
  let all_drop_downs = document.querySelectorAll(".drop_down_list");
  all_drop_downs.forEach((drop_down) => {
    let file_link = drop_down.getAttribute("data_file_link");

    let id = drop_down.getAttribute("data_value");

    let text = drop_down.getAttribute("data_text");

    if (!file_link || !drop_down.id || !id || !text) {
      alert("This Button is not active yet for:", drop_down.id);
      return;
    }

    Display_drop_down(file_link, drop_down.id, id, text);
  });
}

// this function is for display the drop down list  inside the form for selecting the details and then insert into database while submitting form

let Display_drop_down = (link, drop_down_table, id, text) => {
  console.log("fetching data from database (fetch.php).", link);
  fetch(link)
    .then((response) => {
      if (!response.ok) {
        throw new Error("check fetch.php file: json respnse is not ok:");
        // Debugging
      }
      return response.json();
    })
    .then((data) => {
      console.log("Data received:", data); // Debugging

      let drop_down = document.getElementById(drop_down_table);
      if (!drop_down) {
        console.error("Drop down element not foun(form_ajax.js).");
      }
      drop_down.innerHTML = "<option value=''>---Select---</option>"; // Clear existing options

      data.forEach((item) => {
        let option = document.createElement("option");
        option.value = item[id];
        option.textContent = item[text];
        drop_down.appendChild(option);
      });
    })
    .catch((error) => console.error("Error during submitting form", error));
};











// from here the javaScript (AJAX start) for dynamically  display all forms in dashboard ||| And also for send data to database through AJAX
document.addEventListener("DOMContentLoaded", () => {
  //
  // {====== ponit to be notes=====} > now we dont need to create multiple AJAX beacuse we make it re-usable
  // here "event is the perameter of function"
  // we event delegation: Event delegation is a technique in JavaScript where you attach a single event listener to a parent element instead of adding event listeners to multiple child elements. This takes advantage of event bubbling, which allows the event to "bubble up" from a child element to its parent.
  //==[this event delegation is for side]==
  let sidebar = document.querySelector(".dashboard_sidebar");
  sidebar.addEventListener("click", (event) => {
    if (event.target.classList.contains("load-file")) {
      let file_links = event.target.getAttribute("file-link");
      if (!file_links) {
        alert("This button is not activate yet!.");
        return;
      } else {
        event.preventDefault();
        display_supplier_form(file_links);
      }
    }
  });

  // this function is for display the form and hide the dahsboard content which is initialy display in dashboard
  let display_supplier_form = (file) => {
    // here AJAX start for display form in dashboard
    // fetch request the form from server
    fetch(file)
      // here we convert the server response into html "response is predefined"
      .then((response) => response.text())
      .then((data) => {
        // here we access the dashboard content section for hiding while showing the form
        let dashboard_content = document.getElementById("dashboard_content");
        dashboard_content.style.display = "none";

        // here access form conatiner (this is not actual for container ) its form container in dashboard where we will show actual form dynamically
        let formcontianer = document.getElementById("dynamicDisplayForms");
        // here we give the form data(actual form) to form variable wgchdgchdhich contain the dynamically form container
        formcontianer.innerHTML = data;
        formcontianer.style.display = "flex";
        // this function is for submitting form
        load_all_drop_downs();

        form_handler();
      })
      .catch((error) => console.log("Error during loading form", error));
  };

  // this function is handle the form data then send it to php file then php file send data to database
  let form_handler = () => {
    let form = document.getElementById("form");
    form.addEventListener("submit", (event) => {
      // window.confirm : predefined function in JS whenever we sub mit form it will asj for confirmation
      window.confirm("Are you sure to add new supplier");
      // event.preventDefault(); : this stop the normal form submission (without AJAX)
      event.preventDefault();
      // FormData() :predefined function that extrats the form data
      let form_data = new FormData(form);
      let action_url = form.getAttribute("action");
      fetch(action_url, {
        method: "POST",
        body: form_data,
      })
        .then((response) => response.text())
        .then((msg) => {
          let messge = document.getElementById("message");
          // show response (message success/error)
          messge.innerHTML = msg;
          // reset the form after send data to php file(AddSupplier)
          form.reset();
        })
        .catch((error) => console.log("Error during submitting form", error));
    });
  };
});
